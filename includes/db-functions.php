<?php

//puting date intom the database 
function createSingup($conn, $username, $password, $email, $firstName, $lastName, 
$address, $street, $town, $course){

    $sql = "INSERT INTO users (username, password, email, firstName, lastName,
    address, street, town, course, applicationDate) VALUES (?,?,?,?,?,?,?,?,?,?); ";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    //Default date
    $applicationDate = date("y-m-d");

    //Hashed password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssssss", $username, $hashedPassword, $email, 
    $firstName, $lastName, $address, $street, $town, $course, $applicationDate);

    mysqli_stmt_execute($stmt);
    //closing conecting
    mysqli_stmt_close($stmt);

    header("location: ../index.php?success=true");
}