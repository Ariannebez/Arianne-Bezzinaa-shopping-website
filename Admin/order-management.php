<?php 
require_once 'includes/functions.php';
require_once 'includes/dbfunctions.php';

//Delete order
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['deleteOrder'])) {
    $orderId = $_POST['deleteOrderId'];
    deleteOrder($con, $orderId);

   
    header("Location: order-management.php");
    exit();
}


$order = getOrder($con);



require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>



<!-- Order Management -->
<div class="container mt-5">

  <div class="col">
    <h2>Order Management</h2>
    <table class="table table-bordered">
        <tr>
            <th>Order ID</th>
            <th>User Id</th>
            <th>Create Date</th>
            <th>Up Date Date</th>
            <th>Address Id</Address></th>
            <th>Order Status Id</th>
            <th>Action</th>
        </tr>
        <?php foreach ($order as $row): 
          
          ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['userid']; ?></td>
            <td><?php echo $row['createddate']; ?></td>
            <td><?php echo $row['updateddate']; ?></td>
            <td><?php echo $row['addressid']; ?></td>
            <td><?php echo $row['statusid']; ?></td>
            <td>
            <form method="POST" action="order-management.php">
            <input type="hidden" name="deleteOrderId" value="<?php echo $row['id']; ?>">
            <button type="submit" name="deleteOrder" class="btn btn-danger">Delete</button>
            </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
  </div>
</div>
</div>


<?php require_once 'includes/footer.php'; ?>