<?php
require "includes/functions.php";
require "includes/dbfunctions.php";

//the following will reset the session data completely:
session_unset(); // It will remove all session variables.
session_destroy(); // It will destroy the session itself.
session_regenerate_id(); // and generate a new session ID.

// Takes the user back to the index.php homepage.
// and ends the script.
header("Location: index.php"); 
die; 
?>