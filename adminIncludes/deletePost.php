<?php

session_start();
 $userno = $_SESSION['userno'];

// Get the ID of the post to be deleted
$postID = $_POST['postID'];

// Query the database to get the user ID of the post owner
$query = "SELECT postID FROM posts WHERE postID = $postID";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$post_owner = $row['postID'];

// Check if the logged in user matches the post owner
if ( $userno == $postID) {
// Delete the post from the database
$query = "DELETE FROM posts WHERE postID = $postID";
mysqli_query($conn, $query);
// Redirect the user to the posts page
header("Location: ../microBlog.php");
} else {
// Display an error message
echo "You do not have permission to delete this post.";
}

?>