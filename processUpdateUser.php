<?php
session_start();

include_once('dbconnect.php');
include_once("authenticate.php");
include_once('updateUser.php');

$customerno = $_SESSION['userno'];

$sql = "SELECT * FROM theatre WHERE userno = $userno";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
} else {
    echo "Unable to retrieve user info.";
}

$customerno = $_SESSION['userNo'];

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$town = $_POST['town'];
$postcode = $_POST['postcode'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

$sql = "UPDATE users SET firstname = '$firstname' , lastname = '$lastname' , address = '$address' ,
        town = '$town' , postcode = '$postcode' , email = '$email' , username = '$username' , 
        password = '$password' , confirmPassword = '$confirmPassword'
        WHERE userno = $userno ";

if ($conn->query($sql) == true) {
    echo "<p>Thanks your info has been updated.</p>";
} else {
    echo "Sorry something went wrong.";
}

$conn->close();

?>