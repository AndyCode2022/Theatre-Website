<?php

session_start();
$user_id = $_SESSION['user_id'];

// Get the ID of the post to be deleted
$post_id = $_GET['post_id'];

// Query the database to get the user ID of the post owner
$query = "SELECT user_id FROM posts WHERE post_id = $post_id";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$post_owner = $row['user_id'];

// Check if the logged in user matches the post owner
if ($user_id == $post_owner) {
// Delete the post from the database
$query = "DELETE FROM posts WHERE post_id = $post_id";
mysqli_query($connection, $query);
// Redirect the user to the posts page
header("Location: ../microBlog.php");
} else {
// Display an error message
echo "You do not have permission to delete this post.";
}

?>