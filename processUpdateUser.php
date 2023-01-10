<?php

require 'header.php';

?>

<?php

require "checkLogin.php";
require "dbconnect.php";

$customerno = $_SESSION['customerno'];

$email = $_POST['email'];

$sql = "UPDATE customers SET email = '$email'
        WHERE customerno = $customerno ";

if ($conn->query($sql) == true) {
    echo "<p>Thanks your info has been updated.</p>";
} else {
    echo "Sorry something went wrong.";
}

$conn->close();

?>

<?php

require 'footer.php';

?>