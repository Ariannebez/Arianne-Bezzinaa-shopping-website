<?php 
require_once 'includes/functions.php';
require_once 'includes/dbfunctions.php';

if(!isset($_SESSION['USER'])) {
    header("Location: index.php");
}

//Getting user by idea 
$user = GetUserByID($con, $_SESSION['USER']['id']);
//Getting order by user 
$orderlist = GetOrdersByUser($con, $user['id']);

require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>


<div class="container mb-4">
    <div class="row mt-5">
        <h1>My Orders</h1>
        <?php foreach($orderlist as $order): ?>
        <div class="card col-10 mb-4">
            <div class="row card-header">
                <div class="col-10">
                    <h5>Order ID: <?php echo $order['id']; ?></h5>
                </div>
                <div class="col-2">
                    <a href="orderdetails.php?id=<?php echo $order['id']; ?>" class="btn btn-success">Order Details</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-10">
                        <h5 class="card-title">
                            <p>Last Updated: <?php echo $order['updateddate'] ?></p>
                    </div>
                    <div class="col-2">
                        <p>Status: <?php echo $order['status'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <!--row closes -->
</div>

<?php
        include 'includes/footer.php';
    ?>