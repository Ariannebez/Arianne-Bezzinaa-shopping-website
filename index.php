<?php
    include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>
<!--Image  slide show -->
 <div class="container">
    <div class="row ">

        <div id="carouselExampleCaptions" class="carousel slide ">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://decobate.com/wp-content/uploads/2023/05/Copy-of-etsy-35.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block textc">
            <h5>Ceramics</h5>
            <p>Made by hand</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://weareportugal.com/cdn/shop/collections/ceramics-header.png?v=1640640569" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block textc">
            <h5>Get your personalized Ceramics</h5>
            <p>You can choose from a vartiey of ceramic products</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://t4.ftcdn.net/jpg/03/97/34/39/360_F_397343924_6WlXOaMVHNKkhMs2l8AHJ5e9MQ03YiBU.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block textc">
            <h5>Jewellery</h5>
            <p>Hand made jewellery</p>
            </div>
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
        </div>
    </div>
 </div>   

 <!--Cards-->
 <div class="container mt-5 ">
    <div class="row justify-content-center mb-3">
        <div class="col-auto">
        <div class="card" style="width: 18rem;">
        <img src="https://www.daisyjewellery.com/cdn/shop/collections/GoldJewellery_1200x1200.jpg?v=1666184925" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">Jewellery</h5>
        <p class="card-text">Explore our exclusive collection of handmade jewelry, where artistry meets individuality. Each piece tells a story, making your choice truly special.</p>
        <a href="jewellery.php" class="btn btn-primary">Visit Jewellery</a>
        </div>
        </div>
        </div>

        <div class="col-auto">
        <div class="card" style="width: 18rem;">
        <img src="https://cf.shopee.sg/file/9eaaa8f34906eeef7faaf3913db83d6b" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">Bags</h5>
        <p class="card-text">Discover our exclusive line of handmade bags, where craftsmanship meets individuality. Each piece tells a unique story, ensuring a distinctive accessory.</p>
        <a href="bags.php" class="btn btn-primary">Visit Bags</a>
        </div>
        </div>
        </div>

        <div class="col-auto">
        <div class="card" style="width: 18rem;">
        <img src="https://i.etsystatic.com/16014158/r/il/edc565/1504841910/il_300x300.1504841910_rxpw.jpg" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">Ceramics</h5>
        <p class="card-text">Discover unique handmade ceramics, each piece telling a story. Elevate your space with exquisite craftsmanship and individuality in every creation.</p>
        <a href="ceramics.php" class="btn btn-primary">Visit Ceramics</a>
        </div>
        </div>
        </div>
    </div>
 </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

<?php
        include 'includes/footer.php';
    ?>