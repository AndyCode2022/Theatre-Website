<?php require 'header.php'; ?>

<?php

require "dbconnect.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT userno, firstname, lastname, password FROM users
        WHERE username = '$username'";

 $result = $conn->query($sql);

 if ($result->num_rows == 1) {
     $row = $result->fetch_assoc();

     if (password_verify($password, $row['password'])) {
         echo "Hi " . $row['firstname'] . " " . $row['lastname'];
        echo "<br>You have successfully logged in.";

        $_SESSION['loggedin'] = true;
        $_SESSION['userno'] = $row['userno'];
     } else {
         echo "Password not recognised";
     }
 } else {
     echo "Your username or password is incorrect";
}

$conn->close();

 ?>

<?php require 'footer.php'; ?>