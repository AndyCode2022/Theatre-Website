<?php

require_once ('dbconnect.php');
// Submit the comments to the database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userno = isset($_POST['userno']);
    $postID = isset($_POST['postID']);
    $commentNo = isset($_POST['commentno']);
    $body = isset($_POST['body']);
    $sql = "INSERT INTO comments (userno, postID, commentno, body) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'iiis', $userno, $postID, $commentNo, $body);
    mysqli_stmt_execute($stmt);
}
// Close the prepared statement
if (isset($stmt)) {
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);
header('Location: microBlog.php');
?>