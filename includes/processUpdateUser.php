<?php
session_start();
include('checkLogin.php');
include('dbconnect.php');

$userno = $_SESSION['userno'];

// grabs data from theatre for logged in user
$sql = "SELECT * FROM users WHERE userno = $userno";
$result = $conn->query($sql);

// if the user is found then moves onto sql query
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

$sql = "UPDATE users SET firstname = '$firstname' , lastname = '$lastname',
        email = '$email' , username = '$username', 
        password = '$password',
        WHERE userno = $userno ";

if ($conn->query($sql) == true) {
    echo "<p>Thanks your info has been updated.</p>";
} else {
    echo "Sorry something went wrong.";
}

$conn->close();

?>

<!-- references  -->
<!--  -->