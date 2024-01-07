<?php
require_once 'includes/functions.php';
require_once 'includes/dbfunctions.php'; 

$product = null;
if(isset($_GET['productId'])) {
    $product = GetProductByID($con, $_GET['productId']);
}

$actionUrl = 'product-management.php';


if(isset($_POST['update_product'])) {
    $product = [
        "id" => $_POST['id'], // Ensure this is passed in the form
        "name" => $_POST['name'],
        "description" => $_POST['description'],
        "categoryid" => $_POST['categoryid'],
        "price" => $_POST['price'],
        "stockQty" => $_POST['stockQty'],
        "img" => $_POST['img']
    ];

    if(updateProduct($con, $product)) {
        // Redirect to product-management.php
        header("Location: product-management.php");
        exit();
    } else {
        echo "Error updating product";
    }
}



require_once 'includes/header.php'; 
require_once 'includes/navbar.php'; 
?>

<div class="container mt-5">
    
    <div class="row">
        <div class="col-md-8 offset-md-2"> 
            <!-- Back Button -->
            <button type="button" class="mb-3 btn btn-primary" onclick="location.href='product-management.php'">Go Back to Product Management</button>
            <h1><?php echo $product ? 'Edit Product' : 'Add New Product'; ?></h1>
            <form action="<?php echo $actionUrl; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required value="<?php echo $product ? $product['name'] : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required value="<?php echo $product ? $product['title'] : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" required><?php echo $product ? $product['description'] : ''; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="categoryid">Category: Enter category number - 1 if your product is jewellery, 2 for bags and 3 for ceramics</label>
                    <input type="text" class="form-control" id="categorid" name="categoryid" required value="<?php echo $product ? $product['categoryid'] : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" required value="<?php echo $product ? $product['price'] : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="stockQty">Stock Quantity:</label>
                    <input type="number" class="form-control" id="stockQty" name="stockQty" required value="<?php echo $product ? $product['stockQty'] : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="img">Image: Enter link</label>
                    <input type="text" class="form-control" id="img" name="img" required value="<?php echo $product ? $product['img'] : ''; ?>">
                </div>

                <input type="hidden" name="id" value="<?php echo $product ? $product['id'] : ''; ?>">

                <button type="submit" class="btn btn-primary mb-5" name="<?php echo $product ? 'update_product' : 'add_product'; ?>">
                Update Product 
                </button>
            </form>
        </div>
    </div>
</div>

