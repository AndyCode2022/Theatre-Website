<?php

session_start();
require '../includes/dbconnect.php';

$userno = $_SESSION['userno'];

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

if (strlen($password) < 8) {
    $isValid = false;
    echo "<p>Password is too short.";
}

// grabs data from theatre for logged in user
$sql = "SELECT * FROM users WHERE userno = $userno";
$result = $conn->query($sql);

// if the user is found then moves onto sql query
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
// Hashes the password
$hash = password_hash($password, PASSWORD_DEFAULT);
// prepare statement to secure user information when passed to the database
$stmt = $conn->prepare("UPDATE users SET firstname = ? , lastname = ? , email = ? , username = ? , password = ? WHERE userno = ?");
$stmt->bind_param("sssssi", $firstname, $lastname, $email, $username, $hash, $userno);
$stmt->execute();

    echo "<p>Thanks your info has been updated.</p> <a href='../admin/indexAdmin.php'</a>";
} else {
    echo "Sorry something went wrong.";
}

$conn->close();

?>