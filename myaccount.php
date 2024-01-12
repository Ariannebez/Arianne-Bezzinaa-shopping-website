<?php 
require_once 'includes/functions.php';
require_once 'includes/dbfunctions.php';

$userExists = false;
$userCreated = false;
$error = null;

// Checking the request method to handle form submissions
if($_SERVER['REQUEST_METHOD'] == "POST") {
    // Login form submitted?
    if(isset($_POST["email"])) {
        // Clear up and save the input values.
        $email = htmlspecialchars(addslashes($_POST['email'])); 
        $password = htmlspecialchars(addslashes($_POST['password']));

        // Trying to log the user in
        if(userLogin($con, $email, $password)) {
            // Go to profile page upon successful login
            header("Location: profile.php"); 
        }
        else
        {
            // Setting error message for incorrect email or password.
            $error = "Incorrect email or password, try again!";
        }
        // Account creation form submission
    } else if (isset($_POST["signupEmail"])) {
        // Keeping input values clean and stored.
        $user = [];
        $user['Name'] = htmlspecialchars(addslashes($_POST['firstName']));
        $user['Surname'] = htmlspecialchars(addslashes($_POST['lastName']));
        $user['Email'] = htmlspecialchars(addslashes($_POST['signupEmail']));
        $user['Password'] = htmlspecialchars(addslashes($_POST['signupPassword']));
        $user['Password'] = sha1($_POST['signupPassword']);
        $user['ContactNumber'] = htmlspecialchars(addslashes($_POST['mobile']));

        
        // Checking if user already exists
        if(!CheckUserExists($con, $user['Email'])) {
            // If not create a new user
            $user['ID'] = createUser($con, $user);
            if($user['ID'] > 0) {
                // Set UserCreated to true
                $address['Street'] = htmlspecialchars(addslashes($_POST['street']));
                $address['City'] = htmlspecialchars(addslashes($_POST['city']));
                $address['ZipCode'] = htmlspecialchars(addslashes($_POST['zipCode']));
                $address['Region'] = htmlspecialchars(addslashes($_POST['region']));
                $address['Mobile'] = htmlspecialchars(addslashes($_POST['mobile']));
                $address['Default'] = 'true';

                
                createAddress($con, $user['ID'], $address);
                $userCreated = true;
            }
        }
        else{
            // If user already exists, setting userExists to true
            $userExists = true;
        }
    }
}

require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<?php
if(!empty($error)): ?>
<div class="container text-center mt-4 text-danger">
    <p><?php echo $error; ?></p>
</div>

<?php elseif($userCreated) : ?>
<div class="container text-center mt-4 text-danger">
    <p>User has been created, you can now login!</p>
</div>

<?php elseif($userExists) : ?>
<!-- Displaying message if user already exists -->
<div class="container text-center mt-4 text-danger">
    <p>User Already Exists!</p>
</div>
<?php endif; ?>

<div class="container">
    <div class="row mt-5 text-center">
        <h1>Log in</h1>
    </div>

    <form method="post">
        <div class="container">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email<span class="text-danger">*</span>:</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password<span class="text-danger">*</span>:</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="d-grid mb-5">
                        <button type="submit" name="submit" class="btn btn-primary">Log In</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<!--Sing up area with input fields and buttons-->
<div class="container">
    <form method="POST">
        <!-- Sing Up Form posting info into database using 'POST'-->
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <!-- Sing Up -->
                <div class="border p-3 mb-3">
                    <h3>Sign Up</h3>
                    <div class="row">
                        <div class="form-floating mb-3 col">
                            <input type="input" class="form-control" id="firstName" name="firstName" required>
                            <label for="firstName" require>First Name</label>
                        </div>
                        <div class="form-floating mb-3 col">
                            <input type="input" class="form-control" id="lastName" name="lastName" required>
                            <label for="lastName" required>Last Name</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="signupEmail" required>
                        <label for="signupEmail">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="mobile" name="mobile" required>
                        <label for="mobile">Mobile</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="signupPassword" required>
                        <label for="signupPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="confPassword" name="confPassword" required>
                        <label for="confPassword">Confirm Password</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <!-- Residence Of User -->
                <div class="border p-3 mb-3">
                    <h3>Residence</h3>
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="street" name="street" required>
                        <label for="street">Street</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="city" name="city" required>
                        <label for="city">City</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="zipCode" name="zipCode" required>
                        <label for="zipCode">ZipCode</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="region" name="region" required>
                        <label for="region">Region</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form Buttons -->
        <div class="row mb-5">
            <div class="col-12 mb-3">
                <button type="submit" class="btn  btn-primary w-100 p-2 fs-5">Submit Form</button>
            </div>
            <div class="col-12 mb-4">
                <button type="reset" class="btn btn-primary w-100 p-2 fs-5">Reset Form</button>
            </div>
        </div>
    </form>
</div>

<?php
        include 'includes/footer.php';
    ?>