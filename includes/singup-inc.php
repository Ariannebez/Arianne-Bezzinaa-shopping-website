<?php
 require_once "functions.php";
 require_once "dbh.php";
 require_once "db-functions.php";

//Getting info from registration
if(isset($_POST)){

    $username = $_POST["username"];
    $password = $_POST["password"];
    $confPassword = $_POST["confPassword"];
    $email = $_POST["email"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];

    //validation
    $passwordsMatch = passwordsMatch($password, $confPassword);
     // ! means if not 
     //if(!$passwordsMatch);
    if($passwordsMatch == false){
        header("location: ../index.php?error=PassworsDoNotMatch");
        exit();
    }

    $validUsername = validUsername($username);
    if($validUsername == false){
        header("location: ../index.php?error=invalidUsername");
        exit();
    }
   

    createSingup($conn, $username, $password, $email, $firstName, $lastName, 
    $address, $street, $town, $course);
}

else{
    header("location: ../index.php");
    exit();
}