<?php
// Finds the comments in the MySQL database
include '../includes/dbconnect.php';

$sql = "SELECT * FROM posts";
$postResult = mysqli_query($conn, $sql);

if (mysqli_num_rows($postResult) > 0) {
    while ($postText = mysqli_fetch_assoc($postResult)) {
        // Displays the posts on the page
        echo '<div class="container">
              <div class="card mb-3">
              <div class="card-commentText">
              <h5 class="card-title">' . ($postText["title"]) . '</h5>
              <div class="card mb-3">
              <input name="post_text" value="' . $postText['postText'] . '">
              </div>
              </div>';
        echo '<p class="card-text">Posted by user ' . ($postText['userno']) . ' on ' . date('d-m-Y', strtotime($postText['date_created'])) . '</p>';

        
//   print_r($postText);
$postID = isset($_POST['postID']) ? $_POST['postID'] : 0;

if (!empty($commentResult) && isset($commentResult['postID'])) {
    $sql = "SELECT * FROM comments WHERE postID = " . $postID;
    $commentResult = mysqli_query($conn, $sql);

        // Displays comments
        if (mysqli_num_rows($commentResult) > 0) {
            while ($comment = mysqli_fetch_assoc($commentResult)) {
                // Displayed comments
                echo '<div class="card-commentText">';
                if (!empty($row) && isset($row['comment']))
                    echo '<p class="card-text"> ' . ($comment['comment']) . '</p>
                      </div>
                      <div class="card-footer">
                      <div class="text-muted"> ' . ($comment["date_created"]) . '</small>
                      </div>';
            }
        } else {
            echo 'No comments yet';
        }

        // Comment input for user
        echo '<div class="container">
              <div class="card-commentText">
              <form method="post" action="../adminIncludes/processNewCommentAdmin.php">
              <input type="hidden" name="post_id" value="' . isset($postText['postID']) . '">
              <div class="form-group">
              <textarea class="form-control" id="commentText" name="commentText" rows="10" required="yes">Add your comment to the post</textarea><br><br>
              <input class="form-control" type="submit" value="Submit">
              </div>
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
                  <form method="post" action="../adminIncludes/editComment.php">
                  <input type="hidden" name="commentno" value="' . ($commentText['userno']) . '">
                  <input class="form-control" type="submit" value="Edit">
                  </div>
                  </div>';

            // Delete functionality
            echo '<div class="container">
            <form method="post" action="../adminIncludes/deleteComment.php">
            <input type="hidden" name="commentno" value="' . isset($commentText['userno']) . '">
            <input class="form-control" type="submit" value="delete">
            </div>';
        }
    }
    echo '</div>
          </div>';
}
} else {
    echo 'No posts yet';
}



?>

<!-- delete comments -->
<form method="post" action="includes/deleteComment.php">
    <button>delete</button>
    <input type="hidden" name="commentno" value="' . isset($commentText['userno']) . '">
</form>';