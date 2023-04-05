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

      
      <div class="header">
        <div>
          <h2 class="our-desc">About Us</h2>
          <h2>Come Meet The owners & their pets!</h2>
        </div>
      </div>
      <br>
     

      <div class="container-fluid">
        <div class="row" id="name-desc">
          <div class="col-xl-2 col-lg-2 col-md-2">
            <img src="images/simba.jpeg" alt="dog picture" class="img-fluid">
          </div>
          <div class="col-xl-10 col-lg-10 col-md-10 mint" style="border:1px solid">
          <br>
            <h1>Salena Youhana</h1>
            <p class="pet-name">Project Role:  Frontend Development </p>
            <p class="pet-name"> College:  Oakland University</p>
            <p class="pet-name">Major:  Computer Science</p>
            <br>
            <h1>About Simba </h1>
            <p class="pet-name"> Dog's Breed: Maltese </p>
            <p class="pet-name"> Dog's Age: Three Years Old </p>
            <p class="pet-name">Dog's Hobbies: </p>
           
    
          </div>
        </div>
      </div>
      <br>
      <div class="container-fluid">
        <div class="row" id="name-desc">
          <div class="col-xl-2 col-lg-2 col-md-2">
            <img src="images/lulu.jpg" alt="dog picture" class="img-fluid">
          </div>
          <div class="col-xl-10 col-lg-10 col-md-10 mint" style="border:1px solid ">
          <br>
        <h1>Madison Pew</h1>
            <p class="pet-name">Project Role:  Frontend Development </p>
            <p class="pet-name">College:  Oakland University</p>
            <p class="pet-name">Major:  Computer Science</p>
            <br>
            <h2>About Lulu </h2>
            <p class="pet-name"> Dog's Breed: Greyhound </p>
            <p class="pet-name"> Dog's Age: Eight Years Old</p>
            <p class="pet-name">Dog's Hobbies:</p>

            
          </div>
        </div>
      </div>
      <br>
      <div class="container-fluid">
        <div class="row" id="name-desc">
          <div class="col-xl-2 col-lg-2 col-md-2">
            <img src="images/rocky.jpg" alt="dog picture" class="img-fluid">
          </div>
          <div class="col-xl-10 col-lg-10 col-md-10 mint" style="border:1px solid ">
          <br>
        <h1>John Ataalla</h1>
            <p class="pet-name">Project Role:  Backend Development </p>
            <p class="pet-name">College:  Oakland University</p>
            <p class="pet-name">Major:  Computer Science</p>
            <br>
            <h1>About Rocky</h1>
            <p class="pet-name"> Dog's Breed: German Shepard </p>
            <p class="pet-name"> Dog's Age: Six Years Old </p>
            <p class="pet-name">Dog's Hobbies: </p>
           
          </div>
        </div>
      </div>
      <br>
      <div class="container-fluid">
        <div class="row" id="name-desc">
          <div class="col-xl-2 col-lg-2 col-md-2 ">
            <img src="images/goldenretriever.jpg" alt="dog picture" class="img-fluid">
          </div>
          <div class="col-xl-10 col-lg-10 col-md-10 mint" style="border:1px solid">
          <br>
        <h1>Jack Jarrell</h1>
            <p class="pet-name">Project Role:  Backend and Frontend Development </p>
            <p class="pet-name">College:  Oakland University</p>
            <p class="pet-name">Major:  Information Technology</p>
            <br>
            <h1>About My Future Dog</h1>
            <p class="pet-name"> Dog's Breed: So many to pick from, but I would want a lap dog. </p>
            <p class="pet-name"> Dog's Age: N/A </p>
            <p class="pet-name">Dog's Hobbies: Id love to eventually get a dog that has high enery but also knows when to relax. </p>
           
          </div>
        </div>
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>