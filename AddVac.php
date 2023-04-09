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
    $VacName = $_POST['VacName'];
    $VacDate = $_POST['VacDate'];
    $PetID = $_POST['PetID'];
  
    
}


    $conn = OpenCon();

    // Construct the SQL statement with placeholders
    $sql = "INSERT INTO vaccine (VacName, VacDate, PetID) VALUES (?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the statement
    $stmt->bind_param("ssi", $VacName, $VacDate, $PetID);

    // Execute the statement
    if ($stmt->execute() === true) {
        // Output the values for debugging purposes
        header('Location: Vaccinations.php');
    } else {
        header('Location: Vaccinations.php');
    }

    // Close the statement
    $stmt->close();

    CloseCon($conn);


?>