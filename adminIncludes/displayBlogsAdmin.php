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
              <div class="card-commentText">
              <h5 class="card-title">' . htmlspecialchars($postText["title"]) . '</h5>
              <div class="card mb-3">
              <input name="post_text" value="' . $postText['postText'] . '">
              </div>
              </div>';
        echo '<p class="card-text">Posted by user ' . ($postText['userno']) . ' on ' . date('d-m-Y', strtotime($postText['date_created'])) . '</p>';

        // print_r($postText);
        if (!empty($row) && isset($row['postID']))
            $postID = $_POST['postID'];
        if (!empty($row) && isset($row['postID']))
            $sql = "SELECT * FROM comments WHERE postID = " . $postID['postID'];
        $commentResult = mysqli_query($conn, $sql);

        if (mysqli_num_rows($commentResult) > 0) {
            while ($comment = mysqli_fetch_assoc($commentResult)) {
                // Displayed comments
                echo '<div class="card-commentText">';
                if (!empty($row) && isset($row['comment']))
                echo '<p class="card-text"> ' . htmlspecialchars($comment['comment']) . '</p>
                      </div>
                      <div class="card-footer">
                      <small class="text-muted"> ' . ($comment["date_created"]) . '</small>
                      </div>';
            }
        } else {
            echo 'No comments yet';
        }

        // Comment input for user
        echo '<div class="container">
              <div class="card-commentText">
              <form method="post" action="includes/processNewComment.php">
              <input type="hidden" name="post_id" value="' . isset($postText['postID']) . '">
              <textarea class="form-control" id="comment" name="comment" rows="10" required="yes">Add your comment to the post</textarea><br><br>
              <input class="form-control" type="submit" value="Submit">
            </form>
          </div>
        </div>';
    }
    
    // Displayed comments with edit functionality
    if (!empty($row) && isset($row['postID']))
    $sql = "SELECT * FROM comments WHERE postID = " . $postText['postID'];
    $commentResult = mysqli_query($conn, $sql);

    if (mysqli_num_rows($commentResult) > 0) {
        while ($commentText = mysqli_fetch_assoc($commentResult)) {
            // Edit functionality
            echo '<div class="container">
                  <div class="card-commentText">
                  <form method="post" action="includes/editComment.php">
                  <input type="hidden" name="commentno" value="' . ($comment['userno']) . '">';
            if (!empty($row) && isset($row['comment']))
            echo '<input class="form-control" type="text" name="comment_text" value="' . htmlspecialchars($comment['comment']) . '">
                  <input class="form-control" type="submit" value="Edit">
                  </div>
                  </div>';
            // Delete functionality
            echo '<div class="container">
            <form method="post" action="includes/deleteComment.php">
            <input type="hidden" name="commentno" value="' . isset($commentText['userno']) . '">';
            if (!empty($row) && isset($row['commentText']))
            echo '<input class="form-control" type="text" name="comment_text" value="' . $commentText['commentText'] . '">
                  <input class="form-control" type="submit" value="delete">
                  </div>';
        }
    }
    echo '</div>
          </div>';
} else {
    echo 'No posts yet';
}



?>