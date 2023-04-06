<?php
// Finds the comments in the MySQL database
include 'serverFiles/dbconnect.php';
$sql = "SELECT * FROM comments";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($body = mysqli_fetch_assoc($result)) {
        // Displays the comments on the page
        echo '<div class="comment">';
        echo '<p>' . $body['body'] . '</p>';
        echo '<p>Posted by user ' . $body['userno'] . ' on ' . $body['date'] . '</p>';

        echo '<form method="post" action="editComment.php">';
        echo '<form method="post" action="deleteComment.php">';
        echo '<input type="hidden" name="comment_id" value="' . $body['userno'] . '">';
        echo '<input type="text" name="comment_text" value="' . $body['body'] . '">';
        echo '<input type="submit" value="Edit">';
        echo '<input type="submit" value="delete">';
        echo '</form>';

        echo '</div>';
    }
} else {
    echo 'No comments yet';
}
?>

<!-- Checks for comment & date and posts it on the microblog page -->
<?php
if (isset($comment['comment']) && isset($comment['date'])) {
echo '<p>' . $comment['comment'] . '</p>';
echo '<p>Posted on ' . $comment['date'] . '</p>';
} else {
echo 'Error: Comment or date not found.';
}
?>