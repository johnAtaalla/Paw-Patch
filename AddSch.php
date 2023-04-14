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
    $Morning = $_POST['Morning'];
    $Afternoon = $_POST['Afternoon'];
    $Evening = $_POST['Evening'];
    $WeekOf = $_POST['WeekOf'];
    $PetID = $_POST['PetID'];
  
    
}


    $conn = OpenCon();

   
    $sql = "INSERT INTO schedule (Morning, Afternoon, Evening, WeekOf, PetID) VALUES (?, ?, ?, ?, ?)";

   
    $stmt = $conn->prepare($sql);

  
    $stmt->bind_param("ssssi", $Morning, $Afternoon, $Evening, $WeekOf, $PetID);

 
    if ($stmt->execute() === true) {
       
        header('Location: Schedule.php');
    } else {
        header('Location: Schedule.php');
    }

  
    $stmt->close();

    CloseCon($conn);


?>