<?php ?>

<?php require_once 'includes/header.php'; 
      require_once 'includes/navbar.php'; ?>

<!-- Order Management -->
<div class="container mt-5">

  <div class="col">
    <h2>Review Management</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Id</th>
          <th>CustomerId</th>
          <th>Order Date</th>
          <th>ProductId</th>
          <th>Qty</th>
          <th>Total Amount</th>
          <th>Order Satatus</th>
          <th>Payment Satatus</th>

        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>303</td>
          <td>10-11-2023</td>
          <td>6</td>
          <td>10</td>
          <td>75.5</td>
          <td>paid</td>
          <td><button type="button" class="btn btn-primary">Edit</button><button type="button"
              class="btn btn-danger">Delete</button></td>

        </tr>
        <tr>
          <td>2</td>
          <td>304</td>
          <td>10-11-2023</td>
          <td>3</td>
          <td>5</td>
          <td>30.5</td>
          <td>paid</td>
          <td><button type="button" class="btn btn-primary">Edit</button><button type="button"
              class="btn btn-danger">Delete</button></td>

        </tr>

      </tbody>
    </table>
  </div>
</div>
</div>


<?php require_once 'includes/footer.php'; ?>