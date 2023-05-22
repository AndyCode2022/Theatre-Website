<?php

require_once '../includes/dbconnect.php';

// Submit the comments to the database
$commentID = $_POST['commentID'];
$postID = $_POST['postID'];
$userno = $_POST['userno'];
$commentText = $_POST['commentText'];
$date_created = $_POST['date_created'];


$stmt = $conn->prepare("SELECT userno FROM users WHERE userno = ?");
$stmt->bind_param("s", $commentID);
$stmt->execute();
$result = $stmt->get_result();

$stmt = $conn->prepare("INSERT INTO comments (commentID, postID, userno, commentText, date_created) 
VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("iiiss", $commentID, $postID, $userno, $commentText, $date_created);
$stmt->execute();

// Close the prepared statement
if (isset($stmt)) {
    mysqli_stmt_close($stmt);
}

header('Location: ../admin/microBlogAdmin.php');

// Close the database connection
mysqli_close($conn);

?>