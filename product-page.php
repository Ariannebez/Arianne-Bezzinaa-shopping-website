<?php 
require_once 'includes/functions.php';
require_once 'includes/dbfunctions.php';

$isLoggedIn = false;

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

                    <form action="/action_page.php">
                        <label for="quantity" class="my-4">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" min="1" max="15" value="69">
                    </form>
                    <?php if($isLoggedIn) : ?>
                    <div class="row">
                        <div class="col">
                            <form method="POST">
                                <?php if(!$isInWishlist) : ?>
                                    <button class="btn btn-primary" type="submit" name="addToWishlist">
                                        <ion-icon name="heart-outline"></ion-icon>
                                    </button>
                                <?php else: ?>
                                    <button class="btn btn-primary" type="submit" name="removeFromWishlist">
                                        <ion-icon name="heart"></ion-icon>
                                    </button>
                                <?php endif; ?>
                            </form>
                            <?php if($product["Stock"] > 0) : ?>
                                <form method="POST">
                                    <button name="addToCart" type="submit" class="btn btn-primary">ADD TO CART</button>
                                </form>
                            <?php else: ?>
                                <button class="btn btn-primary" disabled>Out of stock</button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!--recommend card -->
            <div class="col my-5">
                <h6>Recommend <span style="font-size:30px; font-weight:800;"></span> for you</h6>
                <div class="card mt-1" style="width: 12rem;">
                    <img src="https://ae01.alicdn.com/kf/Sbf39a20a7930445784719142cbbe8228J/Quality-Soft-Leather-Shopper-Bags-for-Women-2022-New-Designer-Handbag-Set-Black-Simple-Female-Shoulder.jpg"
                        alt="...">
                    <div class="card-body">
                        <p class="card-text">Leather Bag</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
        include 'includes/footer.php';
    ?>