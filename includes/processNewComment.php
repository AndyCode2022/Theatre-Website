<?php

require_once ('dbconnect.php');

// Submit the comments to the database
$userno = isset($_POST['userno']);
$commentText = isset($_POST['commentText']);
echo $commentText;

$stmt = $conn->prepare("INSERT INTO comments (userno, commentText) 
VALUES (?, ?)");
$stmt->bind_param("is", $userno, $commentText);
$stmt->execute();

// Close the prepared statement
if (isset($stmt)) {
    mysqli_stmt_close($stmt);
}

header('Location: ../microBlog.php');

// Close the database connection
mysqli_close($conn);

// references
// https://www.youtube.com/watch?v=kWOuUkLtQZw&ab_channel=DaniKrossing