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
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>
<div class="container login-container mt-5 ">
    <div class="row mt-5 text-center"><h1>Log in</h1></div>
    <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>

  <a href="profile.php" class="btn btn-primary">Log In</a>
  
</form>
    </div>  
</div>
<!--Sing up area with input fields and buttons-->
<div class="container login-container mt-5 mb-5">
    <div class="row text-center"><h1>Sing Up</h1></div>
    <div class="row"><div class="input-group">
    <div class="form-floating mb-3">
    <input type="input" class="form-control" id="firstName" name="firstName" required>
    <label for="firstName">First Name</label>
    </div>
    <div class="form-floating mb-3">
    <input type="input" class="form-control" id="lastName" name="lastName" required>
    <label for="lastName">Last Name</label>
    </div>
</div></div>

<!--Adding email and password comfir-->
<form>
<!--email-->
<div class="form-floating mb-3">
  <input type="email" class="form-control" id="email" name="email" required>
  <label for="email">Email</label>
  </div>

  <!--password-->
  <div class="form-floating mb-3">
    <input type="password" class="form-control" id="password" name="password" required>
    <label for="password">Password</label>
    </div>
    <div class="form-floating mb-3">
    <input type="password" class="form-control" id="confPassword" name="confPassword" required>
    <label for="confPassword">Confirm Password</label>
    </div>
  
  <!--<button type="submit" class="btn btn-primary">Sing up</button>-->

  <div class="row">
            <div class="col-12 mb-3">
                <button type="submit" class="btn btn-success w-100 p-2 fs-5">Sign Up</button>
            </div>
            <div class="col-12">
                <button type="reset" class="btn btn-danger w-100 p-2 fs-5">Reset Form</button>
            </div>
      </div>
</form>
<!--end-->
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