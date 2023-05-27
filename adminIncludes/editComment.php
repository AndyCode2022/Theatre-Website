<?php
// Update the comment in the database
// require '../includes/dbconnect.php';

// Redirect the user back to the comments page
function editComments($conn) {
    $commentText = isset($_POST['commentText']);
    $commentID = isset($_POST['commentID']);

    if (isset($_POST['editPost'])) {
        $sql = "UPDATE comments SET commentText='$commentText' WHERE commentID='$commentID'";
        $result = $conn->query($sql);
            // header("Location: ../admin/microBlogAdmin.php");
    }
}

?>

<!-- references -->
<!-- https://www.youtube.com/watch?v=kWOuUkLtQZw&ab_channel=DaniKrossing -->