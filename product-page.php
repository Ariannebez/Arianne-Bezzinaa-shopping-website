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
        // ... existing addToCart logic ...
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

                    <form method="POST">
                    <label for="quantity" class="my-4">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="99" value="1">
                    
                    <div class="row">
                        <div class="col">
                        <button class="btn btn-primary" type="submit" name="addToWishlist" <?php if(!$isLoggedIn) echo 'disabled'; ?>>
                        <!-- Display heart-outline by default, switch to heart if user is logged in and item is in wishlist -->
                        <ion-icon name="<?php echo ($isLoggedIn && $isInWishlist) ? 'heart' : 'heart-outline'; ?>"></ion-icon>
                        </button>
                            
                            <?php if($product["stockQty"] > 0) : ?>
                                <button name="addToCart" type="submit" class="btn btn-primary" <?php if(!$isLoggedIn) echo 'disabled'; ?>>ADD TO CART</button>
                            <?php else: ?>
                                <button class="btn btn-primary" disabled>Out of stock</button>
                            <?php endif; ?>

                            <?php if(!empty($error)) : ?>
                                <h4 class="my-2 text-danger"><?php echo $error; ?></h4>
                            <?php endif; ?>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
  