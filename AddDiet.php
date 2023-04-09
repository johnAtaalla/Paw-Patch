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
    $Type = $_POST['Type'];
    $Portion = $_POST['Portion'];
    $Frequency = $_POST['Frequency'];
    $PetID = $_POST['PetID'];
  
    
}


    $conn = OpenCon();

    // Construct the SQL statement with placeholders
    $sql = "INSERT INTO diet (`Type`, `Portion`, `Frequency`, `PetID`) VALUES (?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the statement
    $stmt->bind_param("sssi", $Type, $Portion, $Frequency, $PetID);

    // Execute the statement
    if ($stmt->execute() === true) {
        // Output the values for debugging purposes
        header('Location: Diet.php');
    } else {
        header('Location: Diet.php');
    }

    // Close the statement
    $stmt->close();

    CloseCon($conn);


?>