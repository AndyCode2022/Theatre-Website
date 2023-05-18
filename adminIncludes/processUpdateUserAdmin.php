<?php
session_start();

require '../includes/dbconnect.php';
// include_once("../includes/authenticate.php");

$userno = $_POST['userno'];

$sql = "SELECT * FROM users WHERE userno = $userno";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
} else {
    echo "Unable to retrieve user info.";
}

$userno = $_SESSION['userno'];

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "UPDATE users SET firstname = '$firstname' , lastname = '$lastname' ,
        email = '$email' , username = '$username' , 
        password = '$password'
        WHERE userno = $userno ";

if ($conn->query($sql) == true) {
    echo "<p>Thanks your info has been updated.</p> <a href='../admin/indexAdmin.php'";
} else {
    echo "Sorry something went wrong.";
}

$conn->close();

?>