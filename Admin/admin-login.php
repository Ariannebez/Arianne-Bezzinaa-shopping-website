<?php 
require_once 'includes/functions.php';
require_once 'includes/dbfunctions.php';

$userExists = false;
$userCreated = false;
$error = null;

// Checking the request method to handle form submissions
if($_SERVER['REQUEST_METHOD'] == "POST") {
    // Login form submitted
    if(isset($_POST["email"])) {
        // Sanitize and store input values
        $email = htmlspecialchars(addslashes($_POST['email'])); 
        $password = htmlspecialchars(addslashes($_POST['password']));

        // Attemptting to login the user
        if(userLogin($con, $email, $password)) {
            // Redirect to profile page upon successful login
            header("Location: user-management.php"); 
        }
        else
        {
            // Setting error message for incorrect credentials
            $error = "Incorrect email or password, try again!";
        }
        
    } }

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


<?php
        include 'includes/footer.php';
?>