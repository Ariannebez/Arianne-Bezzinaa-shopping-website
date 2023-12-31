<?php 
require_once 'includes/functions.php';
require_once 'includes/dbfunctions.php';
$category = null;
$search = null;

if (isset($_GET['search'])) {
    $search = $_GET['search'];

} else if (isset($_GET['category'])) {
    $category = $_GET['category'];
}

$products = GetProducts($con, $category, $search);


?>

<?php
        require_once 'includes/header.php';
        require_once 'includes/navbar.php';
    ?>

<div class="container">
    <div class="row justify-content-center mt-5 ">
        <h4>Shop</h4>
    </div>
</div>


<!--old cards-->
<div class="container ">
    <div class="row justify-content-center">
        <?php foreach ($products as $product): ?>
        <div class="col-4 mb-5">
            <div class="card" style="width: 18rem;">
                <img src="<?php echo $product['img']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product['name']; ?></h5>
                    <p class="card-text">
                        <h2>&euro; <?php echo $product['price']; ?></h2>
                    </p>
                    <a href="product-page.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">More detials</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>


<?php
        include 'includes/footer.php';
    ?>
    
