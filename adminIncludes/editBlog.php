<?php
// Update the comment in the database
// require '../includes/dbconnect.php';

function editBlogs($conn) {
    $postID = isset($_POST['postID']);
    $postText = isset($_POST['postText']);
    if (isset($_POST['blogEdit'])) {

        $sql = "UPDATE posts SET postText='$postText' WHERE postID='$postID'";
        $result = $conn->query($sql);
        header('location: ../admin/microBlogAdmin.php');
    }
}

?>

<!-- references -->
<!-- https://www.youtube.com/watch?v=kWOuUkLtQZw&ab_channel=DaniKrossing -->