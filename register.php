<?php

session_start();

$error_message = '';

function OpenCon() {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "oakland";
    $db = "pawpatch";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

    return $conn;
}

function CloseCon($conn) {
    $conn -> close();
}

function emailExists($email) {
    $conn = OpenCon();

   
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

   
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }

    CloseCon($conn);
}


if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    
    if (emailExists($email)) {
      
        $_SESSION['error_message'] = "Email already is in use, try another email or Login.";
      
        header('Location: AccountCreate.php');
        exit();
    } else {
    
        $conn = OpenCon();
        $stmt = $conn->prepare("INSERT INTO user (firstname, lastname, email, password, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $firstname, $lastname, $email, $password, $role);
        $stmt->execute();
        CloseCon($conn);
        header('Location: login.php');
    }
}


if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
   
    unset($_SESSION['error_message']);
}
?>
