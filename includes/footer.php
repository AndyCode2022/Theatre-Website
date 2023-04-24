<!-- Checks if user is logged in or out for footer -->
<?php

if (isset($_SESSION['logged_in'])) {
    include './footerLoggedIn.php';
} else {
    include './footerLoggedOut.php';
}

?>