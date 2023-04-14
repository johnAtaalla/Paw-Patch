<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
  $host = 'localhost';
  $username = 'root';
  $password = 'oakland';
  $database = 'pawpatch';
  $conn = new mysqli($host, $username, $password, $database);

 
  $pet_id = $_POST['PetID'];

 
  $stmt = $conn->prepare("UPDATE pet SET Name=?, Species=?, Breed=?, Age=?, Gender=?, Health_Problems=?, General=? WHERE PetID=?");
  $stmt->bind_param("sssssssi", $_POST['Name'], $_POST['Species'], $_POST['Breed'], $_POST['Age'], $_POST['Gender'], $_POST['Health_Problems'], $_POST['General'], $pet_id);
  $stmt->execute();
  $stmt->close();

  
  header("Location: Pets.php");
  exit();
}
?>