<!-- Checks if user is logged in or out for footer -->
<?php

if (isset($_SESSION['logged_in'])) {
    include './footerLoggedInAdmin.php';
} else {
    include './footerLoggedOut.php';
}

?>