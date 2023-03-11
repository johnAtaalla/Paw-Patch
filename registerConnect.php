<?php
print_r($_POST);

    // getting all values from the HTML form
    if(isset($_POST['submit']))
    {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    }

    // database details
    $host = "localhost";
    $username = "root";
    $dbPassword = "";
    $dbname = "paw-patch test";

    // creating a connection
    $con = mysqli_connect($host, $username, $dbPassword, $dbname);

    // to ensure that the connection is made
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }

    // using sql to create a data entry query
    $sql = "INSERT INTO user (email, password, firstname, lastname) VALUES ('$email', '$password', '$firstName','$lastName')";
  
    // send query to the database to add values and confirm if successful
    $rs = mysqli_query($con, $sql);
    if($rs)
    {
        echo "Entries added!";
        header("Location:  ./Account.html");
    }
  
    // close connection
    mysqli_close($con);

?>