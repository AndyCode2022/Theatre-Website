<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require '../includes/dbconnect.php';

$userno = $_SESSION['userno'];

// Gets the ID of the comment to be deleted
$commentID = isset($_POST['commentID']);

// Query the database to get the userno of the comment owner
$query = "SELECT commentID FROM comments WHERE commentID = $commentID";
$result = mysqli_query($conn, $query);

$row = null;

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Do something with the fetched data
    } else {
        // No rows returned
        // Handle the case when the comment doesn't exist
    }
}

    if ($row) {
        // Delete the comment from the database
        $query = "DELETE FROM comments WHERE commentID = $commentID";
        mysqli_query($conn, $query);
        // Redirect the user to the posts page
        if ($isAdmin === 1) {
        header("Location: ../admin/microBlogAdmin.php");
    } else {
    echo "You do not have permission to delete this comment.";
    }
}

?>

<!-- references -->
<!-- https://www.youtube.com/watch?v=kWOuUkLtQZw&ab_channel=DaniKrossing -->