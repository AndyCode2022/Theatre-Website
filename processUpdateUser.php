<?php

require 'dbconnect.php';
require 'checkLogin.php';
require 'updateUser.php';

$customerno = $_SESSION['userno'];

$sql = "SELECT * FROM theatre WHERE userno = $userno";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
} else {
    echo "Unable to retrieve user info.";
}

$conn->close();

?>

<?php

require "checkLogin.php";
require "dbconnect.php";

$customerno = $_SESSION['userNo'];

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$town = $_POST['town'];
$postcode = $_POST['postcode'];
$email = $_POST['email'];

$sql = "UPDATE users SET firstname = '$firstname' , lastname = '$lastname' , address = '$address' ,
        town = '$town' , postcode = '$postcode' , email = '$email'
        WHERE userno = $userno ";

if ($conn->query($sql) == true) {
    echo "<p>Thanks your info has been updated.</p>";
} else {
    echo "Sorry something went wrong.";
}

$conn->close();

?>

<?php require 'footer.php'; ?>