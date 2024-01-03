<?php 

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

//Database connection
$serverName = "localhost"; // The hostname of the database server.
$dbUsername = "root";      // The username for accessing the database.
$dbPassword = "root";          // The password for the database user.
$dbName = "shoppingWebsite";       // The name of the database to connect to.

// Attempt to establish a connection.
$con = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

// Check if the connection was successful. If not, end the script and output an error message.
if(!$con) {
    die("Connection failed: ".mysqli_connect_error());
}

?>

