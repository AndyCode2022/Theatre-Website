<?php

require_once '../includes/dbconnect.php';

// Submit the comments to the database
$userno = isset($_POST['userno']);
$commentText = $_POST['commentText'];


$stmt = $conn->prepare("SELECT userno FROM users WHERE userno = ?");
$stmt->bind_param("s", $commentID);
$stmt->execute();
$result = $stmt->get_result();

$stmt = $conn->prepare("INSERT INTO comments (userno, commentText) 
VALUES (?, ?)");
$stmt->bind_param("ss", $userno, $commentText);
$stmt->execute();

// Close the prepared statement
if (isset($stmt)) {
    mysqli_stmt_close($stmt);
}

header('Location: ../admin/microBlogAdmin.php');

// Close the database connection
mysqli_close($conn);

?>