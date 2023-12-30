<?php

//adding town into sing up page
function loadTowns($conn){
    $sql = "SELECT * FROM town;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "Could not load town";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

//loding Status
function loadStatus($conn){
    $sql = "SELECT * FROM Userstatus;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "Could not load status";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}

//puting date from my account intom the database 
//createApplication function to insert into application on the database
//the applications are users signing up for the 1st time
function createApplication($conn, $username, $password, $email, $firstName, $lastName, 
$address, $street, $town){

    $sql = "INSERT INTO application (username, password, email, firstName, lastName,
    address, street, town, applicationDate) VALUES (?,?,?,?,?,?,?,?,?); ";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    //Default date
    $applicationDate = date("y-m-d");

    //Hashed password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssssss", $username, $hashedPassword, $email, 
    $firstName, $lastName, $address, $street, $town, $applicationDate);

    mysqli_stmt_execute($stmt);
    //closing conecting
    mysqli_stmt_close($stmt);

    header("location: ../index.php?success=true");
}

function loadAllJewellery($conn){
    $sql = "SELECT * FROM products WHERE categoryid = 1";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Could not load Applications";
        exit();
    }

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    return $result;
}



function userExists($conn, $username){
    $sql = "SELECT username, password FROM application WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../myaccount.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else {
        return false;
    }
}
