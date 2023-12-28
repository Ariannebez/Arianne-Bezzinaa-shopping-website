<?php
        include 'includes/header.php';
        require_once "includes/functions.php";
        require_once "includes/dbh.php";
        require_once "includes/db-functions.php";
    ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wish list</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="includes/style.css">
 </head>
 <body>

<div class="container mt-5 mb-5 ">

<!--cards for items in wish  list-->
<div class="card-group">
  <div class="card me-3">
    <img src="https://ctl.s6img.com/society6/img/94PXownaYSK4T4Ca1qwn6CC-5Rg/w_700/bags/medium/close/~artwork,fw_3500,fh_3500,fy_-725,iw_3500,ih_4950/s6-original-art-uploads/society6/uploads/misc/8e42fbbc72ba490ebb7355432fcffaa9/~~/faces-in-dark-bags.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Totebag</h5>
      <p class="card-text">&euro; 10</p>
    </div>
    <div class="card-footer">
      <small class="text-body-secondary">
        <!--Btn add to cart or remove from wish list-->
        <a class="btn btn-primary" href="cart.php">
        Add To Cart
        </a>
        <a href="cart.php" class="btn btn-primary">Remove</a>
        <!--end of buttons-->
      </small>
    </div>
  </div>
  <div class="card me-2">
    <img src="https://www.exclusivecreations.com.mt/statementjewellery/wp-content/uploads/2020/06/IMG_1096.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Gold Plates Earrings</h5>
      <p class="card-text">&euro; 30</p>
    </div>
    <div class="card-footer">
      <small class="text-body-secondary">
        <!--Btn add to cart or remove from wish list-->
        <a class="btn btn-primary" href="cart.php">
        Add To Cart
        </a>
        <a href="cart.php" class="btn btn-primary">Remove</a>
        <!--end of buttons-->
      </small>
    </div>
  </div>
  <div class="card">
    <img src="https://www.candere.com/media/jewellery/images/GR00103__1.jpeg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Golden Ring</h5>
      <p class="card-text">&euro; 20</p>
    </div>
    <div class="card-footer">
      <small class="text-body-secondary">
        <!--Btn add to cart or remove from wish list-->
        <a class="btn btn-primary" href="cart.php">
        Add To Cart
        </a>
        <a href="cart.php" class="btn btn-primary">Remove</a>
        <!--end of buttons-->
      </small>
    </div>
  </div>
</div>

<!--cards end here-->

</div>

<!--new con of cards-->
<div class="container mt-5 mb-5 ">

<!--cards for items in wish  list-->
<div class="card-group">
  <div class="card me-3">
    <img src="https://ctl.s6img.com/society6/img/94PXownaYSK4T4Ca1qwn6CC-5Rg/w_700/bags/medium/close/~artwork,fw_3500,fh_3500,fy_-725,iw_3500,ih_4950/s6-original-art-uploads/society6/uploads/misc/8e42fbbc72ba490ebb7355432fcffaa9/~~/faces-in-dark-bags.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Totebag</h5>
      <p class="card-text">&euro; 10</p>
    </div>
    <div class="card-footer">
      <small class="text-body-secondary">
        <!--Btn add to cart or remove from wish list-->
        <a class="btn btn-primary" href="cart.php">
        Add To Cart
        </a>
        <a href="cart.php" class="btn btn-primary">Remove</a>
        <!--end of buttons-->
      </small>
    </div>
  </div>
  <div class="card me-2">
    <img src="https://www.exclusivecreations.com.mt/statementjewellery/wp-content/uploads/2020/06/IMG_1096.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Gold Plates Earrings</h5>
      <p class="card-text">&euro; 30</p>
    </div>
    <div class="card-footer">
      <small class="text-body-secondary">
        <!--Btn add to cart or remove from wish list-->
        <a class="btn btn-primary" href="cart.php">
        Add To Cart
        </a>
        <a href="cart.php" class="btn btn-primary">Remove</a>
        <!--end of buttons-->
      </small>
    </div>
  </div>
  <div class="card">
    <img src="https://www.candere.com/media/jewellery/images/GR00103__1.jpeg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Golden Ring</h5>
      <p class="card-text">&euro; 20</p>
    </div>
    <div class="card-footer">
      <small class="text-body-secondary">
        <!--Btn add to cart or remove from wish list-->
        <a class="btn btn-primary" href="cart.php">
        Add To Cart
        </a>
        <a href="cart.php" class="btn btn-primary">Remove</a>
        <!--end of buttons-->
      </small>
    </div>
  </div>
</div>

<!--cards end here-->

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
 </body>
 </html>   

    <?php
        include 'includes/footer.php';
    ?>