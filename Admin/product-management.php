<!--add, edit and delet products in admin-->


<?php 
      require_once 'includes/functions.php';
      require_once 'includes/dbfunctions.php';

      if (isset($_POST['add_product'])) {
            
        
            // Call the function and pass the form data and file
            $result = addProduct($con, $_POST['name'], $_POST['title'], $_POST['description'], $_POST['category'], $_POST['price'], $_POST['stockQty'], $_POST['image']);

        
            if ($result) {
                echo "Product added successfully!";
            } else {
                echo "Error adding product.";
            }
        }
        

      require_once 'includes/header.php'; 
      require_once 'includes/navbar.php'; 
 ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2"> <!-- Adjust column sizes as needed -->
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
                    <label for="category">Category:</label>
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
                    <label for="image">Image:</label>
                    <input type="text" class="form-control" id="image" name="image" required>

                </div>

                <button type="submit" class="btn btn-primary" name="add_product">Add Product</button>
            </form>
        </div>
    </div>
</div>




<?php require_once 'includes/footer.php'; ?>