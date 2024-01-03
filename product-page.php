<?php 
require_once 'includes/functions.php';
require_once 'includes/dbfunctions.php';

$isLoggedIn = false;
$error = null;

if (isset($_GET['id'])) {
    $product = GetProductByID($con, $_GET['id']);
} else {
    header("Location: index.php");
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST["addToWishlist"])) {
        createWishlistItem($con, $_GET["id"], $_SESSION["USER"]["id"]);
    } else if(isset($_POST["removeFromWishlist"])) {
        deleteWishlistItem($con, $_GET["id"], $_SESSION["USER"]["id"]);
    } else if (isset($_POST["addToCart"])) {
        $newQuantity = (int) $_POST["quantity"];
        $cartItems = [];
        $existingProd = null;
        $updated = false;
        // Check if there are existing cart items in the session.
        if(isset($_SESSION['CART_ITEMS'])) {
            $cartItems = $_SESSION['CART_ITEMS'];
        }
        // Loop through cart items to check if the product is already added.
        if(!empty($cartItems)) {
            foreach($cartItems as $key => $value) {
                // If product is found, increase the quantity.
                if($cartItems[$key]['id'] == $product['id']) {
                    $newQuantity = $cartItems[$key]['stockQty'] + $newQuantity;
                    // Ensure the new quantity does not exceed stock.
                    if($newQuantity <= $product['stockQty']) {
                        $cartItems[$key]['quantity'] = $newQuantity;
                        $_SESSION['CART_ITEMS'] = $cartItems;
                    } else {
                        $error = 'We do not have that amount in stock, please reduce the quantity.';
                    }
                    $updated = true;
                    break;
                }
            }
        }
        // If the product is not already in the cart, add it.
        if(!$updated) {
            if($product['stockQty'] >= $newQuantity) {
                $prodToAdd["id"] = $product["id"];
                $prodToAdd["name"] = $product["name"];
                $prodToAdd["title"] = $product["title"];
                $prodToAdd["price"] = $product["price"];
                $prodToAdd["image"] = $product["img"];
                $prodToAdd["stockQty"] = $product["stockQty"];
                $prodToAdd["quantity"] = $newQuantity;
                array_push($cartItems, $prodToAdd);

                $_SESSION['CART_ITEMS'] = $cartItems;
            } else {
                $error = 'We do not have that amount in stock, please reduce the quantity.';
            }
        }
    }
}

if(isset($_SESSION['USER'])) {
    $isLoggedIn = true;
    $wishlist = GetWishlistItem($con, $_SESSION['USER']['id'], $product['id']);
    $isInWishlist = $wishlist->num_rows > 0;
}

require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<div class="container-fluid col-10">
    <div class="row mt-3 justify-content-center">
        <div class="col">
            <img class="w-100" src="<?php echo $product['img']; ?>" alt="">
        </div>
        <!--carousel end here-->

        <!--col with a card detials-->
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h1><?php echo $product['name']; ?></h1>
                </div>
                <div class="card-body my-4">
                    <p class="card-text">
                        <?php echo $product['description']; ?>
                    </p>
                    <h2>&euro; <?php echo $product['price']; ?></h2>
                    <?php if($isLoggedIn) : ?>
                    <form method="POST">
                    <label for="quantity" class="my-4">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="99" value="0">
                    
                    <div class="row">
                        <div class="col">
                            
                                <?php if(!$isInWishlist) : ?>
                                    <button class="btn btn-primary" type="submit" name="addToWishlist">
                                        <ion-icon name="heart-outline"></ion-icon>
                                    </button>
                                <?php else: ?>
                                    <button class="btn btn-primary" type="submit" name="removeFromWishlist">
                                        <ion-icon name="heart"></ion-icon>
                                    </button>
                                <?php endif; ?>
                            
                            <?php if($product["stockQty"] > 0) : ?>
                                
                                    <button name="addToCart" type="submit" class="btn btn-primary">ADD TO CART</button>
                                
                            <?php else: ?>
                                <button class="btn btn-primary" disabled>Out of stock</button>
                            <?php endif; ?>
                            <?php if(!empty($error)) : ?>
                                <h4 class="my-2 text-danger"><?php echo $error; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    </form>
                    <?php endif; ?>
                </div>
            </div>

           

<?php
        include 'includes/footer.php';
    ?>
             