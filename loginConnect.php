<?php
if (count($_POST) > 0) {
    $isSuccess = 0;
    $conn = mysqli_connect("localhost", "root", "", "paw-patch test");
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $sql = "SELECT * FROM user WHERE email= ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $email);
    $statement->execute();
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()) {
        if (! empty($row)) {
            $hashedPassword = $row["password"];
            if ($_POST["password"] == $hashedPassword) {
                $isSuccess = 1;
            }
        }
    }
    if ($isSuccess == 0) {
        $message = ("Invalid Email or Password!");
        //header("Location:  ./login.html");
        echo '<script type="text/javascript">';
        echo ' alert("Invalid Email or Password")';  //not showing an alert box.
        echo '</script>';
    } else {
        print_r("Success");
        $message = "Success";
        header("Location:  ./Account.html");
    }
}
?>