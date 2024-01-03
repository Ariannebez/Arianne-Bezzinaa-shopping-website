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
    // Select a user by ID.
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

function GetWishlistByUser($con, $userID)
{
    $sql = "SELECT * FROM wishlist WHERE user = '$userID';";

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

function GetUserByID($con, $id)
{
    // Select a user by ID.
    $sql = "SELECT * FROM user WHERE id = '$id'"; 

    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not load Users";
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

function createOrder($con, $user, $selectedAddress, $cartItems)
{
    
    $sql = "INSERT INTO orders (createddate, updateddate, statusid, userid, addressid) VALUES (NOW(), NOW(), 1," . $user['id'] . ", " . $selectedAddress['id'] . ");";
    
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not Add Order!";
        exit();
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_insert_id($stmt);
    mysqli_stmt_close($stmt);

    foreach($cartItems as $item) {
        $prodQuantity = GetProductByID($con, $item["id"]);
        $newQuantity = ((int)$prodQuantity["stockQty"]) - ((int)$item["quantity"]);

        $sql = "INSERT INTO order_product (ordersid, productid, qty) VALUES ($result, " . $item["id"] . ", " . $item["quantity"] . ");";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Could not add order products";
            exit();
        }

        mysqli_stmt_execute($stmt);

        $sql = "UPDATE product SET stockQty = '$newQuantity' WHERE id = '" . $item["id"] . "';";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Could not update product quantity";
            exit();
        }

        mysqli_stmt_execute($stmt);
        
    }
    return $result;
}

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

function GetOrdersByUser($con, $userID)
{
    $sql = "SELECT o.*, s.status FROM orders o JOIN orderstatus s ON o.statusid = s.id  WHERE o.userid = '$userID' ORDER BY createddate DESC;";

    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not load User Orders";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

function GetOrderbyID($con, $orderid)
{
    $sql = "SELECT o.*, s.status, p.*, op.* FROM orders o JOIN orderstatus s ON o.statusid = s.id JOIN order_product op ON o.id = op.ordersid JOIN product p ON p.id = op.productid WHERE o.id = '$orderid';";

    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Could not load User Orders";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}
