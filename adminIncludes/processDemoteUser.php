<?php
session_start();

require '../includes/dbconnect.php';

// Connect to the database
// $conn = mysqli_connect("localhost", "username", "password", "database");

// Retrieves userno for account promotion
$userno = $_SESSION['userno'];

// Updates user account to admin role
$isAdmin = false;

// Update the user's role in the database
$sql = "UPDATE users SET isAdmin = '$isAdmin' WHERE userno = $userno";
mysqli_query($conn, $sql);

header("Location: ../admin/microBlogAdmin.php");

// Close the database connection
mysqli_close($conn);

?>