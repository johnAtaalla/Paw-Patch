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
    session_start();
  ?>

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
        session_start();
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
          <h2 class="our-desc">Schedule</h2> 
        </div>
      </div>
      <br>
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm sidebar" style="height:450px;">
            <a class="nav-link side-bar " href="Account.php">Account</a>
            <hr>
            <a class="nav-link side-bar" href="Pets.php">Pets</a>
            <hr>
                <a class="nav-link side-bar" href="Vaccinations.php">Vaccines</a>
            <hr>
                <a class="nav-link side-bar" href="Meds.php">Medications</a>
            <hr>
                <a class="nav-link side-bar" href="Diet.php">Diet</a>
            <hr>
                <a class="nav-link side-bar activated" href="Schedule.php">Schedules</a>
            </div>
          <div class="col-xl-10 col-lg-10 col-md-10">
            <div id="profile-desc">
            <h2 style="color:black" class="card-title">Schedule Information</h2>
            <p class="card-text">Pet Name: Lulu</p>
            <p class="card-text">Wake Up: 7:30am</p>
            <p class="card-text">Walk: 8:30am</p>
            <p class="card-text">Eat: 8am, 5pm</p>
            <p class="card-text">Sleep: 9pm</p>
            <p class="card-text">Notes: </p>
            <button type="submit" class="pet-add btn btn-primary" style="margin-left: auto">Edit Schedule</button>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="container-fluid">
        <div class="row">
                <div class="col-sm sidebar" style="background-color:white; border:none;"></div>
          <div class="col-xl-10 col-lg-10 col-md-10">
      <button type="submit" class="pet-add btn btn-primary">Add Schedule Info</button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>