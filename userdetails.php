<?php 
require_once 'includes/functions.php';
require_once 'includes/dbfunctions.php';

if(!isset($_SESSION['USER'])) {
  header("Location: index.php");
}
$incorrectPassword = null;
$user = GetUserByID($con, $_SESSION['USER']['id']);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST["updateUser"])) {
        $user["firstName"] = $_POST["firstName"];
        $user["lastName"] = $_POST["lastName"];
        $user["mobile"] = $_POST["mobile"];
        updateUser($con, $user);
        $user = GetUserByID($con, $_SESSION["USER"]["id"]);
    } else if(isset($_POST["updateAddress"])) {
        $address = [];
        $address["id"] = $_POST["addressid"];
        $address["street"] = $_POST["street"];
        $address["city"] = $_POST["city"];
        $address["zipCode"] = $_POST["zipCode"];
        $address["region"] = $_POST["region"];
        $address["mobile"] = $_POST["mobile"];
        updateAddress($con, $address);
    } else if(isset($_POST["updatePassword"])) {
        $password = sha1(htmlspecialchars(addslashes($_POST['currentPassword'])));
        if(strtoupper($password) == strtoupper($user['password'])) {
            $newPassword = sha1(htmlspecialchars(addslashes($_POST['newPassword'])));
            $confirmPassword = sha1(htmlspecialchars(addslashes($_POST['confPassword'])));
            // Check if new passwords match.
            if($newPassword == $confirmPassword) {
                $user['password'] = $newPassword;
                $incorrectPassword = "";
                $passwordUpdated = true;
            }
            else {
                $incorrectPassword = "Passwords do not match!";
            }
        }
        else {
            $incorrectPassword = "Current password is incorrect";
        }
        // Update user, if there's no error.
        if(empty($incorrectPassword)) {
            updateUserPassword($con, $user);
        }
        // Fetch the updated user details.
        $user = GetUserByID($con, $user["id"]);
    } else if(isset($_POST["updateEmail"])) {
        $user["email"] = $_POST["email"];
        updateUserEmail($con, $user);
    }
}

//Getting the user's details.

$address = GetAddressesByUser($con, $_SESSION['USER']['id']);

require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>


<div class="container">

    <div class="row mt-5 mb-5 pb-5">
        <div class="row">
            <h1>My Account</h1>
        </div>

        <div class="card">
            <h5 class="card-header">My Profile</h5>
            <div class="card-body">
                    <!-- Sing Up Form posting info into database using 'POST'-->
                    <div class="row">
                        <div class="col-lg-7 col-md-12">
                            <!-- Sing Up -->
                            <div class="border p-3 mb-3">
                                <h3>Details</h3>
                                <div class="row">
                                    <form method="POST">
                                    <div class="form-floating mb-3 col">
                                        <input type="input" class="form-control" id="firstName" name="firstName" value="<?php echo $user['firstName']; ?>"
                                            required> 
                                        <label for="firstName" require>First Name</label>
                                    </div>
                                    <div class="form-floating mb-3 col">  
                                        <input type="input" class="form-control" value="<?php echo $user['lastName']; ?>" id="lastName" name="lastName" required>
                                        <label for="lastName" required>Last Name</label>
                                    </div>
                                    <div class="form-floating col">  
                                        <input type="input" class="form-control" value="<?php echo $user['mobile']; ?>" id="mobile" name="mobile" required>
                                        <label for="mobile" required>Mobile</label>
                                    </div>
                                    <button type="submit" name="updateUser" class="btn btn-success w-100 p-2 fs-5 my-2">Update
                                        User</button>
                                </form>
                                </div>
                                <form method="post">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" required value="<?php echo $user['email']; ?>">
                                        <label for="email">Email</label>
                                    </div>
                                    <button type="submit" name="updateEmail" class="btn btn-success w-100 p-2 fs-5 my-2">Update
                                        Email</button>
                                </form>
                                <form method="post">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="password" name="currentPassword"
                                            required>
                                        <label for="currentPassword">Current Password</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="password" name="newPassword"
                                            required>
                                        <label for="newPassword">New Password</label>
                                    </div>

                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="confPassword"
                                            name="confPassword" required>
                                        <label for="confPassword">Confirm Password</label>
                                    </div> 
                                    <button type="submit" name="updatePassword" class="btn btn-success w-100 p-2 fs-5 my-2">Update
                                        Password</button>
                                    <?php if (isset($incorrectPassword) && !empty($incorrectPassword)) ; ?>
                                    <h5><?php echo $incorrectPassword; ?></h5>
                                </form>
                            </div>
                        </div>
                        
                        <div class="col-lg-5 col-md-12">
                            <!-- Residence -->
                            <div class="border p-3 mb-3">
                                <h3>Residence</h3>
                                <form method="post">
                                <div class="form-floating mb-3">
                                    <input type="input" class="form-control" id="street" name="street" value="<?php echo $address['street']; ?>" required>
                                    <label for="street">Street</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="input" class="form-control" id="city" value="<?php echo $address['city']; ?>" name="city" required>
                                    <label for="city">City</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="input" class="form-control" id="zipCode" value="<?php echo $address['zipCode']; ?>" name="zipCode" required>
                                    <label for="zipCode">ZipCode</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="input" class="form-control" id="region" value="<?php echo $address['region']; ?>" name="region" required>
                                    <label for="region">Region</label>
                                </div>
                                <div class="form-floating">
                                    <input type="input" class="form-control" id="mobile" value="<?php echo $address['mobile']; ?>" name="mobile" required>
                                    <label for="mobile">Mobile</label>
                                </div>
                                <input type="hidden" name="addressid" value="<?php echo $address['id']; ?>">
                                <button type="submit" name="updateAddress" class="btn btn-success w-100 p-2 fs-5 my-2">Update
                                        Address</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!--row closes -->
</div>

<?php
        include 'includes/footer.php';
    ?>