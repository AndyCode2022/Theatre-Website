<?php

session_start();

// authenticate user information on login
$username = $_POST['username'];
$password = $_POST['password'];
// Function that runs the authentication for user logins
authenticateUser($username, $password);
function authenticateUser($username, $password){
require 'dbconnect.php';
$stmt = $conn->prepare("SELECT userno, username, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {

    $row = $result->fetch_assoc();

    //verifies password
    if (password_verify($password, $row['password'])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['userno'] = $row['userno'];

        if ($_SESSION['logged_in'] = true) {

            header("Location: ../index.php");

            exit();
        }
    }
    //error handling for when password is incorrect
    else {
        echo "Password not recognised";
    }
    //error handling for when username or password is incorrect
} else {
    echo "Your username or password is incorrect";
}

$conn->close();
}

?>