<?php
// Update the comment in the database
require 'dbconnect.php';
$commentID = $_POST['commentID'];
$commentText = $_POST['commentText'];
$sql = "UPDATE comments SET commentText='$commentText' WHERE commentID='$commentID'";
mysqli_query($conn, $sql);

// Redirect the user back to the comments page
header('Location: ../microBlog.php');
exit();
?>

<!-- references -->
<!-- https://www.youtube.com/watch?v=kWOuUkLtQZw&ab_channel=DaniKrossing -->