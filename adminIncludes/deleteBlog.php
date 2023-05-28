<?php
// session_start();
require_once '../includes/dbconnect.php';

// Gets the ID of the blog to be deleted
    if (isset($_POST['blogDelete'])) {
        $postID = $_POST['postID'];

        $sql = "DELETE FROM posts WHERE postID = '$postID'";
    if (mysqli_query($conn, $sql)) {
        echo "Record was deleted successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. "
        . mysqli_error($conn);
    }
    mysqli_close($conn);

        // $result = $conn->query($sql);
        header('location: ../admin/microBlogAdmin.php');
 }

?>

<!-- references -->
<!-- https://www.youtube.com/watch?v=kWOuUkLtQZw&ab_channel=DaniKrossing -->