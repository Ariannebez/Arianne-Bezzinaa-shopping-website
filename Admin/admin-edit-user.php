<?php
require_once 'includes/dbfunctions.php';
require_once 'includes/functions.php';

// Initialize variables
$userData = null;
$updateSuccess = false;

// Check if the edit and type parameters are set
if (isset($_GET['edit']) && isset($_GET['type'])) {
    $userId = $_GET['edit'];
    $userType = $_GET['type'];

    // Fetch user data based on type
    if ($userType === 'user') {
        $userData = getUserById($con, $userId);
    } else if ($userType === 'userAdmin') {
        $userData = getUserAdminById($con, $userId);
    }
}

// Handle form submission
if (isset($_POST['updateUser'])) {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    // Add other fields as needed

    // Update the user or userAdmin based on $userType
    if ($userType === 'user') {
        // Call a function to update user data
        updateUser($con, $userId, $firstName, $lastName); // Modify as needed
    } else if ($userType === 'userAdmin') {
        // Call a function to update userAdmin data
        updateUserAdmin($con, $userId, $firstName, $lastName); // Modify as needed
    }

    // Set update success flag
    $updateSuccess = true;
}

// Redirect back to user-management.php after update
if ($updateSuccess) {
    header("Location: user-management.php");
    exit();
}

require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<!-- HTML for the form -->
<div class="container mt-5">
    <h2>Edit User</h2>
    <?php if ($userData): ?>
        <form method="POST">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo htmlspecialchars($userData['firstName']); ?>" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo htmlspecialchars($userData['lastName']); ?>" required>
            </div>
            <!-- Add other fields as needed -->

            <button type="submit" name="updateUser" class="btn btn-primary">Update User</button>
        </form>
    <?php else: ?>
        <p>User not found.</p>
    <?php endif; ?>
</div>

<?php
require_once 'includes/footer.php';
?>
