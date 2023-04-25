<?php

require 'dbconnect.php';
// Connect to the database
$conn = mysqli_connect("localhost", "username", "password", "database");

// Retrieves userno for account promotion
$userno = $_POST['userno'];

// Updates user account to admin role
$new_role = "admin";

// Update the user's role in the database
$sql = "UPDATE users SET role = '$new_role' WHERE userno = $userno";
mysqli_query($conn, $sql);

// Close the database connection
mysqli_close($conn);

?>