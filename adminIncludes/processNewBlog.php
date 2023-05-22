<?php
require '../includes/dbconnect.php';
// handle posting messages

if (isset($_POST['submit'])) {


    $postID = $_POST['postID'];
    $userno = $_POST['userno'];
    $title = $_POST['title'];
    $postText = $_POST['postText'];
    $date_created = $_POST['date_created'];

    // insert message data into the database
    $query = "INSERT INTO posts (postID, userno, title, postText, date_created) 
    VALUES ('$postID', '$userno', '$title', '$postText', '$date_created')";
    mysqli_query($conn, $query);
}

mysqli_close($conn);

header('Location: ../admin/microBlogAdmin.php');

?>