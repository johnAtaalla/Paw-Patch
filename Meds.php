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
  <body>
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
                  <a class="nav-link dropdown-toggle navtext" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding-left:20px; padding-right:20px;">
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
          <h2 class="our-desc">Medications</h2> 
        </div>
      </div>
     <br>
     <div class="container-fluid">
        <div class="row">
            <div class="col-sm sidebar h-100" style="height:515px;">
            <a class="nav-link side-bar" href="Landing.php">Dashboard</a>
            <hr>
            <a class="nav-link side-bar" href="Account.php">Account</a>
            <hr>
            <a class="nav-link side-bar" href="Pets.php">Pets</a>
            <hr>
                <a class="nav-link side-bar" href="Vaccinations.php">Vaccines</a>
            <hr>
                <a class="nav-link side-bar activated" href="Meds.php">Medications</a>
            <hr>
                <a class="nav-link side-bar" href="Diet.php">Diet</a>
            <hr>
                <a class="nav-link side-bar" href="Schedule.php">Schedules</a>
            </div>
          <div class="col-xl-10 col-lg-10 col-md-10 align-items-start" id="med-desc" style="border: 1px solid black; margin-top:0px;">
            <h2 style="color:black">Medication Cards for My Pets</h2>
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

// Define the email address you want to retrieve pets and medications for
$email = $_SESSION['email'];

// Execute the query to retrieve the pets and their medications
$sql = "SELECT med.MedID, med.MedName, med.MedStart, med.MedStop, med.MedDose, pet.PetID, pet.Name AS PetName
        FROM med 
        INNER JOIN pet ON med.PetID = pet.PetID 
        INNER JOIN user ON pet.email = user.email 
        WHERE user.email = '$email'";

$result = mysqli_query($conn, $sql);

// Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
  // Initialize an array to hold the pet IDs
  $petIDs = array();
  
  // Loop through the result and populate the pet IDs array
  while ($row = mysqli_fetch_assoc($result)) {
    $petID = $row['PetID'];
    
    // If the pet ID is not in the array, add it
    if (!in_array($petID, $petIDs)) {
      $petIDs[] = $petID;
    }
  }
  
  // Loop through the pet IDs and output a Bootstrap card for each pet, with their medications displayed in a table
  foreach ($petIDs as $petID) {
    // Execute the query to retrieve the medications for this pet
    $sql = "SELECT m.MedID, m.MedName, m.MedStart, m.MedStop, m.MedDose, p.Name
            FROM med m
            JOIN pet p ON m.PetID = p.PetID
            WHERE m.PetID = '$petID'";

    $result = mysqli_query($conn, $sql);

    // Fetch the pet's name from the query result
    $row = mysqli_fetch_assoc($result);
    $petName = $row['Name'];

    // Output the card header and start the table
    echo "<div class='card'>";
    echo "<div class='card-header pet-name'>Medications for " . $petName . "</div>";
    echo "<div class='card-body desc-font'>";
    echo "<table class='table'>";
    echo "<thead><tr><th>Medication Name</th><th>Start Date</th><th>Stop Date</th><th>Dose</th></tr></thead>";
    echo "<tbody>";

    // Loop through the medications and output each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><input type='hidden' name='MedID[]' value='" . $row['MedID'] . "'><td>" . $row['MedName'] . "</td><td>" . $row['MedStart'] . "</td><td>" . $row['MedStop'] . "</td><td>" . $row['MedDose'] . "</td></tr>";
    }

    // Close the table and card body
    echo "</tbody></table></div></div>";
}
} else {
  // If the query returned no results, output an error message
  echo "No results found.";
}

// Close the database connection
mysqli_close($conn);
?>
          
        
      
      <br>
    
      <div class="container-fluid">
  <div class="row">
    
    <div class="col-xl-10 col-lg-10 col-md-10">
      <button class="btn btn-primary" onclick="toggleForm()">Add Medication</button><br>
      <br>

      <form action="AddMeds.php" method="post" id="med-form" style="display: none; background-color: white; padding:10px;">
        <br><label for="med-name">Medication Name:</label>
        <input type="text" style="border:1px solid gray" id="MedName" name="MedName"><br>

        <label for="start-date">Start Date:</label>
        <input type="date" style="border:1px solid gray" id="MedStart" name="MedStart"><br>
        <br>
        <label for="stop-date">Stop Date:</label>
        <input type="date" style="border:1px solid gray" id="MedStop" name="MedStop"><br>
        <br>
        <label for="dose">Dose:</label>
        <input type="text" style="border:1px solid gray" id="MedDose" name="MedDose"><br>

        <label for="pet-name">Pet Name:</label>
        <?php include 'getPets.php'; ?>
        <br>
        <br>
        <button name="submit" class="btn btn-secondary" type="submit">Save</button>
      </form>
   
    </div>
  </div>
</div>
</div>
</div>
</div>

<script> 
function toggleForm() {
  var form = document.getElementById("med-form");
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