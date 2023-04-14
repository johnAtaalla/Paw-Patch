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
    $MedName = $_POST['MedName'];
    $MedStart = $_POST['MedStart'];
    $MedStop= $_POST['MedStop'];
    $MedDose = $_POST['MedDose'];
    $PetID = $_POST['PetID'];
  
    
}


    $conn = OpenCon();

   
    $sql = "INSERT INTO med (MedName, MedStart, MedStop, MedDose, PetID) VALUES (?, ?, ?, ?, ?)";

  
    $stmt = $conn->prepare($sql);

   
    $stmt->bind_param("ssssi", $MedName, $MedStart, $MedStop, $MedDose, $PetID);

   
    if ($stmt->execute() === true) {
      
        header('Location: Meds.php');
    } else {
        header('Location: Meds.php');
    }

   
    $stmt->close();

    CloseCon($conn);


?>