<?php

// user login
function userLogin($con, $email, $password)
{
    $password = sha1($password);
    $sql = "SELECT * FROM userAdmin WHERE email = '$email' && password = '$password' LIMIT 1";
    
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not load Users";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    if(mysqli_num_rows($result) > 0) {

        $_SESSION['USER'] = $result->fetch_assoc(); //Memory location, this saves session's data 
        return true;
    }

    return false;
}

function CheckUserExists($con, $email)
{
    // Selecting a user by ID.
    $sql = "SELECT * FROM userAdmin WHERE email = '$email'"; 

    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not load Users";
        exit();
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    if(mysqli_num_rows($result) > 0) {
        return true; //Memory location, this saves session's data 
    }
    return false;
}

function createUser($con, $user) {
    $userName = $user["Name"];
    $userSurname = $user["Surname"];
    $userEmail = $user["Email"];
    $userPassword = $user["Password"]; // Consider hashing the password before storing it
    $userContactNumber = $user["ContactNumber"];

    // SQL query with placeholders
    $sql = "INSERT INTO userAdmin (email, firstName, lastName, joined, password, mobile, role) VALUES (?, ?, ?, NOW(), ?, ?, 2);";
    
    // Prepare the SQL statement
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
        exit();
    }

    // Bind parameters to the SQL statement
    mysqli_stmt_bind_param($stmt, "sssss", $userEmail, $userName, $userSurname, $userPassword, $userContactNumber);

    // Execute the statement and check for errors
    if (!mysqli_stmt_execute($stmt)) {
        echo "Error executing statement: " . mysqli_error($con);
        exit();
    }

    $result = mysqli_stmt_insert_id($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}


function createAddress($con, $userID, $addressData) {
    // First, check if the user exists
    $userCheckSql = "SELECT id FROM user WHERE id = ?";
    $stmt = mysqli_prepare($con, $userCheckSql);
    mysqli_stmt_bind_param($stmt, 'i', $userID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 0) {
        // User does not exist, handle error
        echo "User with ID $userID does not exist.";
        return false;
    }
    mysqli_stmt_close($stmt);

    // User exists, proceed with address insertion
    $addressInsertSql = "INSERT INTO address (street, city, zipCode, region, userid, def, mobile) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $addressInsertSql);

    // Assuming $addressData is an associative array with keys matching the column names
    mysqli_stmt_bind_param($stmt, 'ssssisi', $addressData['street'], $addressData['city'], $addressData['zipCode'], $addressData['region'], $userID, $addressData['def'], $addressData['mobile']);
    
    if (!mysqli_stmt_execute($stmt)) {
        // Handle insertion error
        echo "Error inserting address: " . mysqli_error($con);
        return false;
    }

    $result = mysqli_stmt_insert_id($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}


function GetCategories($con)
{
    $sql = "SELECT * FROM category";

    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not load Categories";
        exit();
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}

function GetProducts($con, $category, $search)
{
    $sql = "SELECT p.*, c.name as 'categoryName' FROM product p JOIN category c ON p.categoryid = c.id";

    if(isset($category)) {
        $sql .= " AND c.id = $category";
    } else if(isset($search)) {
        $sql .= " AND p.name LIKE '%$search%'";
    }

    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not load Products";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function GetProductByID($con, $id)
{
    $sql = "SELECT p.*, c.name as 'categoryName', c.id as 'categoryID' FROM product p JOIN category c ON p.categoryid = c.id WHERE p.id = '$id'";

    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not load Products";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    if(mysqli_num_rows($result) > 0) {

        return $result->fetch_assoc(); //Memory location, this saves session's data 
    }

    return false;

}

// Adding user and userAdmin using union all
function getAllUsersAndAdmins($con) {
    // Check if the database connection is established
    if ($con === null) {
        die("Database connection not established.");
    }

    // SQL query to select data from both user and userAdmin tables
    $sql = "SELECT id, email, firstName, lastName, 'User' as userType FROM user
            UNION ALL
            SELECT id, email, firstName, lastName, 'UserAdmin' as userType FROM userAdmin";

    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check for query execution error
    if (!$result) {
        die("Error fetching users: " . mysqli_error($con));
    }

    // Fetch all results as an associative array
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free result set
    mysqli_free_result($result);

    return $users;
}


//Delete 
function deleteUser($con, $userId) {
    // Start transaction
    mysqli_begin_transaction($con);

    try {
        // Delete records in the address table that reference the user
        $sqlAddress = "DELETE FROM address WHERE userid = ?;";
        if ($stmtAddress = mysqli_prepare($con, $sqlAddress)) {
            mysqli_stmt_bind_param($stmtAddress, "i", $userId);
            mysqli_stmt_execute($stmtAddress);
            mysqli_stmt_close($stmtAddress);
        }

        // Delete records in the wishlist table that reference the user
        $sqlWishlist = "DELETE FROM wishlist WHERE user = ?;";
        if ($stmtWishlist = mysqli_prepare($con, $sqlWishlist)) {
            mysqli_stmt_bind_param($stmtWishlist, "i", $userId);
            mysqli_stmt_execute($stmtWishlist);
            mysqli_stmt_close($stmtWishlist);
        }

        // Then, delete the user record from the user table
        $sqlUser = "DELETE FROM user WHERE id = ?;";
        if ($stmtUser = mysqli_prepare($con, $sqlUser)) {
            mysqli_stmt_bind_param($stmtUser, "i", $userId);
            mysqli_stmt_execute($stmtUser);
            mysqli_stmt_close($stmtUser);
        }

        // Repeat the deletion for the userAdmin table if necessary
        $sqlUserAdmin = "DELETE FROM userAdmin WHERE id = ?;";
        if ($stmtUserAdmin = mysqli_prepare($con, $sqlUserAdmin)) {
            mysqli_stmt_bind_param($stmtUserAdmin, "i", $userId);
            mysqli_stmt_execute($stmtUserAdmin);
            mysqli_stmt_close($stmtUserAdmin);
        }

        // Commit the transaction
        mysqli_commit($con);
    } catch (mysqli_sql_exception $exception) {
        // Rollback transaction on error
        mysqli_rollback($con);
        throw $exception; // or handle error as appropriate
    }
}



//Edit




//Add peoduct 
function addProduct($con, $name, $title, $description, $category, $price, $stockQty, $img) {
    // SQL query with placeholders
    $sql = "INSERT INTO product (name, title, description, categoryid, price, stockQty, img) VALUES (?, ?, ?, ?, ?, ?, ?);";
    
    // Prepare the SQL statement
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "sssisdi", $name, $title, $description, $category, $price, $stockQty, $img);
        mysqli_stmt_execute($stmt);
        return mysqli_stmt_affected_rows($stmt) > 0;
    }
}



















