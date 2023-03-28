<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Connect to the database
  $host = 'localhost';
  $username = 'root';
  $password = 'oakland';
  $database = 'pawpatch';
  $conn = new mysqli($host, $username, $password, $database);

  // Get the pet ID from the form
  $pet_id = $_POST['PetID'];

  // Update the pet information in the database
  $stmt = $conn->prepare("UPDATE pet SET Name=?, Species=?, Breed=?, Age=?, Gender=?, Health_Problems=?, General=? WHERE PetID=?");
  $stmt->bind_param("sssssssi", $_POST['Name'], $_POST['Species'], $_POST['Breed'], $_POST['Age'], $_POST['Gender'], $_POST['Health_Problems'], $_POST['General'], $pet_id);
  $stmt->execute();
  $stmt->close();

  // Redirect the user back to the page displaying the updated information
  header("Location: Pets.php");
  exit();
}
?>