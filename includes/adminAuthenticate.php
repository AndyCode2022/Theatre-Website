<?php
// Finds the comments in the MySQL database
session_start();
// require ('checklogin.php');
require ('dbconnect.php');

// Checks if user is an admin and redirects to admin microblog page if true
$isAdmin = (isset($_SESSION['isAdmin']));
$stmt = $conn->prepare("SELECT * FROM users where userno = ?");
$stmt->bind_param("i", $_SESSION['userno']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if ($row['isAdmin'] == 1) {
        header('location: ../admin/microBlogAdmin.php');
    } else {
        header('location: microBlog.php');
    }
}

$conn->close();

?>