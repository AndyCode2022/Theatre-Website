<?php

session_start();

require 'dbconnect.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit;
}

if (isset($_POST['submit'])) {
    $postID = $_SESSION['postID'];
    $userno = $_SESSION['userno'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    $date_created = date('Y-m-d H:i:s');

    $sql = "INSERT INTO posts (title, body, date_created)
    VALUES ('$title', '$body', '$date_created')";

    if (mysqli_query($conn, $sql)) {
        echo "New post created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>