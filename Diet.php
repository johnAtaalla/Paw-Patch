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
    <a class="navbar-brand" href="index.php">Paw Patch</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="About.php">About Us</a>
        </li>
        <?php
       
        if(isset($_SESSION['email'])) { // If user is logged in, show all links
          echo '<li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dashboard
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="Account.php">Account</a></li>
                    <li><a class="dropdown-item" href="Pets.php">Pets</a></li>
                    <li><a class="dropdown-item" href="Meds.php">Medications</a></li>
                    <li><a class="dropdown-item" href="Vaccinations.php">Vacinations</a></li>
                    <li><a class="dropdown-item" href="Diet.php">Diet</a></li>
                    <li><a class="dropdown-item" href="Schedule.php">Schedule</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                  </ul>
                </li>';
        } else { // If user is not logged in, show only Create Account link
          echo '<li class="nav-item ">
                  <a class="nav-link " href="AccountCreate.php">Create Account</a>
                </li>
                <li class="nav-item ">
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
          <h2 class="our-desc">Diet</h2> 
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
          <div class="col-xl-10 col-lg-10 col-md-10" id="diet-desc">
            <h2 style="color:black">Diet Information</h2>
            <br>
            
            <?php 
// Connect to the database
$host = 'localhost';
$user = 'root';
$pass = 'oakland';
$db   = 'pawpatch';
$conn = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Define the email address you want to retrieve pets for
$email = $_SESSION['email'];

// Execute the query
$sql = "SELECT diet.DietID, diet.Type, diet.Portion, diet.Frequency, pet.PetID, pet.Name AS PetName 
        FROM diet 
        INNER JOIN pet ON diet.PetID = pet.PetID 
        INNER JOIN user ON pet.email = user.email 
        WHERE user.email = '$email'";
$result = mysqli_query($conn, $sql);

// Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
  // Output the results as a Bootstrap card for each pet
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='card'>";
    echo "<div class='card-header'>Diet for " . $row['PetName'] . "</div>";
    echo "<div class='card-body'>";
    echo "<table class='table'>";
    echo "<thead><th>Type</th><th>Portion</th><th>Frequency</th></tr></thead>";
    echo "<tbody>";
    echo "</td><td>".$row['Type']."</td><td>".$row['Portion']."</td><td>".$row['Frequency']."</td></tr>";
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</div>";
  }
} else {
  // If the query returned no results, output an error message
  echo "No results found.";
}

// Close the database connection
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
      <button type="submit" class="pet-add btn btn-primary">Add Diet Info</button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>