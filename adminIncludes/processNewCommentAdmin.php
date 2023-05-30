<?php
require '../includes/dbconnect.php';

// handle posting messages
// if (isset($_POST['submit'])) {

    $postID = $_POST['postID'];
    $userno = $_POST['userno'];
    $commentText = $_POST['commentText'];
    // $date_created = $_POST['date_created'];

    // insert message data into the database
    $query = "INSERT INTO comments (postID_c, userno_c, commentText) 
    VALUES ('$postID', '$userno', '$commentText')";

    if (mysqli_query($conn, $query)) {
        echo 'Message posted';
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
// }

mysqli_close($conn);
header('Location: ../admin/microBlogAdmin.php');
