<?php

// user login
//call by role 2, so only admin user logins
function userLogin($con, $email, $password)
{
    $password = sha1($password);
    $sql = "SELECT * FROM user WHERE role = '2' && email = '$email' && password = '$password' LIMIT 1";
    
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not load Users";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    if(mysqli_num_rows($result) > 0) {

        $_SESSION['ADMIN'] = $result->fetch_assoc(); //Memory location, this saves session's data 
        return true;
    }

    return false;
}


function CheckUserExists($con, $email)
{
    // Selecting a user by ID.
    $sql = "SELECT * FROM user WHERE email = '$email'"; 

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

//Get users 
function GetUser($con)
{
    
    $sql = "SELECT * FROM user" ; 

    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not load Users";
        exit();
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}

//role
function GetRole($con)
{
   
    $sql = "SELECT * FROM role" ; 

    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not load roles";
        exit();
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

//get role by id
function GetRoleById($con, $StatusId)
{
   
    $sql = "SELECT * FROM role WHERE StatusId = {$StatusId}" ; 

    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not load roles";
        exit();
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}


//update role
function updateUserRole($con, $userId, $newRoleId) {
    $sql = "UPDATE user SET role = ? WHERE id = ?";

    $stmt = mysqli_prepare($con, $sql);
    if (!$stmt) {
        die("Error preparing statement: " . mysqli_error($con));
    }

    mysqli_stmt_bind_param($stmt, "ii", $newRoleId, $userId);

    if (mysqli_stmt_execute($stmt)) {
        echo "User role updated successfully.";
    } else {
        echo "Error updating user role: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}



//Delete user from database
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
        $sqlUserAdmin = "DELETE FROM user WHERE id = ?;";
        if ($stmtUser = mysqli_prepare($con, $sqlUser)) {
            mysqli_stmt_bind_param($stmtUser, "i", $userId);
            mysqli_stmt_execute($stmtUser);
            mysqli_stmt_close($stmtUser);
        }

        // Commit the transaction
        mysqli_commit($con);
    } catch (mysqli_sql_exception $exception) {
        // Rollback transaction on error
        mysqli_rollback($con);
        throw $exception; // or handle error as appropriate
    }
}


//Adding product 
function addProduct($con, $name, $title, $description, $category, $price, $stockQty, $img) {
    // SQL query with placeholders
    $sql = "INSERT INTO product (name, title, description, categoryid, price, stockQty, img) VALUES (?, ?, ?, ?, ?, ?, ?);";
    
    // Prepare the SQL statement
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "sssisds", $name, $title, $description, $category, $price, $stockQty, $img);
        mysqli_stmt_execute($stmt);
        return mysqli_stmt_affected_rows($stmt) > 0;
    }
}

//Getting products 
function getProducts($con) {
    $products = [];
    $sql = "SELECT * FROM product"; 
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($products, $row);
        }
    }

    return $products;
}


// Delete product
function deleteProduct($con, $productId) {
    $sql = "DELETE FROM product WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if (!$stmt) {
        // Handle error - could not prepare the statement
        return false;
    }

    mysqli_stmt_bind_param($stmt, 'i', $productId);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}


//Displaying category
function getCategories($con) {
    $categories = array();

    // SQL query to select id, name, and image from the category table
    $sql = "SELECT id, name, image FROM category";

    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if the query was successful
    if ($result) {
        // Fetch all rows as an associative array
        while($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }
    } else {
        // Optional: Handle error scenario
        // echo "Error: " . mysqli_error($con);
    }

    return $categories;
}


//Get product by id
function GetProductByID($con, $id)
{
    // Select a user by ID.
    $sql = "SELECT * FROM product WHERE id = '$id'"; 

    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not load products";
        exit();
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    if(mysqli_num_rows($result) > 0) {
        return $result->fetch_assoc();
    }
    return false;
}


//Update Product 
function updateProduct($con, $product)
{
    $sql = "UPDATE product SET name = ?, description = ?, categoryid = ?, price = ?, stockQty = ?, img = ? WHERE id = ?;";

    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not prepare statement";
        exit();
    }

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "sssdiss", $product["name"], $product["description"], $product["categoryid"], $product["price"], $product["stockQty"], $product["img"], $product["id"]);

    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}

//Editing user and userAdmin deatails not working 
//NOT WORKING - adding funcations
function GetUserByID($con, $id) {
    $sql = "SELECT * FROM user WHERE id = ?"; 
    $stmt = mysqli_stmt_init($con);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL Error";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    if($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}

function GetAddressesByUser($con, $userID)
{
    $sql = "SELECT * FROM address WHERE userid = '$userID';";

    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not load Roles";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    if(mysqli_num_rows($result) > 0) {
        return $result->fetch_assoc();
    }
    return false;
}


// Getting orders 
function getOrder($con) {
    $order = array();

    // SQL query to select id, name, and image from the category table
    $sql = "SELECT id, userid, createddate, updateddate, addressid, statusid FROM orders";

    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if the query was successful
    if ($result) {
        // Fetch all rows as an associative array
        while($row = mysqli_fetch_assoc($result)) {
            $order[] = $row;
        }
    } else {
        // Optional: Handle error scenario
        // echo "Error: " . mysqli_error($con);
    }

    return $order;
}


//Updating users data, email, address and pasword 
// Update Address
function updateAddress($con, $address)
{
    $id = $address["id"];
    $street = $address["street"];
    $city = $address["city"];
    $zipCode = $address["zipCode"];
    $region = $address["region"];
    $mobile = $address["mobile"];

    $sql = "UPDATE address SET street = '$street', city = '$city', zipCode = '$zipCode', region = '$region', mobile = '$mobile' WHERE id = '$id';";
    
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not create Order Status";
        exit();
    }

    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

//Up date user 
function updateUser($con, $user)
{
    $id = $user["id"];
    $name = $user["firstName"];
    $lastName = $user["lastName"];
    $mobile = $user["mobile"];
    $sql = "UPDATE user SET firstName = '$name', lastName = '$lastName', mobile = '$mobile' WHERE ID = $id;";
    
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not update Category";
        exit();
    }

    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}

function updateUserEmail($con, $user)
{
    $id = $user["id"];
    $email = $user["email"];
    $sql = "UPDATE user SET email = '$email' WHERE ID = $id;";
    
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not update Category";
        exit();
    }

    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}

function updateUserPassword($con, $user)
{
    $id = $user["id"];
    $password = $user["password"];
    $sql = "UPDATE user SET password = '$password' WHERE ID = $id;";
    
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not update Category";
        exit();
    }

    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}


// Delete order
function deleteOrder($con, $orderId) {
    $sql = "DELETE FROM orders WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if (!$stmt) {
        error_log("Error preparing statement: " . mysqli_error($con));
        return;
    }

    mysqli_stmt_bind_param($stmt, "i", $orderId);
    if (!mysqli_stmt_execute($stmt)) {
        error_log("Error executing statement: " . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_close($stmt);
}
















