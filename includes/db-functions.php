<?php

// user login
function userLogin($con, $email, $password)
{
    $password = sha1($password);
    $sql = "SELECT * FROM user WHERE email = '$email' && password = '$password' LIMIT 1";
    
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

function createUser($con, $user)
{
    $userName = $user["Name"];
    $userSurname = $user["Surname"];
    $userEmail = $user["Email"];
    $userPassword = $user["Password"];
    $userContactNumber = $user["ContactNumber"];

    $sql = "INSERT INTO user (email, firstName, lastName, joined, password, mobile, role) VALUES ('$userEmail', '$userName', '$userSurname', NOW(), '$userPassword', '$userContactNumber', 1);";
    
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not create Role";
        exit();
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_insert_id($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

function createAddress($con, $userID, $address)
{
    $street = $address["Street"];
    $city = $address["City"];
    $zipCode = $address["ZipCode"];
    $region = $address["Region"];
    $default = $address["Default"] == 'true' ? 1 : 0;
    $mobile = $address['Mobile'];

    if($default) {
        $sql = "UPDATE address SET Def = '0' WHERE userid = '$userID';";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Could not create Order Status";
            exit();
        }

        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close($stmt);
    }

    $sql = "INSERT INTO address (street, city, zipCode, region, userid, def, mobile) VALUES ('$street', '$city', '$zipCode', '$region', '$userID', '$default', '$mobile');";
    
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not create Order Status";
        exit();
    }

    mysqli_stmt_execute($stmt);
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

function createWishlistItem($con, $productID, $userID)
{
    $sql = "INSERT INTO wishlist (user, product) VALUES('$userID', '$productID');";
    
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not delete Review Status";
        exit();
    }

    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function GetWishlistItem($con, $userID, $productID)
{
    $sql = "SELECT * FROM wishlist WHERE user = '$userID' AND product = '$productID';";

    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not load Roles";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function deleteWishlistItem($con, $productID, $userID)
{
    $sql = "DELETE FROM wishlist WHERE user = '$userID' AND product = '$productID';";
    
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not delete Review Status";
        exit();
    }

    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}