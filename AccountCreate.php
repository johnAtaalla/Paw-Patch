<?php include 'register.php'; ?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paw Patch</title>
    <script>
    function checkPasswords() {
      var password = document.getElementById("password").value;
      var repeatPassword = document.getElementById("repeatPassword").value;
      
      if (password != repeatPassword) {
        alert("Passwords do not match");
        return false;
      }
      
      return true;
    }
  </script>
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



      <div class="container">

      <div class="row">
        <div class="col"></div>
      <div class="login col-6">
        <h1>Create Account:</h1>

        <?php if (!empty($error_message)) { ?>
         
          <div class="alert alert-danger" role="alert"><?php echo $error_message; ?></div>
       
    <?php } ?>


    


      <form action="register.php" onsubmit="return checkPasswords();" method="post">
    
        <div class="mb-3">
          <label for="firstname" class="form-label desc-font">First Name:</label>
          <input  class="form-control" id="firstname" name="firstname" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
          <label for="lastName" class="form-label desc-font">Last Name:</label>
          <input  class="form-control" id="lastName" name="lastname" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label desc-font">Email:</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
          <div id="emailHelp" class="form-text helper-text">Please enter your email</div>
          <div id="emailFeedback" class="invalid-feedback"></div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label desc-font">New Password:</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
          <label for="repeatPassword" class="form-label desc-font">Repeat New Password:</label>
          <input type="password" class="form-control" id="repeatPassword" name="repeatPassword" required>
        </div>
     <div class="mb-3">  
      <h3> Select your Role </h3>
      <br>
    <input type="radio" id="owner" name="role" value="Owner">
    <label for="owner" class ="desc-font">Pet Owner</label><br>
        </div>
    
<div class="mb-3">  
    <input type="radio" id="aid" name="role" value="Aid">
    <label for="aid"  class="desc-font">Pet Aid</label><br>
        </div>
<div class="mb-3">  
    <input type="radio" id="Vet" name="role" value="Vet">
    <label for="vet" class="desc-font">Veterinarian</label><br>
        </div>
  <br>
        
        <button type="submit" class="submit btn btn-primary" name="submit">Create Account</button>
        <a href="login.php" class="submit btn btn-primary" name="submit">Login</a>
      </form> 
   
      </div> 
      <div class="col"></div>
      </div>
      
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>