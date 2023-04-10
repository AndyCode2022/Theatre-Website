<?php
// Update the comment in the database
require 'dbconnect.php';
$commentno = $_POST['commentno'];
$body = $_POST['body'];
$sql = "UPDATE comments SET body='$body' WHERE userno='$commentno'";
mysqli_query($conn, $sql);

// Redirect the user back to the comments page
header('Location: ../microBlog.php');
exit();
?>