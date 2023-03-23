
<?php


// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin'])) {
  // Redirect to login page if user is not logged in
  header('Location: login.html');
  exit;
}

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "oakland";
$dbname = "pawpatch";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get user's name from the database
$email = mysqli_real_escape_string($conn, $_SESSION['email']);
$sql = "SELECT firstname, lastname, email, phone, address FROM user WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $fname = $row['firstname'];
  $lname = $row['lastname'];
  $email = $row['email']; 
  $phone = $row['phone'];
  $address = $row['address'];
} else {
  $fname = "Unknown";
  $lastname ="Uknown";
  $email = "Uknown";
  $phone = "Uknown";
  $address = "Uknown";
}

mysqli_close($conn);
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paw Patch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body class>
    <h1><img src="images/Logo.png" alt="Logo" width="60" height="60" class="d-inline-block align-text-top">Paw Patch</h1>
    <nav class="navbar navbar-expand-lg sticky-top">
  <div class="container-fluid">
 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active navtext" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navtext " href="About.php">About Us</a>
        </li>
        <?php
     
        if(isset($_SESSION['email'])) { // If user is logged in, show all links
          echo '<li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle navtext" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dashboard
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item navtext" href="Account.php">Account</a></li>
                    <li><a class="dropdown-item navtext" href="Pets.php">Pets</a></li>
                    <li><a class="dropdown-item navtext" href="Meds.php">Medications</a></li>
                    <li><a class="dropdown-item navtext" href="Vaccinations.php">Vacinations</a></li>
                    <li><a class="dropdown-item navtext" href="Diet.php">Diet</a></li>
                    <li><a class="dropdown-item navtext" href="Schedule.php">Schedule</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                  </ul>
                </li>';
        } else { // If user is not logged in, show only Create Account link
          echo '<li class="nav-item ">
                  <a class="nav-link navtext" href="AccountCreate.php">Create Account</a>
                </li>
                <li class="nav-item navtext ">
                  <a class="nav-link " href="login.php">Login</a>
                </li>';
        }
        ?>
      </ul>
    </div>
  </div>
</nav>

      <div class="welcome-to">
        <div>
        <h2 class="our-desc">Welcome <?php echo $fname; ?></h2> 
        </div>
      </div>
      <br>
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm sidebar">
            <a class="nav-link side-bar activated" href="Account.php">Account</a>
            <hr>
            <a class="nav-link side-bar" href="Pets.php">Pets</a>
            <hr>
                <a class="nav-link side-bar" href="Vaccinations.php">Vaccines</a>
            <hr>
                <a class="nav-link side-bar" href="Meds.php">Medications</a>
            <hr>
                <a class="nav-link side-bar" href="Diet.php">Diet</a>
            <hr>
                <a class="nav-link side-bar" href="Diet.php">Schedules</a>
            </div>
          <div class="col-xl-10 col-lg-10 col-md-10" id="profile-desc">
            <h2 style="color:black">Personal Info</h2>
            
            <?php
if(isset($_POST['edit'])){ // if the edit button was clicked, show the form
  ?>
  <!-- display the form -->
  <form method="post" action="updateAccount.php">
    <!-- input fields -->
    <span class = " d-block label label-default">First Name</span>
    <input  type="text" name="firstname" value="<?php echo $fname; ?>">
    <span class = " d-block label label-default">Last Name</span>
    <input type="text" name="lastname" value="<?php echo $lname; ?>">
    <span class = " d-block label label-default">Email</span>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span class = " d-block label label-default">Phone</span>
    <input type="text" name="phone" value="<?php echo $phone; ?>">
    <span class = "d-block label label-default">Address</span>
    <input type="text" name="address" value="<?php echo $address; ?>">
    <div class=".d-print-block">
    <input type="submit" name="update" value="Update">
</div>
  </form>
  <?php
} else { // if the edit button was not clicked, show only the user's info
  ?>
  <!-- display the user's info -->
  
  <p><strong>First Name:</strong> <?php echo $fname; ?></p>
  <p><strong>Last Name:</strong> <?php echo $lname; ?></p>
  <p><strong>Email:</strong> <?php echo $email; ?></p>
  <p><strong>Phone:</strong> <?php echo $phone; ?></p>
  <p><strong>Address:</strong> <?php echo $address; ?></p>
  <form method="post" action="">
    <input type="submit" name="edit" value="Edit">
  </form>
  <?php
}
?>
          </div>
        </div>
      </div>
      <br>
      <br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>