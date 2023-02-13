<?php
require 'dbconnect.php';
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $date_created = date('Y-m-d H:i:s');
    $userno = $_SESSION['userno'];

    $sql = "INSERT INTO posts (title, body, date_created)
    VALUES ('$title', '$body', '$date_created')";

    if (mysqli_query($conn, $sql)) {
        echo "New post created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
