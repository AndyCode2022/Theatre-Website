<?php

require 'dbconnect.php'; 
function deleteComments($conn)
{
    if (isset($_POST['commentDelete'])) {
        $postID = $_POST['postID'];

        $sql = "DELETE FROM comments WHERE postID = '$postID'";
        $result = $conn->query($sql);
        header("location: microblog.php");
        exit();
    }
}

?>