<?php

function showComments() {
    // $sql = "SELECT * FROM comments";
    // $result = $conn->query($sql);
    // while ($commentText = $result->fetch_assoc()){
        if (!empty($commentText)) {
    echo '<p>' . $commentText['commentText'] . '</p>
            <div> ' . $commentText["date_created"] . '</div>';
        }
   }
// }
?>