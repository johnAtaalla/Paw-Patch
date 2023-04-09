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
    $Morning = $_POST['Morning'];
    $Afternoon = $_POST['Afternoon'];
    $Evening = $_POST['Evening'];
    $WeekOf = $_POST['WeekOf'];
    $PetID = $_POST['PetID'];
  
    
}


    $conn = OpenCon();

    // Construct the SQL statement with placeholders
    $sql = "INSERT INTO schedule (Morning, Afternoon, Evening, WeekOf, PetID) VALUES (?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the statement
    $stmt->bind_param("ssssi", $Morning, $Afternoon, $Evening, $WeekOf, $PetID);

    // Execute the statement
    if ($stmt->execute() === true) {
        // Output the values for debugging purposes
        header('Location: Schedule.php');
    } else {
        header('Location: Schedule.php');
    }

    // Close the statement
    $stmt->close();

    CloseCon($conn);


?>