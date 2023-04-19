<?php

session_start();
$user_id = $_SESSION['user_id'];

// Get the ID of the comment to be deleted
$comment_id = $_GET['comment_id'];

// Query the database to get the user ID of the comment owner
$query = "SELECT user_id FROM comments WHERE comment_id = $comment_id";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$comment_owner = $row['user_id'];

// Check if the logged in user matches the comment owner
if ($user_id == $comment_owner) {
// Delete the comment from the database
$query = "DELETE FROM comments WHERE comment_id = $comment_id";
mysqli_query($connection, $query);
// Redirect the user to the posts page
header("Location: ../microBlog.php");
} else {
// Display an error message
echo "You do not have permission to delete this comment.";
}
