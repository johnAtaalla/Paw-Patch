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
    $Name = $_POST['Name'];
    $Species = $_POST['Species'];
    $Breed = $_POST['Breed'];
    $Age = $_POST['Age'];
    $Gender = $_POST['Gender'];
    $Health_Problems = $_POST['Health_Problems'];
    $General = $_POST['General'];
    $email = $_SESSION['email'];

    $conn = OpenCon();

    // Construct the SQL statement with placeholders
    $sql = "INSERT INTO pet (Name, Species, Breed, Age, Gender, Health_Problems, General, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the statement
    $stmt->bind_param("sssissss", $Name, $Species, $Breed, $Age, $Gender, $Health_Problems, $General, $email);

    // Execute the statement
    if ($stmt->execute() === true) {
        // Output the values for debugging purposes
        header('Location: Pets.php');
    } else {
        header('Location: Pets.php');
    }

    // Close the statement
    $stmt->close();

    CloseCon($conn);
}

?>