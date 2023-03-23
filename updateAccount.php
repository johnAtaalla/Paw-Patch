<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
  header('Location: login.html');
  exit;
}

$servername = "localhost";
$username = "root";
$password = "oakland";
$dbname = "pawpatch";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$fname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lname = mysqli_real_escape_string($conn, $_POST['lastname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$address = mysqli_real_escape_string($conn, $_POST['address']);

// TODO: Validate the input data to prevent SQL injection and other security vulnerabilities

$sql = "UPDATE user SET firstname = '$fname', lastname = '$lname', phone = '$phone', address = '$address' WHERE email = '$email'";

if (mysqli_query($conn, $sql)) {
    header('Location: Account.php');
} else {
  echo "Error updating user information: " . mysqli_error($conn);
}

mysqli_close($conn);
?>