<?php
// Finds the comments in the MySQL database
include 'serverFiles/dbconnect.php';
$sql = "SELECT * FROM posts";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($body = mysqli_fetch_assoc($result)) {
        // Displays the comments on the page
        echo '<div class="container">';
        echo '<div class="comment">';
        echo '<p>' . isset($title['title']) . '</p>';
        echo '<p>Posted by user ' . isset($body['body']) . ' on ' . isset($date['date_created']) . '</p>';
        echo '</div>';

        echo '<div class="container">';
        echo '<form method="post" action="editComment.php">';
        echo '<form method="post" action="deleteComment.php">';
        echo '<input type="hidden" name="comment_id" value="' . isset($userno['userno']) . '">';
        echo '<input type="text" name="comment_text" value="' . $body['body'] . '">';
        echo '<input type="submit" value="Edit">';
        echo '<input type="submit" value="delete">';
        echo '</form>';

        echo '</div>';
        echo '</div>';
    }
} else {
    echo 'No comments yet';
}
?>

<!-- Checks for comment & date and posts it on the microblog page -->
<?php
if (isset($post['post']) && isset($post['date_created'])) {
    echo '<p>' . $post['post'] . '</p>';
    echo '<p>Posted on ' . $post['date_created'] . '</p>';
} else {
    echo '<div class="container">';
    echo 'Error: post or date not found.';
    echo '</div>';
}
?>