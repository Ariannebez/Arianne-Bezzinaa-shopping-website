<?php
        include 'includes/header.php';
    ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="includes/style.css">
 </head>
 <body>
<div class="container">

<div class="row mt-3"></div>
<div class="card mb-3 w-100" style="">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://bycharlotte.com.au/cdn/shop/files/14k-2_385x.jpg?v=1680239002" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Necklace</h5>
        <p class="card-text">Gold plated necklace</p>
        <p class="card-text"><small class="text-body-secondary"><h1>&euro; 30</h1></small></p>
        
        <!--buttons-->
        <form action="/action_page.php">
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" max="15">
        </form>

        <a class="btn btn-primary" href="">
        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
        </a>
        <a href="cart.php" class="btn btn-primary">Remove</a>
        <!--end of buttons-->
    </div>
    </div>
  </div>
</div>


<!--2 nd card-->
<div class="row mt-3"></div>
<div class="card mb-3 w-100" style="">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://bycharlotte.com.au/cdn/shop/files/14k-2_385x.jpg?v=1680239002" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Necklace</h5>
        <p class="card-text">Gold plated necklace</p>
        <p class="card-text"><small class="text-body-secondary"><h1>&euro; 30</h1></small></p>
        
        <!--buttons-->
        <form action="/action_page.php">
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" max="15">
        </form>

        <a class="btn btn-primary" href="">
        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
        </a>
        <a href="cart.php" class="btn btn-primary">Remove</a>
        <!--end of buttons-->
    </div>
    </div>
  </div>
</div>

<!--2 nd card end-->

<div class="row">
<div class="card w-100">
  <div class="card-header">
   Payment
  </div>
  <div class="card-body">
    <h5 class="card-title">Procced to payment</h5>
    <p class="card-text">Your total is &euro; 60</p>
    <a href="#" class="btn btn-primary">Pay</a> or <a href="#" class="btn btn-primary">Cancel Order</a>
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
    