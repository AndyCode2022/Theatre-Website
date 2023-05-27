<?php

// session_start();
// require '../includes/dbconnect.php';



// Gets the ID of the comment to be deleted
function deleteComments($conn) {
    $userno = $_SESSION['userno'];
if (isset($_POST['commentDelete'])) {
    $sql = "DELETE FROM comments WHERE userno = '$userno'";
    $conn->query($sql);
    header('location: ../admin/microBlogAdmin.php');
 }
}

?>

<!-- references -->
<!-- https://www.youtube.com/watch?v=kWOuUkLtQZw&ab_channel=DaniKrossing -->