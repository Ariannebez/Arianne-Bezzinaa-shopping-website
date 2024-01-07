
<?php
      require_once 'includes/functions.php';
      require_once 'includes/dbfunctions.php';
      $allUsers = getAllUsersAndAdmins($con);
    

      if (isset($_GET['delete'])) {
        $userId = $_GET['delete'];
        deleteUser($con, $userId);
        // Redirect to avoid re-deleting on refresh
        header("Location: user-management.php");
        exit();
        }
    

        

require_once 'includes/header.php'; 
require_once 'includes/navbar.php'; ?>

<!-- User Data and UserType-->
<div class="container mt-5">

<h2>User Management</h2>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>User Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($allUsers as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['id']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td><?php echo htmlspecialchars($user['firstName']); ?></td>
            <td><?php echo htmlspecialchars($user['lastName']); ?></td>
            <td><?php echo htmlspecialchars($user['userType']); ?></td>
            <td>
            <a href='admin-edit-user.php?edit=<?php echo $user['id']; ?>&type=<?php echo $user['userType']; ?>' class='btn btn-primary'>Edit</a>
            <a href="user-management.php?delete=<?php echo $user['id']; ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</div>

<?php require_once 'includes/footer.php'; ?>

