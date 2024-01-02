<?php 
require_once 'includes/functions.php';
require_once 'includes/dbfunctions.php';

if(!isset($_SESSION['USER']) || !isset($_GET['id'])) {
    header("Location: index.php");
}
  
$user = GetUserByID($con, $_SESSION['USER']['id']);

$orderProducts = GetOrderbyID($con, $_GET['id']);
$orderDetails = $orderProducts->fetch_assoc();
$total = 0;

require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>


<div class="container mb-4">
    <div class="row mt-5">
        <h1>My Orders</h1>
        <div class="card col-10 mb-4">
            <div class="row card-header">
                <div class="col-10">
                    <h5>Order ID: <?php echo $orderDetails['ordersid'] ?></h5>
                </div>
                <div class="col-2">
                <p>Status: <?php echo $orderDetails['status'] ?></p>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-10">
                        <h5 class="card-title">
                            <p>Order Date: <?php echo $orderDetails['createddate'] ?></p>
                            <p>Last Update: <?php echo $orderDetails['updateddate'] ?></p>
                            <?php foreach($orderProducts as $product) : ?>
                            <div class="row">
                                <div class="col">
                                    <p><?php echo $product['name'] . ' X'. $product['qty'] ?></p>
                                </div>
                                <div class="col">
                                    <p>
                                        &euro;<?php echo number_format($product['price'], 2) ?>
                                    </p>
                                </div>

                            </div>
                            <?php $total += ((int)$product['qty']) * ((float)$product['price']); ?>
                            <?php endforeach; ?>
                            <h3>Total: &euro;<?php echo number_format($total, 2) ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--row closes -->
</div>

<?php
        include 'includes/footer.php';
    ?>