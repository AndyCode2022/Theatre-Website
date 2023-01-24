<?php require 'header.php'; ?>

<?php

require "checkLogin.php";
require "dbconnect.php";

$customerno = $_SESSION['customerNo'];

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

<?php

require 'footer.php';

?>