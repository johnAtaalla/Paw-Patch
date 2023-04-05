<?php
session_start();

// getting all values from the HTML form
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
}

// database details
$host = "localhost";
$username = "root";
$dbPassword = "oakland";
$dbname = "pawpatch";

// creating a connection
$con = mysqli_connect($host, $username, $dbPassword, $dbname);

// to ensure that the connection is made
if (!$con)
{
    die("Connection failed!" . mysqli_connect_error());
}

// using sql to select the user with the given email and password
$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
$rs = mysqli_query($con, $sql);

if(mysqli_num_rows($rs) == 1) // if user exists with given email and password
{
    // set session variables
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;

    // redirect to home page
    header("Location: Landing.php");
}
else // if login fails
{
    $_SESSION['error'] = 'Invalid email or password. Please try again.';
    header('Location: login.php');
}

// close connection
mysqli_close($con);
?>