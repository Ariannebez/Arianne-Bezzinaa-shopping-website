<?php
require "includes/functions.php";
require "includes/dbfunctions.php";

//the following will reset the session data completely:
session_unset(); // Remove all session variables.
session_destroy(); // Destroy the session itself.
session_regenerate_id(); // Generate a new session ID.

// Redirects the user to the homepage (index.php).
header("Location: index.php"); 
die; // Terminates the script.
?>