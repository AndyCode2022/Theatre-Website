<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
?>

<?php

// session_start();
require '../includes/dbconnect.php';



// Gets the ID of the comment to be deleted

    
if (isset($_POST['commentDelete'])) {
    $commentID = $_POST['commentID'];
    // Delete comment if comment with comment ID is found
    $sql = "DELETE FROM comments WHERE commentID = '$commentID'";
    if (mysqli_query($conn, $sql)) {
        echo "Record was deleted successfully.";
    } else {
        echo "ERROR: Could not execute $sql. "
        . mysqli_error($conn);
    }
    mysqli_close($conn);
    header('location: ../admin/microBlogAdmin.php');
 }


?>

<!-- references -->
<!-- https://www.youtube.com/watch?v=kWOuUkLtQZw&ab_channel=DaniKrossing -->