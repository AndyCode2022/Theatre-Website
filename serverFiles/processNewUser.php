<?php

require "dbconnect.php";

$firstname = isset($_POST['firstname']);
$lastname = isset($_POST['lastname']);
$email = isset($_POST['email']);
$username = isset($_POST['username']);
$password = isset($_POST['password']);
$confirmPassword = isset($_POST['confirmPassword']);

$isValid = true;
//form validation to be added
if ($password != $confirmPassword) {
    $isValid = false;
    echo "<p>passwords do not match</p>";
}

if (strlen($password) < 8){
    $isValid = false;
    echo "<p>Password is too short.";
}

$stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<p>Sorry that username is taken. Please try a different username.</p>";
    $isValid = false;
}

if ($isValid == true) {

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, username, password, confirmPassword)
VALUES (?,?,?,?,?,?)");

    $stmt->bind_param("ssssss", $firstname, $lastname, $email, $username, $hash, $hash);

    if ($stmt->execute() == true) {
        $lastId = $stmt->insert_id;
        echo "<p>New record has been created. Your user ID is: $lastId </p>";
    } else {
        echo "Something went wrong";
    }
} else {
    echo "<p>Problem validating the form. Please try again <a href='../user/registerUser.php'>click here</a></p>";
}

$conn->close();

?>