<?php
require '../includes/dbconnect.php';
include 'commentsFunction.php';

// Joins the comments and posts table
$sql = ("SELECT * FROM posts p LEFT JOIN comments c ON p.postID = c.postID_c GROUP BY p.postID ORDER BY p.postID DESC");
$postResult = mysqli_query($conn, $sql);

// references
// https://brightspace.uhi.ac.uk/d2l/le/content/311805/viewContent/2396586/View

// $result = $conn->query($sql);

// While there are posts, display them
if (mysqli_num_rows($postResult) > 0) {
 while ($postText = mysqli_fetch_assoc($postResult)) {
        // if statement makes sure only to display if there is content
        if (!empty($postText)) {
                echo '<div class="container">';
                echo '<h5>' . ($postText["title"]) . '</h5>
        <input name="post_text" value="' . ($postText['postText']) . '">';
                echo '<p>Posted by user ' . ($postText['userno']) . ' on ' . ($postText['date_created']) . '</p>';
                echo '</div>';

                // Edit post functionality
                echo '<div class="container">';
                echo '<form class="edit-form" method="post" action="../adminIncludes/editBlog.php">
            <input type="hidden" name="userno" value="' . ($postText['userno']) . '">
            <input type="hidden" name="postID" value="' . ($postText['postID']) . '">
            <input type="hidden" name="postText" value="' . ($postText['postText']) . '">
            <button type="submit" name="editBlog">Edit</button>
            </form>';
                echo '</div>';

                // Delete post functionality
                echo '<div class="container">';
                echo '<form class="delete-form" method="post" action="../adminIncludes/deleteBlog.php">
            <input type="hidden" name="postID" value="' . $postText['postID'] . '">
            <button type="submit" name="blogDelete">Delete</button>
            </form>';
                echo '</div>';

                //  Comment form for adding comments to posts 
                echo '<div class="container">';
                echo '<form method="post" action="../adminIncludes/processNewCommentAdmin.php">
        
        <input type="hidden" name="userno" value="' . $postText['userno'] . '">
        <input type="hidden" name="date_created" value="' . $postText['date_created'] . '">
        <input type="hidden" name="postID" value="' . $postText['postID'] . '">
                <textarea class="form-control" id="commentText" name="commentText" rows="10">Add your comment to the post</textarea><br><br>
                <input class="form-control" type="submit" value="submit">
                </form>';
                echo '</div>';
        }

        $sql = "SELECT * FROM comments";
        $result = $conn->query($sql);

        while ($commentText = $result->fetch_assoc()) {
                if (!empty($commentText)) {
                        echo '<div class="container">';
                        echo '<input name="comment_text" value="' . ($commentText['commentText']) . '">
            <div> ' . $commentText["date_created_c"] . '</div>';

                        // Edit comment functionality
                        echo '<form class="edit-form" method="post" action="../adminIncludes/editBlog.php">
                    <input type="hidden" name="userno" value="' . $commentText['userno_c'] . '">
                    <input type="hidden" name="commentID" value="' . $commentText['commentID'] . '">
                    <input type="hidden" name="commentText" value="' . $commentText['commentText'] . '">
                    <button type="submit" name="editPost">Edit</button>
                    </form>';

                        // Delete comment functionality
                        echo '<form class="delete-form" method="post" action="../adminIncludes/deleteComment.php">
                    <input type="hidden" name="commentID" class="form-control" value="' . $commentText['commentID'] . '">
                    <button type="submit" name="commentDelete">Delete</button>
                    </form>';
                        echo '</div>';
                }
        }
}
}


// references
// https://www.youtube.com/watch?v=W-FkqWUz0eE