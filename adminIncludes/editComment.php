<?php
// Update the comment in the database
require '../includes/dbconnect.php';
$commentID = $_POST['commentID'];
$commentText = $_POST['commentText'];
$sql = "UPDATE comments SET commentText='$commentText' WHERE commentID='$commentID'";
mysqli_query($conn, $sql);

// Redirect the user back to the comments page
header("Location: ../admin/microBlogAdmin.php");
exit();
?>

<!-- references -->
<!-- https://www.youtube.com/watch?v=kWOuUkLtQZw&ab_channel=DaniKrossing -->