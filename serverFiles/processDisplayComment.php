<?php
// Finds the comments in the MySQL database
include 'serverFiles/dbconnect.php';
$sql = "SELECT * FROM comments";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($comment = mysqli_fetch_assoc($result)) {
        // Displays the comments on the page
        echo '<div class="comment">';
        echo '<p>' . $body['body'] . '</p>';
        echo '<p>Posted by user ' . $body['userno'] . ' on ' . $body['date'] . '</p>';
        echo '</div>';
    }
} else {
    echo 'No comments yet';
}
?>

<?php
if (isset($comment['comment']) && isset($comment['date'])) {
echo '<p>' . $comment['comment'] . '</p>';
echo '<p>Posted on ' . $comment['date'] . '</p>';
} else {
echo 'Error: Comment or date not found.';
}
?>