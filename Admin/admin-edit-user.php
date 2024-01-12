<?php 
require_once 'includes/functions.php';
require_once 'includes/dbfunctions.php';

//if user editUserId does not exists go back to user-managment page
if (isset($_GET['editUserId'])) {
    $editUserId = $_GET['editUserId'];

    // Check if user exists
    if (!userExists($con, $editUserId)) {
        // User does not exist, redirect to user management page
        header("Location: user-management.php");
        exit();
    }

} else {
    // 'editUserId' not set, redirect to user management page
    header("Location: user-management.php");
    exit();
}

//Getting user and updating it
$incorrectPassword = null;
$user = GetUserByID($con, $_GET['editUserId']);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST["updateUser"])) {
        $user["firstName"] = $_POST["firstName"];
        $user["lastName"] = $_POST["lastName"];
        $user["mobile"] = $_POST["mobile"];
        updateUser($con, $user);
        $user = GetUserByID($con, $_GET['editUserId']);
    } else if(isset($_POST["updateAddress"])) {
        $address = [];
        $address["id"] = $_POST["addressid"];
        $address["street"] = $_POST["street"];
        $address["city"] = $_POST["city"];
        $address["zipCode"] = $_POST["zipCode"];
        $address["region"] = $_POST["region"];
        
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

$address = GetAddressesByUser($con, $_GET['editUserId']);
$role = GetRole($con);

require_once 'includes/header.php';
require_once 'includes/navbar.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['updateRole'])) {
    $newRoleId = $_POST['role'];
    $userId = $user['id']; // ID of the user being edited

    updateUserRole($con, $userId, $newRoleId);

    // Optionally, refresh the user's data
    $user = GetUserByID($con, $userId);
}
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
                                    <label for="firstName" require>First Name</label>
                                        <input type="input" class="form-control" id="firstName" name="firstName" value="<?php echo $user['firstName']; ?>" required> 
                                    </div>
                                    <div class="form-floating mb-3 col">  
                                        <label for="lastName" required>Last Name</label>
                                        <input type="input" class="form-control" value="<?php echo $user['lastName']; ?>" id="lastName" name="lastName" required>  
                                    </div>

                                    <div class="form-floating mb-3 col">  
                                    <label for="mobile" required>Mobile</label>
                                        <input type="input" class="form-control" value="<?php echo $user['mobile']; ?>" id="mobile" name="mobile" required> 
                                    </div>
                                    <button type="submit" name="updateUser" class="btn btn-success w-100 p-2 fs-5 my-2">Update User</button>
                                </form>
                                </div>

                                <form method="post">
                                    <div class="form-floating">
                                    <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required value="<?php echo $user['email']; ?>">  
                                    </div>

                                    <button type="submit" name="updateEmail" class="btn btn-success w-100 p-2 fs-5 my-2">Update Email</button>
                                </form>

                                <form method="post">
                                    <div class="form-floating mb-3">
                                    <label for="currentPassword">Current Password</label>
                                        <input type="password" class="form-control" id="password" name="currentPassword" required>
                                    </div>

                                    <div class="form-floating mb-3">
                                    <label for="newPassword">New Password</label>
                                        <input type="password" class="form-control" id="password" name="newPassword" required>   
                                    </div>

                                    <div class="form-floating">
                                    <label for="confPassword">Confirm Password</label>
                                        <input type="password" class="form-control" id="confPassword"
                                            name="confPassword" required>   
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
                                <label for="street">Street</label>
                                    <input type="input" class="form-control" id="street" name="street" value="<?php echo $address['street']; ?>" required>   
                                </div>

                                <div class="form-floating mb-3">
                                <label for="city">City</label>
                                    <input type="input" class="form-control" id="city" value="<?php echo $address['city']; ?>" name="city" required>   
                                </div>

                                <div class="form-floating mb-3">
                                <label for="zipCode">ZipCode</label>
                                    <input type="input" class="form-control" id="zipCode" value="<?php echo $address['zipCode']; ?>" name="zipCode" required> 
                                </div>

                                <div class="form-floating mb-3">
                                <label for="region">Region</label>
                                    <input type="input" class="form-control" id="region" value="<?php echo $address['region']; ?>" name="region" required> 
                                </div>

                                <input type="hidden" name="addressid" value="<?php echo $address['id']; ?>">
                                <button type="submit" name="updateAddress" class="btn btn-success w-100 p-2 fs-5 my-2">Update Address</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="col-lg-7 col-md-12">
    <div class="border p-3 mb-3">
        <h3>User Role</h3>
        <!--role-->
        <form method="POST">
                <label for="role">Select Role</label>
                <select class="form-select" id="role" name="role">
                <option disabled>Select a Role</option>
                <?php 
                foreach($role as $row):
                    $selected = ($user['role'] == $row["id"]) ? 'selected' : '';
                ?>
                    <option value="<?php echo $row["StatusId"]; ?>" <?php echo $selected; ?>>
                        <?php echo $row["name"]; ?> 
                    </option>
                <?php
                endforeach;
                ?>
            </select>
            <input type="hidden" name="userId" value="<?php echo $user['id']; ?>">
            <button type="submit" name="updateRole" class="btn btn-success w-100 p-2 fs-5 my-2">Update Role</button>
        </form>
    </div>
</div>
        </div>
    </div>
    <!--row closes -->
</div>

<?php
        include 'includes/footer.php';
    ?>
