<?php
session_start();


if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
}


$host = "localhost";
$username = "root";
$dbPassword = "oakland";
$dbname = "pawpatch";


$con = mysqli_connect($host, $username, $dbPassword, $dbname);


if (!$con)
{
    die("Connection failed!" . mysqli_connect_error());
}


$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
$rs = mysqli_query($con, $sql);

if(mysqli_num_rows($rs) == 1)
{
    
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;

 
    header("Location: Landing.php");
}
else 
{
    $_SESSION['error'] = 'Invalid email or password. Please try again.';
    header('Location: login.php');
}


mysqli_close($con);
?>