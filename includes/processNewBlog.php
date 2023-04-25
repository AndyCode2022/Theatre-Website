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
    $postText = $_POST['postText'];
    $date_created = date('Y-m-d H:i:s');

    $sql = "INSERT INTO posts (title, postText, date_created)
    VALUES ('$title', '$postText', '$date_created')";

    if ($stmt->execute()) {
        $postID = $stmt->postID;
        echo "New post created successfully. Post ID: $postID";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Error: postID or userno not set";
 }
}

header('Location: ../microBlog.php');
mysqli_close($conn);

?>