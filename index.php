<?php 
require_once 'includes/functions.php';
require_once 'includes/dbfunctions.php';

?>

<?php
        require_once 'includes/header.php';
        require_once 'includes/navbar.php';
    ?>



<!--Image slide show -->
<div class="container">
    <div class="row">

        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://decobate.com/wp-content/uploads/2023/05/Copy-of-etsy-35.jpg" class="d-block w-100"
                        alt="...">
                    <div class="carousel-caption d-none d-md-block textc">
                        <h5>Ceramics</h5>
                        <p>Made by hand</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://weareportugal.com/cdn/shop/collections/ceramics-header.png?v=1640640569"
                        class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block textc">
                        <h5>Get your personalized Ceramics</h5>
                        <p>You can choose from a vartiey of ceramic products</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://t4.ftcdn.net/jpg/03/97/34/39/360_F_397343924_6WlXOaMVHNKkhMs2l8AHJ5e9MQ03YiBU.jpg"
                        class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block textc">
                        <h5>Jewellery</h5>
                        <p>Hand made jewellery</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

<!--Cards-->

<div class="container my-4">

    <div class="row justify-content-center">
        <?php foreach ($getCategories as $category):
            ?>
        <div class="col">
            <div class="card mb-5" style="width: 18rem;">
                <img src="<?php echo $category['image']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $category['name']; ?></h5>
                    <p class="card-text"><?php echo $category['description']; ?></p>
                    <a href="shop.php?category=<?php echo $category['id']; ?>" class="btn btn-primary">Visit <?php echo $category['name']; ?></a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</div>


<?php
        include 'includes/footer.php';
    ?>