<?php 
require_once 'includes/functions.php';
require_once 'includes/dbfunctions.php';


?>

<?php require_once 'includes/header.php'; 
      require_once 'includes/navbar.php'; ?>

<!-- HTML Table to display role data -->
<div class="container">
      <div class="row">
            <div class="col mt-5">
 <h1>Categories</h1>       
<table class="table table-bordered mt-5">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Image</th>
    </tr>

    <?php
    // Assuming $con is your database connection
    $categories = getCategories($con);

    // Check if there are any results
    if (!empty($categories)) {
        // Output data of each row
        foreach ($categories as $category) {
            echo "<tr>";
            echo "<td>" . $category['id'] . "</td>";
            echo "<td>" . $category['name'] . "</td>";
            echo "<td><img src='" . $category['image'] . "' alt='" . $category['name'] . "' class='category-image' /></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No results found</td></tr>";
    }
    ?>

</table>
            </div>
      </div>
</div>

<?php require_once 'includes/footer.php'; ?>