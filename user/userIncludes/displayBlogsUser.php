<?php
// Finds the comments in the MySQL database
require_once ('../serverFiles/dbconnect.php');
$sql = "SELECT * FROM posts";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($body = mysqli_fetch_assoc($result)) {
        // Displays the posts on the page
        echo '<div class="container">';
        echo '<div class="post">';
        echo '<p>' . isset($body['title']) . '</p>';
        echo '<p>Posted by user ' . isset($body['body']) . ' on ' . isset($body['date_created']) . '</p>';
        // Displayed comments
        echo '<div class="card-body">';
        echo '<p class="card-text"> ' . isset($row['comment']) . '</p>';
        echo '</div>';
        echo '<div class="card-footer">';
        echo '<small class="text-muted"> ' . isset($row['date_created']) . '</small>';
        echo '</div>';
        echo '</div>';
        // Edit functionality
        echo '<div class="container">';
        echo '<form method="post" action="userIncludes/editCommentUser.php">';
        echo '<input type="hidden" name="comment_id" value="' . isset($userno['userno']) . '">';
        echo '<input type="text" name="comment_text" value="' . $body['body'] . '">';
        echo '<input type="submit" value="Edit">';
        echo '</form>';
        echo '</div>';
        // Delete functionality
        echo '<div class="container">';
        echo '<form method="post" action="userIncludes/deleteCommentUser.php">';
        echo '<input type="hidden" name="comment_id" value="' . isset($userno['userno']) . '">';
        echo '<input type="text" name="comment_text" value="' . $body['body'] . '">';
        echo '<input type="submit" value="delete">';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo 'No comments yet';
}
?>

<!-- Checks for comment & date and posts it on the microblog page -->
<?php
if (isset($post['post']) && isset($date_created['date_created'])) {
    echo '<p>' . $post['post'] . '</p>';
    echo '<p>Posted on ' . $date_created['date_created'] . '</p>';
} else {
    echo '<div class="container">';
    echo 'Error: post or date not found.';
    echo '</div>';
}
?>