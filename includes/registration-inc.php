<?php
 require_once "functions.php";
 require_once "dbh.php";
 require_once "db-functions.php";

//Getting info from my account sing up.
if(isset($_POST)){

    $username = $_POST["username"];
    $password = $_POST["password"];
    $confPassword = $_POST["confPassword"];
    $email = $_POST["email"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];

    $address = $_POST["address"];
    $street = $_POST["street"];
    $town = $_POST["town"];
   

    //validation
    $passwordsMatch = passwordsMatch($password, $confPassword);
     // ! means if not 
     //if(!$passwordsMatch);
    if($passwordsMatch == false){
        header("location: ../myaccount.php?error=PassworsDoNotMatch");
        exit();
    }

    $validUsername = validUsername($username);
    if($validUsername == false){
        header("location: ../myaccount.php?error=invalidUsername");
        exit();
    }
   

    createApplication($conn, $username, $password, $email, $firstName, $lastName, 
    $address, $street, $town);
}

else{
    header("location: ../myaccount.php");
    exit();
}