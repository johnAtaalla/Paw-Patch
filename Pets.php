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

// Get pets' information for the logged-in user
$email = mysqli_real_escape_string($conn, $_SESSION['email']);
$sql = "SELECT PetID, Name, Breed, Species, Health_Problems, Age, Gender, General, img_name, img_dir FROM pet WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

$petInfo = array(); // Array to store pets' information

if (mysqli_num_rows($result) > 0) {
  // Loop through all rows to fetch information for each pet
  while ($row = mysqli_fetch_assoc($result)) {
    $pet = array(
      'PetID' => $row['PetID'],
      'Name' => $row['Name'],
      'Breed' => $row['Breed'],
      'Species' => $row['Species'],
      'Health_Problems' => $row['Health_Problems'],
      'Age' => $row['Age'],
      'Gender' => $row['Gender'],
      'General' => $row['General'],
      'imageName' => $row['img_name'],
      'imageDir' => $row['img_dir']

    );
    // Add pet's information to the array
    array_push($petInfo, $pet);
  }
} else {
  // Add information for unknown pet
  $pet = array(
    'PetID' => 'Unknown',
    'Name' => 'Unknown',
    'Breed' => 'Unknown',
    'Species' => 'Unknown',
    'Health_Problems' => 'Unknown',
    'Age' => 'Unknown',
    'Gender' => 'Unknown',
    'General' => 'Unknown',
    'imageName' => 'Unknown',
    'imageDir' => 'petPhotos/placeholder.jpg'

  );
  // Add pet's information to the array
  array_push($petInfo, $pet);
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
    
    <?php
    
  ?>
<style>
  form {
    background-color: white;
    padding: 30px;
}
</style>

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
      <div class="header">
        <div>
          <h2 class="our-desc">My Pets</h2> 
        </div>
      </div>
      <br>

      <div class="container-fluid" >
        <div class="row">
            <div class="col-sm sidebar" style="height:450px;">
            <a class="nav-link side-bar " href="Account.php">Account</a>
            <hr>
            <a class="nav-link side-bar activated" href="Pets.php">Pets</a>
            <hr>
                <a class="nav-link side-bar" href="Vaccinations.php">Vaccines</a>
            <hr>
                <a class="nav-link side-bar" href="Meds.php">Medications</a>
            <hr>
                <a class="nav-link side-bar" href="Diet.php">Diet</a>
            <hr>
                <a class="nav-link side-bar" href="Schedule.php">Schedules</a>
            </div>
          <div class="col-xl-10 col-lg-10 col-md-10" id="pet-desc">
            <h2 style="color:black">    </h2>
            <div class="col-xl-2 col-lg-2 col-md-2" style="border:1px solid #ddd">
            
          </div>

<?php
foreach ($petInfo as $pet) {
  echo '<div class="card" style="font-size:20px;">
          <div class="card-body"">
            <h5 class="card-text" style="font-size = 20pt">' . $pet['Name'] . '</h5>
            <br>
            <div class="col-xl-2 col-lg-2 col-md-2">
            <img src="' . $pet['imageDir'] . '" alt="dog picture" class="img-fluid">
            </div>
            <br>
            <h6 class="card-text mb-2">Species: ' . $pet['Species'] . '</h6>
            <p class="card-text">Breed: ' . $pet['Breed'] . '</p>
            <p class="card-text">Age: ' . $pet['Age'] . '</p>
            <p class="card-text">Gender: ' . $pet['Gender'] . '</p>
            <p class="card-text">Health Problems: ' . $pet['Health_Problems'] . '</p>
            <p class="card-text">General Information: ' . $pet['General'] . '</p>
          </div>
        </div>
        
        <button type="button" class="pet-add btn btn-primary" style="margin-left: auto">Edit Pet Info</button>

        <div class="form-container" style="display: none; 
        overflow: hidden;
        align: center;
        height: 800px; 
        width: 100%; 
        text-align:justify;
        box-sizing: border-box;
        padding: 2rem;
        grid-template-columns: 1fr 1fr;">

        <form method="POST" action="update_pet.php">
        <span class = " d-block label label-default">Name</span>
            <input type="text" name="Name" value="' . $pet['Name'] . '">
            <span class = " d-block label label-default">Species</span>
            <input type="text" name="Species" value="' . $pet['Species'] . '">
            <span class = " d-block label label-default">Breed</span>
            <input type="text" name="Breed" value="' . $pet['Breed'] . '">
            <span class = " d-block label label-default">Age</span>
            <input type="text" name="Age" value="' . $pet['Age'] . '">
            <span class = " d-block label label-default">Gender</span>
            <input type="text" name="Gender" value="' . $pet['Gender'] . '">
            <span class = " d-block label label-default">Health Info</span>
            <input type="text" name="Health_Problems" value="' . $pet['Health_Problems'] . '">
            <span class = " d-block label label-default">General Info</span>
            <input type="text" name="General" value="' . $pet['General'] . '">
            <input type="hidden"  name="PetID" value="' . $pet['PetID'] . '">
            <input type="submit" button type="button" class="submit btn btn-primary" name="update" value="Update">
          </form>
        </div>';
}
?>

<script>
  var editButtons = document.querySelectorAll('.pet-add');
  var formContainers = document.querySelectorAll('.form-container');

  editButtons.forEach(function(button, index) {
    button.addEventListener('click', function() {
      formContainers[index].style.display = 'block';
    });
  });
</script>

<div class="form-container" id="pet-form" 
style="display: none; 
    overflow: hidden;
    align: center;
    height: 900px; 
    width: 100%; 
    text-align:justify;
    box-sizing: border-box;
    padding: 2rem;
    grid-template-columns: 1fr 1fr;">
<form action="AddPet.php" method="post" enctype="multipart/form-data">

<div class="mb-3">
<label for="Name" class="form-label">Pet Name</label>
            <input type="text" class="form-control" id="Name" name="Name" value=" ">
</div>
<div class="mb-3">
<label for="Species" class="form-label">Species</label>
            <input type="text" class="form-control" id="Species" name="Species" value=" ">
            </div>

            <div class="mb-3"> 
            <label for="Breed" class="form-label">Breed</label>         
            <input type="text" class="form-control" id="Breed" name="Breed" value=" ">
            </div>
            <div class="mb-3">
            <label for="Age" class="form-label">Age</label> 
            <input type="text"class="form-control" id="Age" name="Age" value=" ">
            </div>
            <div class="mb-3">
            <label for="Gender" class="form-label">Gender</label> 
            <input type="text"class="form-control" id="Gender" name="Gender" value=" ">
            </div>
            <div class="mb-3">
            <label for="Health_Problems" class="form-label">Health Problems</label> 
            <input type="text"class="form-control" id="Health_Problems" name="Health_Problems" value=" ">
            </div>
            <div class="mb-3">
            <label for="General" class="form-label">General</label> 
            <input type="text"class="form-control" id="General"name="General" value=" ">
            </div>
            <div class="mb-3">
            <label for="ImageUpload" class="form-label">Image Updload</label> 
            <input type="file" name="userfile[]" value="" multiple="">
            </div>
            
         
            <input type="submit" button type="button" class="submit btn btn-primary" name="submit" value="Add Pet">

          </form>
</div>

          </div>

        </div>
        
      </div>
     
      <br>

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm sidebar" style="background-color:white; border:none;"></div>
          <div class="col-xl-10 col-lg-10 col-md-10">
  <button type="submit" class="pet-create btn btn-primary" onclick="toggleForm()">Add Pet</button>

</div>



<script>
function toggleForm() {
  var form = document.getElementById("pet-form");
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