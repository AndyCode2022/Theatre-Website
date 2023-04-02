<?php
// Submit the comments to the database
require './serverFiles/dbconnect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userno = $_POST['userno'];
    $postID = $_POST['postID'];
    $commentno = $_POST['commentno'];
    $body = $_POST['body'];
    $sql = "INSERT INTO comments (userno, postID, commentno, body) VALUES ('$userno', '$postID', '$commentNo', '$body', NOW())";
    mysqli_query($conn, $sql);
}

// Close the database connection
mysqli_close($conn);
?>