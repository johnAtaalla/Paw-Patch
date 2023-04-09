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

// Handle form submission
if (isset($_POST['submit'])) {
    $MedName = $_POST['MedName'];
    $MedStart = $_POST['MedStart'];
    $MedStop= $_POST['MedStop'];
    $MedDose = $_POST['MedDose'];
    $PetID = $_POST['PetID'];
  
    
}


    $conn = OpenCon();

    // Construct the SQL statement with placeholders
    $sql = "INSERT INTO med (MedName, MedStart, MedStop, MedDose, PetID) VALUES (?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the statement
    $stmt->bind_param("ssssi", $MedName, $MedStart, $MedStop, $MedDose, $PetID);

    // Execute the statement
    if ($stmt->execute() === true) {
        // Output the values for debugging purposes
        header('Location: Meds.php');
    } else {
        header('Location: Meds.php');
    }

    // Close the statement
    $stmt->close();

    CloseCon($conn);


?>