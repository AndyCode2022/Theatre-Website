<?php
// Finds the comments in the MySQL database
include 'serverFiles/dbconnect.php';

$sql = "SELECT * FROM posts";
$postResult = mysqli_query($conn, $sql);

if (mysqli_num_rows($postResult) > 0) {
    while ($postText = mysqli_fetch_assoc($postResult)) {
        // Displays the posts on the page
        echo '<div class="container">';
        echo '<div class="card mb-3">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . htmlspecialchars($postText['title']) . '</h5>';
        echo '<div class="card mb-3">';
        echo '<input name="post_text" value="' . $postText['postText'] . '">';
        echo '</div>';
        echo '<p class="card-text">Posted by user ' . ($postText['postText']) . ' on ' . date('d-m-Y', strtotime($postText['date_created'])) . '</p>';

        // print_r($postText);
        if (!empty($row) && isset($row['post_ID']))
            $post_ID = $_POST['post_ID'];
        if (!empty($row) && isset($row['post_ID']))
            $sql = "SELECT * FROM comments WHERE post_ID = " . $post_ID['post_ID'];
        $commentResult = mysqli_query($conn, $sql);

        if (mysqli_num_rows($commentResult) > 0) {
            while ($comment = mysqli_fetch_assoc($commentResult)) {
                // Displayed comments
                echo '<div class="card-body">';
                if (!empty($row) && isset($row['comment']))
                    echo '<p class="card-text"> ' . htmlspecialchars($comment['comment']) . '</p>';
                echo '</div>';
                echo '<div class="card-footer">';
                echo '<small class="text-muted"> ' . ($comment['date_created']) . '</small>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo 'No comments yet';
        }

        // Comment input for user
        echo '<div class="container">';
        echo '<div class="card-body">';
        echo '<form method="post" action="processNewComment.php>';
        echo '<input type="hidden" name="post_id" value="' . isset($postText['post_ID']) . '">';
        echo '<textarea class="form-control" id="comment" name="comment" rows="10" required="yes">Add your comment to the post</textarea><br><br>';
        echo '<input class="form-control" type="submit" value="Submit">';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
    // Displayed comments with edit functionality
    if (!empty($row) && isset($row['post_ID']))
    $sql = "SELECT * FROM comments WHERE post_ID = " . $postText['post_ID'];
    $commentResult = mysqli_query($conn, $sql);

    if (mysqli_num_rows($commentResult) > 0) {
        while ($comment = mysqli_fetch_assoc($commentResult)) {
            echo '<div class="container">';
            echo '<div class="card-body">';
            echo '<form method="post" action="serverFiles/editComment.php">';
            echo '<input type="hidden" name="comment_id" value="' . ($comment['userno']) . '">';
            if (!empty($row) && isset($row['comment']))
            echo '<input class="form-control" type="text" name="comment_text" value="' . htmlspecialchars($comment['comment']) . '">';
            echo '<input class="form-control" type="submit" value="Edit">';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            // Delete functionality
            echo '<div class="container">';
            echo '<form method="post" action="serverFiles/deleteComment.php">';
            echo '<input type="hidden" name="comment_id" value="' . isset($userno['userno']) . '">';
            if (!empty($row) && isset($row['body']))
            echo '<input class="form-control" type="text" name="comment_text" value="' . $body['body'] . '">';
            echo '<input class="form-control" type="submit" value="delete">';
            echo '</div>';
        }
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
} else {
    echo 'No posts yet';
}



?>