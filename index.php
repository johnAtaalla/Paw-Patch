<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paw Patch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="body-color" >
    <h1><img src="images/Logo.png" alt="Logo" width="60" height="60" class="d-inline-block align-text-top">Paw Patch</h1>

    <?php
    session_start();
  ?>

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
     
        if(isset($_SESSION['email'])) { 
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



<div class="welcome-to">
        <h1 class="home-item">Welcome to Paw Patch!</h1>
        <h2 class="home-item">We Provide:</h2>
      </div>


      <br>
      <div class="container-fluid">
        <div class="row">
          <div class="col ">
            <div class="container text-center">
              <div class="circle"><image src="images/capsule-pill.svg" style="width:100px; text-align: center; margin-bottom: 20px; filter: invert(1);"></div>
            </div>
            <br>
            <div class="main1 info-block">
            <h2 class="homepage-header">Medication Tracking & Reminders</h2>
            <p class="desc-font">With Paw Patch, pet owners can track the medications that their pets are taking including the name, dose, and frequency. This information can be used to set up reminders so you never forget to give your pet their medicine!</p>
            </div>
          </div>
          <div class="col">
            <div class="container text-center">
              <div class="circle"><image src="images/clipboard2-pulse.svg" style="width:100px; text-align: center; margin-bottom: 20px; filter: invert(1);"></div>
            </div>
            <br>
            <div class="main1 info-block">
            <h2 class="homepage-header">Health & Vaccination Records</h2>
            <p class="desc-font">Keep all your pet's health history and vaccination information in one place! Paw Patch will assist you to make sure you have easy access to your pets health history and vaccination information for the best up-to-date care.</p>
          </div>
          </div>
          <div class="col">
            <div class="container text-center">
              <div class="circle"><image src="images/heart-pulse.svg" style="width:100px; text-align: center; margin-bottom: 15px; filter: invert(1);"></div>
            </div>
            <br>
            <div class="main1 info-block">
            <h2 class="homepage-header">Veterinarian Contact</h2>
            <p class="desc-font">Stay in contact with your veterinarian and allow them access to view your pet's health information for the most accurate and in-depth care they can offer.</p>
            </div>
          </div>
          <div class="col">
            <div class="container text-center">
              <div class="circle"><image src="images/person-lines-fill.svg" style="width:100px; text-align: center; margin-bottom: 20px; filter: invert(1);"></div>
            </div>
            <br>
            <div class="main1 info-block">
            <h2 class="homepage-header">Pet Aids</h2>
            <p class="desc-font">Find a trustworthy pet sitter that is willing and able to take care of a pet that has additional needs such as medication requirements or specialized care. Rest easy knowing your pet is in the best of hands.</p>
            </div>
          </div>
        </div>
        
      </div>
      
    
      </div>

      

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>