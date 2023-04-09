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
        <li class="nav-item">
          <a class="nav-link active navtext" href="Landing.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navtext " href="About.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navtext " href="index.php">What We Offer</a>
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

      <div class="header">
        <div>
          <h2 class="our-desc">Diet</h2> 
        </div>
      </div>
      <br>
    
     
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm sidebar" style="height = 450px;">
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
        WHERE user.email = '$email'
         ORDER BY pet.PetID";

$result = mysqli_query($conn, $sql);

// Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
  $previousPetID = null; // Initialize the previous PetID to null
  while ($row = mysqli_fetch_assoc($result)) {
    $currentPetID = $row['PetID'];
    if ($currentPetID != $previousPetID) {
      // Close the previous card (if it exists) and output the edit button
      if ($previousPetID != null) {
        echo "</tbody></table>";
        echo '<button type="button" class="btn btn-primary" onclick="toggleUpdate()"'.$previousPetID.'">Edit</button>';
        echo '<div id="edit-form'.$previousPetID.'" class="collapse">';
        echo '<form method="post" action="edit_diet.php">';
        echo '<input type="hidden" name="petid" value="'.$previousPetID.'">';
        echo '<input type="text" name="type">';
        echo '<input type="text" name="portion">';
        echo '<input type="text" name="frequency">';
        echo '<button type="submit">Save</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
      }
      // Open a new card for the current pet
      echo '<div class="card">
       <div class="card-header pet-name">Diet for ' .$row['PetName'].'</div>
       <div class="card-body desc-font">
      <table class="table">
      <thead><tr><th>Type</th><th>Portion</th><th>Frequency</th></tr></thead>
       <tbody>';
      $previousPetID = $currentPetID; // Set the previous PetID to the current PetID
    }
    // Output the current diet entry for the current pet
    echo "<tr><td>".$row['Type']."</td><td>".$row['Portion']."</td><td>".$row['Frequency']."</td></tr>";
  }
  // Close the final card and output the edit button
  echo "</tbody></table>";
  echo '<button type="button" class="btn btn-primary" onclick="toggleUpdate()" '.$previousPetID.'">Edit</button>';
  echo '<div id="edit-form-'.$previousPetID.'" class="collapse">';
  echo '<form method="post" action="edit_diet.php">';
  echo '<input type="hidden" name="petid" value="'.$previousPetID.'">';
  echo '<input type="text" name="type">';
  echo '<input type="text" name="portion">';
  echo '<input type="text" name="frequency">';
  echo '<button type="submit">Save</button>';
  echo '</form>';
  echo '</div>';
  echo '</div>';
} else {
  // If the query returned no results, output an error message
  echo "No results found.";
}
// Close the database connection
mysqli_close($conn);
?>



          </div>
          <br>
          <div class="container-fluid">
        <div class="row">
                <div class="col-sm sidebar" style="background-color:white; border:none;"></div>
          <div class="col-xl-10 col-lg-10 col-md-10">
      <button onclick="toggleForm()">Add Diet Info</button>

      <form action="AddDiet.php" method="post" id="diet-form" style="display: none;">
        <label for="type">Type of Food:</label>
        <input type="text" id="Type" name="Type"><br>

        <label for="portion">Portion:</label>
        <input type="text" id="Portion" name="Portion"><br>

        <label for="freq">Frequency:</label>
        <input type="text" id="Frequency" name="Frequency"><br>

        

        <label for="pet-name">Pet Name:</label>
        <?php include 'getPets.php'; ?>
        <br>

        <button name="submit" type="submit">Save</button>
      </form>
      </div>
        </div>
      </div>
      <br>
    
  </div>
</div>

<script> 
function toggleForm() {
  var form = document.getElementById("diet-form");
  if (form.style.display === "none") {
    form.style.display = "block";
  } else {
    form.style.display = "none";
  }
}

</script>

<script>
function toggleUpdate() {
  var form = document.getElementById("edit-form");
  if (form.style.display === "none") {
    form.style.display = "block";
  } else {
    form.style.display = "none";
  }
}
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>