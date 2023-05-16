<?php
session_start();
require '../includes/dbconnect.php';

$userno = $_SESSION['userno'];

// Gets the ID of the comment to be deleted
$commentID = isset($_POST['commentID']);

// Query the database to get the userno of the comment owner
$query = "SELECT commentID FROM comments WHERE commentID = $commentID";
$result = mysqli_query($conn, $query);

if ($result) {
$row = mysqli_fetch_assoc($result);
$comment_owner = $row['userno'];

// Check if the logged in user matches the comment owner
if ($userno == $comment_owner) {

    // Delete the comment from the database
    $query = "DELETE FROM comments WHERE commentID = $commentID";
    mysqli_query($conn, $query);

    // Redirect the user to the posts page
    header("Location: ../admin/microBlogAdmin.php");
} else {

echo "You do not have admin privileges to be able to delete this comment";
}
  print_r($userno);
    // Display an error message
    echo "You do not have permission to delete this comment.";
 }

?>

<!-- references -->
<!-- https://www.youtube.com/watch?v=kWOuUkLtQZw&ab_channel=DaniKrossing -->