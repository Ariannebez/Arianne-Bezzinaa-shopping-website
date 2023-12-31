<?php
$getCategories = GetCategories($con);
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary bg-custom navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <!--link to Home page-->
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php">Home</a>
                </li>

                <!--Drop catalog for viewing of products -->
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle border-0" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Product Category
                    </button>
                    <ul class="dropdown-menu">
                        <div class="row justify-content-center">
                            <?php foreach ($getCategories as $category):
                            ?>
                            <li><a class="dropdown-item"
                                    href="shop.php?category=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a>
                            </li>
                            <?php endforeach; ?>
                    </ul>
                </div>


                <!--Link to about us page-->
                <li class="nav-item">
                    <a class="nav-link text-white" href="aboutUs.php">About Us</a>
                </li>

                <!--Link to conact us page-->
                <li class="nav-item">
                    <a class="nav-link text-white" href="contactUs.php">Contact Us</a>
                </li>

            </ul>


            <!-- Profile -->
            <?php if(!isset($_SESSION["USER"])) { echo 
                    '<a class="nav-link btn me-2" href="myaccount.php">
                    <ion-icon size="large" name="person"></ion-icon></a>';
                } else {
                    echo '<a class="nav-link btn me-2" href="profile.php">
                    <ion-icon size="large" name="person"></ion-icon>
                </a>';
                }
                ?>

            <!-- Wish -->
            <a class="nav-link btn me-2" href="wishlist.php">
                <ion-icon size="large" name="heart"></ion-icon>
            </a>

            <!-- Cart -->
            <a class="nav-link btn me-4" href="cart.php">
                <ion-icon size="large" name="cart"></ion-icon>
            </a>

            <form class="d-flex" role="search" method="GET" action="shop.php">
                <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>