<?php
require '../includes/dbconnect.php';
include 'commentsFunction.php';

// Joins the comments and posts table
$sql = $conn->prepare("SELECT * FROM posts p LEFT JOIN comments c ON p.postID = c.postID_c GROUP BY p.postID ORDER BY p.postID DESC");
// $result = $conn->query($sql);
$sql->execute();
$result=$sql->get_result();
if ($result->num_rows>0)

// While there are posts, display them
while ($postText=$result->fetch_assoc()) {
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
        //   }
        // $sql = "SELECT * FROM comments";
        // $result = $conn->query($sql);

        // while ($commentText = $result->fetch_assoc()) {
        // if (!empty($commentText)) {
        // if (!empty($postText)) {
                // while ($postText['postID'] >= $postText['postID_c'])
                foreach ($result as $comment) {
                        echo '<p>' . $postText['commentText'] . '</p>
                        <div> ' . $postText["date_created_c"] . '</div>';
                }
        
                // Edit comment functionality
                echo '<form class="edit-form" method="post" action="../adminIncludes/editBlog.php">
                    <input type="hidden" name="userno" value="' . $postText['userno_c'] . '">
                    <input type="hidden" name="commentID" value="' . $postText['commentID'] . '">
                    <input type="hidden" name="commentText" value="' . $postText['commentText'] . '">
                    <button type="submit" name="editPost">Edit</button>
                    </form>';

                // Delete comment functionality
                echo '<form class="delete-form" method="post" action="../adminIncludes/deleteComment.php">
                    <input type="hidden" name="commentText" class="form-control" type="submit" value="' . $postText['commentText'] . '">
                    <button type="submit" name="deletePost">Delete</button>
                    </form>';
 }
// }
// }


// references
// https://www.youtube.com/watch?v=W-FkqWUz0eE