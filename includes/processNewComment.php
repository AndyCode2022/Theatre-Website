<?php

require_once ('dbconnect.php');

// Submit the comments to the database
$postID = $_POST['postID'];
$userno = $_POST['userno'];
$commentText = $_POST['commentText'];

// insert message data into the database
$query = "INSERT INTO comments (postID_c, userno_c, commentText) 
    VALUES ('$postID', '$userno', '$commentText')";

// Close the prepared statement
if (mysqli_query($conn, $query)) {
    echo 'Message posted';
} else {
    echo 'Error: ' . mysqli_error($conn);
}

header('Location: ../microBlog.php');

// Close the database connection
mysqli_close($conn);

// references
// https://www.youtube.com/watch?v=kWOuUkLtQZw&ab_channel=DaniKrossing