<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Layout Example</title>
  <!-- Link to Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    /* Optional: Add custom styles for the border */
    .grid-item {
      border: 1px solid #ddd;
      padding: 10px;
      margin: 5px 0;
    }

    /* Style the card */
    .card {
      width: 100%;
      border: 1px solid #ddd;
      padding: 10px;
      margin-top: 20px;
    }
  </style>
</head>
<body>

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
              <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
          </ul>
          <!-- ml-auto pushes the search box and button to the right -->
          <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          <button class="btn btn-outline-danger ml-2 my-2 my-sm-0">Sign Out</button>
        </div>
      </nav>
    </div>
    
    

    <div class="container mt-5">
     
    <div class="col"><h2>User Management</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Id</th>
          <th>Email</th>
          <th>Name</th>
          <th>Surname</th>
          <th>Verified</th>
          <th>Password</th>
          <th>Contact Number</th>
          <th>Actions</th>
          
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>ari@hotmail.com</td>
          <td>Ari</td>
          <td>Doe</td>
          <td>customer</td>
          <td>Yes</td>
          <td>.....</td>
          <td><button type="button" class="btn btn-primary">Edit</button><button type="button" class="btn btn-danger">Delete</button></td>
          
        </tr>
        <tr>
        <td>2</td>
          <td>ari@hotmail.com</td>
          <td>Ari</td>
          <td>Doe</td>
          <td>customer</td>
          <td>Yes</td>
          <td>.....</td>
          <td><button type="button" class="btn btn-primary">Edit</button><button type="button" class="btn btn-danger">Delete</button></td>
          
        </tr>
        
      </tbody>
    </table></div>
  </div>
</div>
   


      

    <!-- Row 3: Footer (Optional) -->
    <div class="row">
      <div class="col-md-12">
        <footer class="bg-light text-center p-3 mt-3">
          <p>© 2023 Your Website</p>
        </footer>
      </div>
    </div>
  </div>

  <!-- Link to Bootstrap JS and Popper.js -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>

