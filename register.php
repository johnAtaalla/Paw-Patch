<?php
// Start session
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

    // Prepare a SQL statement to check if email already exists
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // If there's a row in the result, email already exists
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }

    CloseCon($conn);
}

// Handle form submission
if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Check if email already exists
    if (emailExists($email)) {
        // Set error message as session variable
        $_SESSION['error_message'] = "Email already is in use, try another email or Login.";
        // Redirect back to registration page
        header('Location: AccountCreate.php');
        exit();
    } else {
        // Insert new user into database
        $conn = OpenCon();
        $stmt = $conn->prepare("INSERT INTO user (firstname, lastname, email, password, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $firstname, $lastname, $email, $password, $role);
        $stmt->execute();
        CloseCon($conn);
        header('Location: login.php');
    }
}

// Retrieve error message from session variable
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    // Unset session variable to clear error message
    unset($_SESSION['error_message']);
}
?>
