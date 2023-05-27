<?php
require '../includes/dbconnect.php';
// handle posting messages

if (isset($_POST['submit'])) {

    $postID = isset($_POST['postID']);
    $userno = isset($_POST['userno']);
    $title = $_POST['title'];
    $postText = $_POST['postText'];
    $date_created = isset($_POST['date_created']);

    // insert message data into the database
    $query = "INSERT INTO posts (postID, userno, title, postText, date_created) 
    VALUES ('$postID', '$userno', '$title', '$postText', '$date_created')";
    if (mysqli_query($conn, $query)) {
        echo 'Message posted';
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }

    echo 'Message posted';
}

mysqli_close($conn);

header('Location: ../admin/microBlogAdmin.php');

?>