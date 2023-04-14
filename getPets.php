<?php


$servername = "localhost";
$username = "root";
$password = "oakland";
$dbname = "pawpatch";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$email = $_SESSION['email'];
$sql = "SELECT Name, PetID  FROM pet WHERE email = '$email'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
  
    echo "<select id='PetID' name='PetID'>";
    
   
    while ($row = mysqli_fetch_assoc($result)) {
        $petName = $row['Name'];
        $petID = $row['PetID'];
        echo "<option value='$petID'>$petName</option>";
    }
    
    
    echo "</select>";
} else {
  
    echo "No pets found.";
}


mysqli_close($conn);
?>