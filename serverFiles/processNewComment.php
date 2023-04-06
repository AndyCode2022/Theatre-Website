<?php
// Submit the comments to the database
// require 'dbconnect.php';
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     if (isset($userno)) $_POST['userno'];
//     if (isset($postID)) $_POST['postID'];
//     if (isset($commentNo)) $_POST['commentno'];
//     if (isset($body)) $_POST['body'];
//     $sql = "INSERT INTO comments (userno, postID, commentno, body) VALUES (?, ?, ?, ?)";
//     $stmt = mysqli_prepare($conn, $sql);
//     mysqli_stmt_bind_param($stmt, 'iiis', $userno, $postID, $commentNo, $body);
//     mysqli_stmt_execute($stmt);
// }
// header("Location: index.php");

// // Close the prepared statement
// mysqli_stmt_close($stmt);

// // Close the database connection
// mysqli_close($conn);

?>

<?php
require 'dbconnect.php';
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
// Redirect to index.php
header("Location: ../microblog.php");

// Close the prepared statement
if (isset($stmt)) {
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);

?>