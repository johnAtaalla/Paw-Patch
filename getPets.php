<?php
// Assuming you already have a session started
// and the email is stored in $_SESSION['email']

$servername = "localhost";
$username = "root";
$password = "oakland";
$dbname = "pawpatch";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the user's pets based on their email
$email = $_SESSION['email'];
$sql = "SELECT Name, PetID  FROM pet WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

// Check if any pets were found
if (mysqli_num_rows($result) > 0) {
    // Start building the drop-down list
    echo "<select id='PetID' name='PetID'>";
    
    // Loop through each row of the result set and add the pet name to the drop-down list
    while ($row = mysqli_fetch_assoc($result)) {
        $petName = $row['Name'];
        $petID = $row['PetID'];
        echo "<option value='$petID'>$petName</option>";
    }
    
    // End the drop-down list
    echo "</select>";
} else {
    // No pets found
    echo "No pets found.";
}

// Close the database connection
mysqli_close($conn);
?>