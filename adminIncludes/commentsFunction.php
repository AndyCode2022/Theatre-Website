<?php

function showComments($conn) {
    $sql = "SELECT * FROM comments";
    $result = $conn->query($sql);
    while ($commentText = $result->fetch_assoc()){

    echo '<p>' . $commentText['commentText'] . '</p>
            <div> ' . $commentText["date_created"] . '</div>';
 }
}

?>