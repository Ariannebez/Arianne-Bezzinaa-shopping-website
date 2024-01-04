<?php 
require_once 'includes/functions.php';
require_once 'includes/dbfunctions.php';

if(!isset($_SESSION['USER'])) {
  header("Location: index.php");
}

// Fetching the user's details.
$user = GetUserByID($con, $_SESSION['USER']['id']);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // Check if the 'Add to Cart' button is clicked and a product ID is provided.
  if(isset($_POST['addToCart']) && isset($_POST['prodid'])) {
      $cartItems = [];
      $existingProd = null;
      $updated = false;
      // Load existing cart items from the session if they exist.
      if(isset($_SESSION['CART_ITEMS'])) {
          $cartItems = $_SESSION['CART_ITEMS'];
      }
      // Check if the product is already in the cart.
      if(!empty($cartItems)) {
          foreach($cartItems as $key => $value) {
              if($cartItems[$key]['id']== $_POST['prodid']) {
                  // Increment the quantity if the product is already in the cart.
                  $newQuantity = $cartItems[$key]['quantity'] + 1;
                  if($newQuantity <= $cartItems[$key]['stockQty']) {
                      $cartItems[$key]['quantity'] = $newQuantity;
                      $_SESSION['CART_ITEMS'] = $cartItems;
                      deleteWishlistItem($con, $_POST['prodid'], $_SESSION['USER']["id"]);
                  }
                  $updated = true;
                  break;
              }
          }
      }
      // If the product is not in the cart, add it.
      if(!$updated) {
          $product = GetProductByID($con, $_POST['prodid']);
          $prodToAdd["id"] = $product["id"];
          $prodToAdd["name"] = $product["name"];
          $prodToAdd["title"] = $product["title"];
          $prodToAdd["price"] = $product["price"];
          $prodToAdd["image"] = $product["img"];
          $prodToAdd["stockQty"] = $product["stockQty"];
          $prodToAdd["quantity"] = 1;
          array_push($cartItems, $prodToAdd);
          
          // Update the session with the new cart items.
          $_SESSION['CART_ITEMS'] = $cartItems;
          // Remove the item from the wishlist.
          deleteWishlistItem($con, $_POST['prodid'], $_SESSION['USER']["id"]);

      }
      // Check if the 'Remove from Wishlist' button is clicked and a product ID is provided.
  } else if(isset($_POST['removeItem']) && isset($_POST['prodid'])) {
      // Remove the item from the wishlist.
      deleteWishlistItem($con, $_POST['prodid'], $_SESSION['USER']["id"]);
  }
}

// Retrieve wishlist items for the user.
$wishlistItems = GetWishlistByUser($con, $user["id"]);
$wishlistProducts = [];

// If there are items, get the product details for each.
if (!empty($wishlistItems)) {
  foreach ($wishlistItems as $wishlistProduct) {
      $prod = GetProductByID($con, $wishlistProduct["product"]);
      array_push($wishlistProducts, $prod);
  }
}

$productGroups = ceil(count($wishlistProducts) /3);


require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<div class="container mt-5 mb-5 pb-5">

  <!--cards for items in wish list-->
  <?php for($i = 0; $i < $productGroups; $i++): ?>
  <div class="card-group">
    <?php 
      $limit = ($i*3)+3; 
      if($i == $productGroups-1) { 
        $limit = count($wishlistProducts);
      }
    ?>
    <?php for($j = $i*3; $j < $limit; $j++): ?>
    <div class="card me-3 ">
      <img
        src="<?php echo $wishlistProducts[$j]['img'] ?>"
        class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $wishlistProducts[$j]['name'] ?></h5>
        <p class="card-text">&euro; <?php echo $wishlistProducts[$j]['price'] ?></p>
      </div>
      <form method="POST">
        <div class="card-footer">
          <small class="text-body-secondary">
            <!--Btn add to cart or remove from wish list-->
            <input type="hidden" name="prodid" value="<?php echo $wishlistProducts[$j]['id'] ?>">
            <button class="btn btn-primary" name="addToCart">
              Add To Cart
            </button>
            <button name="removeItem" class="btn btn-primary">Remove</button>
            <!--end of buttons-->
          </small>
        </div>
      </form>
    </div>
    <?php endfor; ?>
  </div>
  <?php endfor; ?>

  <!--cards end here-->

</div>

<?php
        include 'includes/footer.php';
    ?>