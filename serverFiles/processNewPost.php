<?php

require 'dbconnect.php';
$sql = "SELECT * FROM posts ORDER BY date_created DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Title: " . $row["title"] . "<br>";
        echo "Body: " . $row["body"] . "<br>";
        echo "Date Created: " . $row["date_created"] . "<br><br>";
    }
} else {
    echo "No posts found";
}
header("Location: {$_SERVER['HTTP_REFERER']}");
exit;

?>
