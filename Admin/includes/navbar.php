<!--Navigation Bar -->
<div class="container-fluid">
    <!-- Row 1: Navigation Bar -->
    <div class="row">
      <nav class="navbar navbar-expand-md navbar-light bg-light col-12">
        <a class="navbar-brand" href="#">Admin page</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href=""> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user-management.php">User Management</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="category-management.php">Category Management</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="product-management.php">Product Management</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="order-management.php">Order Management</a>
            </li>
          </ul>
          <!-- ml-auto pushes the search box and button to the right -->
          <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          <button class="btn btn-outline-danger ml-2 my-2 my-sm-0" onclick="window.location.href='admin-login.php'">Log Out</button>

        </div>
      </nav>
    </div>