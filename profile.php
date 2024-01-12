<?php 
require_once 'includes/functions.php';
require_once 'includes/dbfunctions.php';


if(!isset($_SESSION['USER'])) {
    header("Location: index.php");
}
  
//Getting user by id
$user = GetUserByID($con, $_SESSION['USER']['id']);

require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>


<div class="container">

    <div class="row mt-5">
        <div class="row text-center">
            <h1>My Account</h1>
        </div>

        <div class="card">
            <h5 class="card-header">My Profile</h5>
            <div class="card-body">
                <h5 class="card-title">
                    <a class="btn btn-primary me-3" href="userdetails.php">
                    <ion-icon size="large" name="people"></ion-icon>
                    </a>
                    <?php echo $user['firstName'] . ' ' . $user['lastName']; ?></h5>
                <p>Click to edit</p>

            </div>
        </div>
    </div>
    <!--row closes -->
</div>
<!--con closes -->


<!-- new con-->
<div class="container">

    <div class="row mt-5">
        <div class="card">
            <h5 class="card-header">My Orders</h5>
            <div class="card-body">
                <h5 class="card-title">
                    <a class="btn btn-primary me-3" href="orderlist.php">
                    <ion-icon size="large" name="cart"></ion-icon>
                    </a>
                    Orders</h5>
                <p>Click to View</p>
            </div>
        </div>
    </div>
    <!--row closes -->
</div>
<!--con closes -->


<!-- new con-->
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="card ">
            <h5 class="card-header">Wishlist</h5>
            <div class="card-body">
                <h5 class="card-title">
                    <a class="btn btn-primary me-3" href="wishlist.php">
                    <ion-icon size="large" name="heart"></ion-icon>
                    </a>
                    Wishlist</h5>
                <p>Click to View</p>
            </div>
        </div>
    </div>

    <!--row closes -->
</div>
<div class="container">
    <div class="row mt-5 mb-5 pb-5">
        <div class="card ">
            <div class="card-body">
                <h5 class="card-title">
                    <a class="btn btn-primary me-3" href="signout.php">
                    <ion-icon size="large" name="log-out"></ion-icon>
                    </a>
                    Sign Out</h5>
            </div>
        </div>
    </div>

    <!--row closes -->
</div>
<!--con closes -->

<?php
        include 'includes/footer.php';
    ?>