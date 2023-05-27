<?php

// session_start();
// require '../includes/dbconnect.php';



// Gets the ID of the blog to be deleted
function deleteBlogs($conn) {
$userno = $_SESSION['userno'];
if (isset($_POST['blogDelete'])) {

    $sql = "DELETE FROM posts WHERE userno = '$userno'";
    $result = $conn->query($sql);
    header('location: ../admin/microBlogAdmin.php');
 }
}
?>

<!-- references -->
<!-- https://www.youtube.com/watch?v=kWOuUkLtQZw&ab_channel=DaniKrossing -->