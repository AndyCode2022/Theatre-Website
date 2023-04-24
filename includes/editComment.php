<?php
// Update the comment in the database
require 'dbconnect.php';
$commentno = $_POST['commentno'];
$commentText = $_POST['commentText'];
$sql = "UPDATE comments SET commentText='$commentText' WHERE userno='$commentno'";
mysqli_query($conn, $sql);

// Redirect the user back to the comments page
echo "Redirecting...";
header('Location: ../microBlog.php');
exit();
?>