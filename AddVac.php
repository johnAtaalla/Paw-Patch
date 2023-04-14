<?php

session_start();

function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "oakland";
    $db = "pawpatch";
    ($conn = new mysqli($dbhost, $dbuser, $dbpass, $db)) or
        die("Connect failed: %s\n" . $conn->error);

    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}


if (isset($_POST['submit'])) {
    $VacName = $_POST['VacName'];
    $VacDate = $_POST['VacDate'];
    $PetID = $_POST['PetID'];
  
    
}


    $conn = OpenCon();

   
    $sql = "INSERT INTO vaccine (VacName, VacDate, PetID) VALUES (?, ?, ?)";

  
    $stmt = $conn->prepare($sql);

    
    $stmt->bind_param("ssi", $VacName, $VacDate, $PetID);


    if ($stmt->execute() === true) {
      
        header('Location: Vaccinations.php');
    } else {
        header('Location: Vaccinations.php');
    }

   
    $stmt->close();

    CloseCon($conn);


?>