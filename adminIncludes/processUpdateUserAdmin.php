<?php
session_start();

require '../includes/dbconnect.php';
// include_once("../includes/authenticate.php");

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

$sql = "SELECT * FROM users WHERE userno = $userno";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
} else {
    echo "Unable to retrieve user info.";
}

$stmt = $conn->prepare("UPDATE users SET firstname = ? , lastname = '$lastname' ,
        email = '$email' , username = '$username' , 
        password = '$password'
        WHERE userno = $userno ");

$stmt->bind_param("", $firstname, "", $lastname, "", $email, "", $username, "",
$password, "");
$stmt->execute();
$result = $stmt->get_result();

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT users (firstname, lastname, email, username, password)
VALUES (?,?,?,?,?)");

$stmt->bind_param("sssss", $firstname, $lastname, $email, $username, $hash);

if ($stmt->execute() == true) {
    echo "<p>Thanks your info has been updated.</p> <a href='../admin/indexAdmin.php'";
} else {
    echo "Sorry something went wrong.";
}

$conn->close();

?>