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
    $Type = $_POST['Type'];
    $Portion = $_POST['Portion'];
    $Frequency = $_POST['Frequency'];
    $PetID = $_POST['PetID'];
  
    
}


    $conn = OpenCon();

    
    $sql = "INSERT INTO diet (`Type`, `Portion`, `Frequency`, `PetID`) VALUES (?, ?, ?, ?)";

   
    $stmt = $conn->prepare($sql);

   
    $stmt->bind_param("sssi", $Type, $Portion, $Frequency, $PetID);

  
    if ($stmt->execute() === true) {
     
        header('Location: Diet.php');
    } else {
        header('Location: Diet.php');
    }

  
    $stmt->close();

    CloseCon($conn);


?>