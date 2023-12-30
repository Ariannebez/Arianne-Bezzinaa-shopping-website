<?php
        include 'includes/header.php';
        require_once "includes/functions.php";
        require_once "includes/dbh.php";
        require_once "includes/db-functions.php";
        
        $towns = loadTowns($conn);
        $status = loadStatus($conn);
        
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
<div class="login-container container">
    <div class="row mt-5 text-center"><h1>Log in</h1></div>
    
    <form action="includes/login-inc.php" method="post">
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="mb-3">
                    <label for="input-username" class="form-label">Username:</label>
                    <input type="text" name="username" id="input-username" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="input-password" class="form-label">Password:</label>
                    <input type="password" name="password" id="input-password" class="form-control">
                </div>

                <div class="d-grid">
                    <button type="submit" name="submit" class="btn btn-primary">Log In</button>    
                </div>
            </div>
        </div>
    </div>
</form>
 </div>  
</div>

<!--Sing up area with input fields and buttons-->
<div class="container mt-5">
    <form action="includes/registration-inc.php" method="POST">
        <!-- Sing Up Form posting info into database using 'POST'-->
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <!-- Sing Up -->
                <div class="border p-3 mb-3">
                    <h3>Sing Up</h3>
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="username" name="username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="confPassword" name="confPassword" required>
                        <label for="confPassword">Confirm Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="firstName" name="firstName" required>
                        <label for="firstName">First Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="lastName" name="lastName" required>
                        <label for="lastName">Last Name</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <!-- Residence -->
                <div class="border p-3 mb-3">
                    <h3>Residence</h3>
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="address" name="address" required>
                        <label for="address">Address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="street" name="street" required>
                        <label for="street">Street</label>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="town" name="town" required>
                            <option disabled selected>Select a Town</option>
                            
                            <?php foreach($towns as $row): ?>
                            <option value="<?php echo $row["id"];?>">
                            <?php echo $row["name"]; 
                            
                            ?>

                            </option>
                            <?php endforeach;?>
                            
                        </select>
                    </div>
                </div>

        <!-- Status Selection -->
        <div class="border p-3 mb-3">
                    <h3>Status</h3>
                    <div class="mb-3">
                        <select class="form-select" id="status" name="status" required>
                            <option disabled selected>Select a Status</option>
                            
                            <?php foreach($status as $row): ?>
                            <option value="<?php echo $row["id"];?>">
                            <?php echo $row["name"]; 
                            
                            ?>

                            </option>
                            <?php endforeach;?>
                            
                        </select>
                    </div>
                </div>
            </div>
        </div>

                

        <!-- Form Buttons -->
        <div class="row">
            <div class="col-12 mb-3">
                <button type="submit" class="btn btn-success w-100 p-2 fs-5">Submit Form</button>
            </div>
            <div class="col-12">
                <button type="reset" class="btn btn-danger w-100 p-2 fs-5">Reset Form</button>
            </div>
        </div>
    </form>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-3"></div>

            <!--if an error show this div-->
            <?php if(isset($_GET["error"])): ?>
        
            <div class="col-6 text-center border border-danger-subtle bg-danger-subtle text-danger p-2">
            <?php 
            $error = $_GET["error"];
            if($error == "stmtfailed"){
                echo "something went worgn pls connect admin";
            }

            // "PassworsDoNotMatch" 
            //Has to be written the same as written in registration-inc.php page
            elseif($error == "PassworsDoNotMatch"){
                echo "passwords do not match";
            }
            
            //not vaild username
            elseif($error == "invalidUsername"){
                echo "User name invalid";
            }
            ?>
            </div>

            <?php endif; ?>

            <!--if success show this div-->
            <?php
            if(isset($_GET["success"])){
                if($_GET["success"]== true){
                    ?>
                    <div class="col-6 text-center border border-success-subtle bg-success-subtle text-success p-2">
                     Application Registration completed successfully.
                    </div>
                    <?php
                    }
                }
            ?>

<div class="col-3"></div>
    </div>
</div>

    





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
<?php
include "includes/footer.php";
?>