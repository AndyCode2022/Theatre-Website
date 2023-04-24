<?php
// Finds the comments in the MySQL database
include 'dbconnect.php';

$sql = "SELECT * FROM posts";
$postResult = mysqli_query($conn, $sql);

if (mysqli_num_rows($postResult) > 0) {
    while ($postText = mysqli_fetch_assoc($postResult)) {
        // Displays the posts on the page
        echo '<div class="container">
              <div class="card mb-3">
              <div class="card-body">
              <h5 class="card-title">' . htmlspecialchars($postText["title"]) . '</h5>
              <div class="card mb-3">
              <input name="post_text" value="' . $postText['postText'] . '">
              </div>';
        echo '<p class="card-text">Posted by user ' . ($postText['userno']) . ' on ' . date('d-m-Y', strtotime($postText['date_created'])) . '</p>';

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
                echo '<p class="card-text"> ' . htmlspecialchars($comment['comment']) . '</p>
                      </div>
                      <div class="card-footer">
                      <small class="text-muted"> ' . ($comment["date_created"]) . '</small>
                      </div>
                      </div>';
            }
        } else {
            echo 'No comments yet';
        }

        // Comment input for user
        echo '<div class="container">
              <div class="card-body">
              <form method="post" action="processNewComment.php>
              <input type="hidden" name="post_id" value="' . isset($postText['post_ID']) . '">
              <textarea class="form-control" id="comment" name="comment" rows="10" required="yes">Add your comment to the post</textarea><br><br>
              <input class="form-control" type="submit" value="Submit">
            </form>
          </div>
        </div>';
    }
    // Displayed comments with edit functionality
    if (!empty($row) && isset($row['post_ID']))
    $sql = "SELECT * FROM comments WHERE post_ID = " . $postText['post_ID'];
    $commentResult = mysqli_query($conn, $sql);

    if (mysqli_num_rows($commentResult) > 0) {
        while ($comment = mysqli_fetch_assoc($commentResult)) {
            // Edit functionality
            echo '<div class="container">
                  <div class="card-body">
                  <form method="post" action="serverFiles/editComment.php">
                  <input type="hidden" name="comment_id" value="' . ($comment['userno']) . '">';
            if (!empty($row) && isset($row['comment']))
            echo '<input class="form-control" type="text" name="comment_text" value="' . htmlspecialchars($comment['comment']) . '">
                  <input class="form-control" type="submit" value="Edit">
                  </div>
                  </div>';
            // Delete functionality
            echo '<div class="container">
            <form method="post" action="includes/deleteComment.php">
            <input type="hidden" name="comment_id" value="' . isset($userno['userno']) . '">';
            if (!empty($row) && isset($row['body']))
            echo '<input class="form-control" type="text" name="comment_text" value="' . $body['body'] . '">
                  <input class="form-control" type="submit" value="delete">
                  </div>';
        }
    }
    echo '</div>
          </div>
          </div>';
} else {
    echo 'No posts yet';
}



?>