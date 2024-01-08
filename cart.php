<?php 
require_once 'includes/functions.php';
require_once 'includes/dbfunctions.php';

if(!isset($_SESSION['USER'])) {
  header("Location: index.php");
}

// Fetching the user's details.
$user = GetUserByID($con, $_SESSION['USER']['id']);
$address = GetAddressesByUser($con, $user['id']);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if(isset($_POST['removeItem'])) {
    foreach($_SESSION['CART_ITEMS'] as $key => $itm) {
        if ($itm['id'] == $_POST['prodid']) {
            unset($_SESSION['CART_ITEMS'][$key]);
        }
    }
  } else if (isset($_POST['updateProduct'])) {
    foreach($_SESSION['CART_ITEMS'] as $key => $itm) {
      if ($itm['id'] == $_POST['prodid']) {
          if($itm['stockQty'] >= (int)$_POST['quantity']) {
            $_SESSION['CART_ITEMS'][$key]['quantity'] = (int)$_POST['quantity'];
          }
      }
    }
  } else if(isset($_POST['clearCart'])) {
    unset($_SESSION['CART_ITEMS']);
  } else if(isset($_POST['confirmOrder'])) {
      $cartItems = $_SESSION['CART_ITEMS'];
      $result = createOrder($con, $user, $address, $cartItems);
      if($result) {
          unset($_SESSION["CART_ITEMS"]);
          header("location: orderConfirmed.php?orderno=$result");
      }
  }
}

$cartItems = null; // Cart items.
$total = 0; // Total cost including delivery.

// Calculate totals if there are items in the cart.
if(isset($_SESSION['CART_ITEMS'])) {
  $cartItems = $_SESSION['CART_ITEMS']; // Load items from session.
  // Calculate subtotal from item prices and quantities.
  foreach($cartItems as $key => $item) {
    $total += $item['price'] * $item['quantity'];
  }

}



require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<div class="container">

<?php if(isset($cartItems) && !empty($cartItems)) : ?>
  <?php foreach($cartItems as $item) : ?>
  <form method="POST">
  <div class="row mt-3"></div>
  <div class="card mb-3 w-100" style="">
    <div class="row g-0">
      <div class="col-md-4">
        <img class="imgdiv"
          src="<?php echo $item['image']; ?>"
          class="img-fluid rounded-start" alt="...">
      </div>
      
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?php echo $item['name']; ?></h5>
            <p class="card-text"><?php echo $item['title']; ?></p>
            <p class="card-text"><small class="text-body-secondary">
                <h1>&euro; <?php echo number_format($item['price'], 2); ?></h1>
              </small></p>
              <label for="quantity">Quantity:</label>
              <input type="number" id="quantity" name="quantity" min="1" max="15" value="<?php echo $item['quantity']; ?>">
              <input type="hidden" name="prodid" value="<?php echo $item['id']; ?>">
            <button class="btn btn-primary" name="updateProduct">
              Update
            </button>
            <button class="btn btn-primary" name="removeItem">Remove</button>
            <!--end of buttons-->
          </div>
        </div>
      
    </div>
  </div>
  </form>
  <?php endforeach; ?>
  

  <div class="row mb-5">
    <div class="card cardCheckOut mb-3">
      <div class="card-header">
        Checkout
      </div>
      <div class="card-body h-100">
        <p class="card-text">Your total is &euro; <?php echo number_format($total, 2) ?></p>
        <h5 class="card-title">Order Details:</h5>
        <form method="POST">
        <label>Name:</label>
        <label><?php echo $user['firstName'] ?></label>
        <br>
        <label>Surname:</label>
        <label><?php echo $user['lastName'] ?></label>
        <br>
        <label>Address:</label>
        <label><?php echo $address['street'] ?></label>
        <br>
        <label>City:</label>
        <label><?php echo $address['city'] ?></label>
        <br>
        <label>ZipCode:</label>
        <label><?php echo $address['zipCode'] ?></label>
        <br>
        <label>Region:</label>
        <label><?php echo $address['region'] ?></label>
        <br>
        <label>Mobile No:</label>
        <label><?php echo $user['mobile'] ?></label>
        <br>
          <button name="confirmOrder" class="btn btn-primary">Confirm Order</button> or 
        
          <button name="clearCart" class="btn btn-primary">Clear Cart</button>
        </form>
      </div>
    </div>
  </div>
  <?php else : ?>
    <h2>You have no items in your shopping cart</h2>
  <?php endif; ?>
</div>


<?php
  include 'includes/footer.php';
?>
    
    