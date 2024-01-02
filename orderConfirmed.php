<?php 
require_once 'includes/functions.php';
require_once 'includes/dbfunctions.php';

if(!isset($_SESSION['USER']) || !isset($_GET["orderno"])) {
    header("Location: index.php");
}
$orderNumber = null;

if(isset($_GET["orderno"])) {
    $orderNumber = $_GET["orderno"];
}

require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<h1>Your order, number: <?php echo $orderNumber; ?> has been received! <br>Thank you for your order!</h1>


<?php
  include 'includes/footer.php';
?>