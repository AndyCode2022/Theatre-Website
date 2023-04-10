<?php

session_start();

require 'dbconnect.php';
require 'checkLogin.php';

if (isset($_POST['submit'])) {
    // Checks that the variables postID & userno are set
    if (isset($_SESSION['postID']) && isset($_SESSION['userno'])) {
    $postID = $_SESSION['postID']; 
    $userno = $_SESSION['userno'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    $date_created = date('Y-m-d H:i:s');

    $sql = "INSERT INTO posts (title, body, date_created)
    VALUES ('$title', '$body', '$date_created')";

    if ($stmt->execute()) {
        $postId = $stmt->insert_id;
        echo "New post created successfully. Post ID: $postId";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Error: postID or userno not set";
 }
}

header('Location: microblog.php');
mysqli_close($conn);

?>