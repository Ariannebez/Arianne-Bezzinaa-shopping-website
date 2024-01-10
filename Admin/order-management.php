<?php 

require_once 'includes/functions.php';
require_once 'includes/dbfunctions.php';

$order = getOrder($con);
?>

<?php require_once 'includes/header.php'; 
      require_once 'includes/navbar.php'; ?>

<!-- Order Management -->
<div class="container mt-5">

  <div class="col">
    <h2>Review Management</h2>
    <table border="1">
        <tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Product ID</th>
            <th>Quantity</th>
            <th>Total Amount</th>
            <th>Order Status</th>
            <th>Action</th>
        </tr>
        <?php foreach ($order as $row): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['userid']; ?></td>
            <td><?php echo $row['createddate']; ?></td>
            <td><?php echo $row['updateddate']; ?></td>
            <td><?php echo $row['addressid']; ?></td>
            <td><?php echo $row['statusid']; ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="delete_order_id" value="<?php echo $row['id']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
  </div>
</div>
</div>


<?php require_once 'includes/footer.php'; ?>