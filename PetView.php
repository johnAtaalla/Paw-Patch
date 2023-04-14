<style>
th,td {
    border-style: solid;
    border-width: 5px;
    overflow: hidden;
}

</style>
<?php
session_start();
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
        <li class="nav-item"style="padding-left:20px; padding-right:20px;">
          <a class="nav-link active navtext" href="Landing.php">Home</a>
        </li>
        <li class="nav-item"style="padding-left:20px; padding-right:20px;">
          <a class="nav-link navtext " href="About.php">About Us</a>
        </li>
        <li class="nav-item"style="padding-left:20px; padding-right:20px;">
          <a class="nav-link navtext " href="index.php">What We Offer</a>
        </li>
        <?php
     
        if(isset($_SESSION['email'])) { 
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
        } else {
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

      <div class="header">
        <div>
          <h2 class="our-desc">Client Information</h2> 
        </div>
      </div>
      <br>
    
     
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm sidebar" style="height = 450px;">
            <a class="nav-link side-bar" href="Landing.php">Dashboard</a>
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
          <div class="col-xl-10 col-lg-10 col-md-10" id="diet-desc" style="border:1px solid black; min-height:515px;">
            <h2 style="color:black">My Clients</h2>
            <br>
            
            <?php 

$host = 'localhost';
$user = 'root';
$pass = 'oakland';
$db   = 'pawpatch';
$conn = mysqli_connect($host, $user, $pass, $db);


if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$email = $_SESSION['email'];


$sql = "SELECT * FROM pet";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='card'>";
    echo "<div class='card-header pet-name'>Pet Information" . $row['PetName'] . "</div>";
    echo "<div class='card-body desc-font'>";
    echo "<table class='table'>";
    echo "<thead><th>Name</th><th>Breed</th><th>Age</th><th>Gender</th><th>Health Problems</th><th>Owner Contact</th></tr></thead>";
    echo "<tbody>";
    echo "</td><td>".$row['Name']."</td><td>".$row['Breed']."</td><td>".$row['Age']."</td><td>".$row['Gender']."</td><td>".$row['Health_Problems']."</td><td>".$row['email']."</td></tr>";
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</div>";
  }
} else {
 
  echo "No results found.";
}


mysqli_close($conn);
?>   



          </div>
        </div>
      </div>
      <br>
      <div class="container-fluid">
        <div class="row">
                <div class="col-sm sidebar" style="background-color:white; border:none;"></div>
          <div class="col-xl-10 col-lg-10 col-md-10">
      <button type="submit" class="pet-add btn btn-primary">Add New Client</button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>