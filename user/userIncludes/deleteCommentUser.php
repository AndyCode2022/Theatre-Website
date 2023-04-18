<?php
// function deleteComments($conn)
// {
    if (isset($_POST['commentDelete'])) {
        $postID = $_POST['postID'];

        $sql = "DELETE FROM comments WHERE postID = '$postID'";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../microBlogUser.php");
            exit();
        } else {
            echo "Error deleting comment: " . $conn->error;
            // or log the error to a file
            // error_log("Error deleting comment: " . $conn->error, 0);
        }
    }
// }


?>