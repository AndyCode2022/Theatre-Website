<?php

require_once ('dbconnect.php');

// Submit the comments to the database
$commentText = isset($_POST['commentText']);

$stmt = $conn->prepare("SELECT userno FROM users WHERE userno = ?");
$stmt->bind_param("s", $commentID);
$stmt->execute();
$result = $stmt->get_result();

$sql = "INSERT INTO comments (commentText) VALUES (?)";
$stmt = mysqli_prepare($conn, $sql);
$stmt->bind_param("s", $commentText);
$stmt->execute();

// Close the prepared statement
if (isset($stmt)) {
    mysqli_stmt_close($stmt);
}

header('Location: ../microBlog.php');

// Close the database connection
mysqli_close($conn);
