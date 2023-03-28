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
          <a class="nav-link navtext" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active navtext " href="About.php">About Us</a>
        </li>
        <?php
        session_start();
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
            <h2>Salena Youhana</h2>
            <p><b>Project Role: </b> Frontend Development </p>
            <p><b>College: </b> Oakland University</p>
            <p><b>Major: </b> Computer Science</p>
            <br>
            <h2>About Simba </h2>
            <p> <b>Dog's Breed:</b> Maltese </p>
            <p> <b>Dog's Age</b>: Three Years Old </p>
            <p><b>Dog's Hobbies:</b> </p>
           
    
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
        <h2>Madison Pew</h2>
            <p><b>Project Role: </b> Frontend Development </p>
            <p><b>College: </b> Oakland University</p>
            <p><b>Major: </b> Computer Science</p>
            <br>
            <h2>About Lulu </h2>
            <p> <b>Dog's Breed:</b> Greyhound </p>
            <p> <b>Dog's Age</b>: Eight Years Old</p>
            <p><b>Dog's Hobbies:</b> </p>

            
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
        <h2>John Ataalla</h2>
            <p><b>Project Role: </b> Backend Development </p>
            <p><b>College: </b> Oakland University</p>
            <p><b>Major: </b> Computer Science</p>
            <br>
            <h2>About Rocky</h2>
            <p> <b>Dog's Breed:</b> German Shepard </p>
            <p> <b>Dog's Age</b>: Six Years Old </p>
            <p><b>Dog's Hobbies:</b> </p>
           
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
        <h2>Jack Jarrell</h2>
            <p><b>Project Role: </b> Backend and Frontend Development </p>
            <p><b>College: </b> Oakland University</p>
            <p><b>Major: </b> Information Technology</p>
            <br>
            <h2>About My Future Dog</h2>
            <p> <b>Dog's Breed:</b> So many to pick from, but I would want a lap dog. </p>
            <p> <b>Dog's Age</b>: N/A </p>
            <p><b>Dog's Hobbies:</b> Id love to eventually get a dog that has high enery but also knows when to relax. </p>
           
          </div>
        </div>
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>