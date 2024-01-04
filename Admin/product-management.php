<!--add, edit and delet products in admin-->


<?php 
      require_once 'includes/functions.php';
      require_once 'includes/dbfunctions.php';

      //Loading product from database
      $products = getProducts($con);

      // Delete product
    if (isset($_GET['delete'])) {
        $productId = $_GET['delete'];

        if (deleteProduct($con, $productId)) {
            // Success message
            $message = "Product Deleted Successfully";
        } else {
            // Error message
            $message = "Error Deleting Product";
        }

        header('Location: product-management.php');
        exit();
    }


    // Adding new product
    if (isset($_POST['add_product'])) {
            
        
            // Call the function and pass the form data and file
            $result = addProduct($con, $_POST['name'], $_POST['title'], $_POST['description'], $_POST['category'], $_POST['price'], $_POST['stockQty'], $_POST['img']);

        
            if ($result) {
                echo "Product added successfully!";
            } else {
                echo "Error adding product.";
            }

            header('Location: product-management.php');
            exit();
        }
        

      require_once 'includes/header.php'; 
      require_once 'includes/navbar.php'; 
 ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2"> 
            <h1>Add New Product</h1>
            <form action="product-management.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>

                <div class="form-group">
                    <label for="category">Category: Enter category number - 1 if your product is jewellery, 2 for bags and 3 for cermics</label>
                    <input type="text" class="form-control" id="category" name="category" required>
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="stockQty">Stock Quantity:</label>
                    <input type="number" class="form-control" id="stockQty" name="stockQty" required>
                </div>

                <div class="form-group">
                    <label for="img">Image: Enter link</label>
                    <input type="text" class="form-control" id="img" name="img" required>

                </div>

                <button type="submit" class="btn btn-primary" name="add_product">Add Product</button>
            </form>
        </div>
    </div>
</div>       
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col col-md-6">
        <h1>Products Available In Shop</h1>
        <?php foreach ($products as $product) : ?>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?php echo $product['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $product['name']; ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product['name']; ?></h5>
                    <p class="card-text"><?php echo $product['description']; ?></p>
                    <p class="card-text"><small class="text-muted">Price: &euro;<?php echo $product['price']; ?></small></p>
                    <p class="card-text"><small class="text-muted">Stock Qty: <?php echo $product['stockQty']; ?></small></p>
                    <!--BTN edit or delete-->
                    <a href="edit-product.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">Edit</a>
                    
                    <form action="product-management.php" method="GET">
                    <input type="hidden" name="delete" value="<?php echo $product['id']; ?>">
                    <button class="btn btn-danger mt-3" type="submit">Delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
        </div>
    </div>
</div>




<?php require_once 'includes/footer.php'; ?>