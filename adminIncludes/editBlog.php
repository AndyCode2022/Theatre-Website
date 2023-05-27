<?php
// Update the comment in the database
require_once '../includes/dbconnect.php';
// function editBlogs($conn) {
    
    if (isset($_POST['blogEdit'])) {
        $postID = $_POST['postID'];
        $postText = $_POST['postText'];

        $sql = "UPDATE posts SET postText='$postText' WHERE postID='$postID'";
        $result = $conn->query($sql);
        header('location: ../admin/microBlogAdmin.php');
        exit;
    }

?>

<!-- references -->
<!-- https://www.youtube.com/watch?v=kWOuUkLtQZw&ab_channel=DaniKrossing -->