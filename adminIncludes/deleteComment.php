<?php
session_start();
function commentDelete() {

$userno = $_SESSION['userno'];

// Gets the ID of the comment to be deleted
$commentno = $_POST['commentno'];

// Query the database to get the userno of the comment owner
$query = "SELECT commentno FROM comments WHERE commentno = $commentno";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$comment_owner = $row['userno'];

// Check if the logged in user matches the comment owner
if ($userno == $comment_owner) {

    // Delete the comment from the database
    $query = "DELETE FROM comments WHERE commentno = $commentno";
    mysqli_query($conn, $query);

    // Redirect the user to the posts page
    header("Location: ../admin/microBlogAdmin.php");
} else {

    // Display an error message
    echo "You do not have permission to delete this comment.";
 }
}

commentDelete();

?>

<!-- references -->
<!-- https://www.youtube.com/watch?v=kWOuUkLtQZw&ab_channel=DaniKrossing -->