
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
        <li class="nav-item" style="padding-left:20px; padding-right:20px;">
          <a class="nav-link active navtext" href="Landing.php">Home</a>
        </li>
        <li class="nav-item" style="padding-left:20px; padding-right:20px;">
          <a class="nav-link navtext " href="About.php">About Us</a>
        </li>
        <li class="nav-item" style="padding-left:20px; padding-right:20px;">
          <a class="nav-link navtext " href="index.php">What We Offer</a>
        </li>
        <?php
     
        if(isset($_SESSION['email'])) { // If user is logged in, show all links
          echo '<li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle navtext" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"style="padding-left:20px; padding-right:20px;">
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
                    <li><a class="dropdown-item navtext" href="Vet.php">Vet Contact</a></li>
                    <li><a class="dropdown-item navtext" href="Aid.php">Pet Aid Contact</a></li>
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
            <div class="col-sm sidebar h-100" style="height:515px;">
            <a class="nav-link side-bar activated" href="Landing.php">Dashboard</a>
            <hr>
            <a class="nav-link side-bar" href="Account.php">Account</a>
            <hr>
            <a class="nav-link side-bar" href="Pets.php">Pets</a>
            <hr>
                <a class="nav-link side-bar" href="Vaccinations.php">Vaccines</a>
            <hr>
                <a class="nav-link side-bar" href="Meds.php">Medications</a>
            <hr>
                <a class="nav-link side-bar" href="Diet.php">Diet</a>
            <hr>
                <a class="nav-link side-bar" href="Schedule.php">Schedules</a>
            </div>
          <div class="col-xl-10 col-lg-10 col-md-10" id="profile-desc">
            <h2 style="color:black">Your Dashboard</h2>
            <br>
            <div class="row">
                <div class="col" style="Background-color:white; width: 300px; margin-right:10px; margin-left:20px; padding:10px;">
            <h4>To-Do List:</h4>
            <p>- Buy dog food</p>
            <p>- Schedule appointment</p>
            <p>- Groom Jerry</p>
            <p>- Train Tom</p>
            <button type="submit" class=" btn btn-secondary">Add Task</button>
                </div>
                <div class="col-md-2" style="Background-color:white; width: 300px; margin-right:10px; margin-left:10px; padding:10px;">
            <h4>Your Pets:</h4>
            <p>- Tom<br>Age: 3<br>Tom has a broken leg</p>
            <p>- Jerry<br>Age: 3<br>Jerry has anxiety</p>
                </div>
                <div class="col-md-2" style="margin-right:10px;">
                <img class="img-fluid img-thumbnail float-right" src="petPhotos/jerry.jpg" style="height:150px; width:175px;">
                </div>
                
    </div>
            <br>
            <div class="row" style="Background-color:white; margin-left:10px; margin-right:10px; padding:10px;">
            <h4>Upcoming Events/Appointments:</h4>
            <div class="col" style="border:1px solid black; width: 50px; padding:10px; margin:10px;">
            <h4>April 10</h4>    
            <h5>Vet Visit - 10:00am</h5>
            <p>123 Fake rd <br>Dr. veterinarian</p>  
            <p>For: Lulu</p>
            </div>
            <div class="col" style="border:1px solid black; width: 50px; padding:10px; margin:10px;">
            <h4>April 24</h4>    
            <h5>Vet Follow-up - 1:00pm</h5>
            <p>123 Fake rd <br>Dr. veterinarian</p> 
            <p>For: Lulu</p> 
            </div>
            <div class="col" style="border:1px solid black; width: 50px; padding:10px; margin:10px;">
            <h4>June 19</h4>    
            <h5>Groomer - 9:00am</h5>
            <p>4895 Dog st. <br>Mr. Groomer</p>  
            <p>For: Bella</p>
            </div>
            <div class="col" style="border:1px solid black; width: 50px;padding:10px; margin:10px;">
            <h4>Add Event/ Appointment</h4>    
            <h1>+</h1> 
            </div>
            </div>
            <br>
            <div class="row" style="Background-color:white; margin-left:10px; margin-right:10px; padding:10px;">
            <h3>Suggested Videos:</h3>
            <div class="col">
            <iframe height="300px" width="325px" src="https://www.youtube.com/embed/g6eB8IeX_cs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <div class="col">
            <iframe height="300px" width="325px" src="https://www.youtube.com/embed/romnmHdGH08" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <div class="col">
            <iframe height="300px" width="325px" src="https://www.youtube.com/embed/qNtwkSVr2Pw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      <br>
      <br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>