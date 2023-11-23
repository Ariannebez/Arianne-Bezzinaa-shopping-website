<?php
        include 'includes/header.php';
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bags</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>

<div class="container-fluid">
    
<div class="row mt-1">
<div class="col">
<a class="btn btn-primary" href="bags.php">
<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
    </a>
</div>
</div>

<div class="row mt-3">
<div class="col">
    <!--carousel -->
    <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="https://images.selfridges.com/is/image/selfridges/040923_BAGS_CLP_UPDATE_NEW_SEASON_EXPERT_EDIT?wid=1920&fmt=jpg&fit=constrain&qlt=95,1" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
    <img src="https://5.imimg.com/data5/SELLER/Default/2022/11/PX/ZY/PV/44417390/product-jpeg-250x250.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
    <img src="https://cf.shopee.sg/file/9eaaa8f34906eeef7faaf3913db83d6b" class="d-block w-100" alt="...">
    </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
    </button>
    </div>
    </div>
    <!--carousel end here-->

    <!--col with a card detials-->
    <div class="col">

    <div class="card">
    <div class="card-header">
    <h1>Bags</h1>
    </div>
    <div class="card-body">
    <h5 class="card-title">Handmade Bags from Recycled Leather</h5>
    <p class="card-text">

    <li>Reusable, lightweight go-everywhere.</li> 
    <li>Water resistance</li>   
    <li>Hand wash in cold water</li>

    </p>
    <h2>&euro; 35</h2>

    <form action="/action_page.php">
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" min="1" max="15">
    </form>
    <div class="row">
    <div class="col">
    <a class="btn btn-primary" href="">
    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
    </a>

    <a href="cart.php" class="btn btn-primary">ADD TO CART</a>
    </div>
    </div>
    </div>
    </div>
    
    <!--recommend card -->
    <div class="col mt-3">
    <h6>Recommend it for you</h6>
    <div class="card mt-1" style="width: 12rem;">
    <img src="https://ae01.alicdn.com/kf/Sbf39a20a7930445784719142cbbe8228J/Quality-Soft-Leather-Shopper-Bags-for-Women-2022-New-Designer-Handbag-Set-Black-Simple-Female-Shoulder.jpg" alt="...">
    <div class="card-body">
    <p class="card-text">Leather Bag</p>
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