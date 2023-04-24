<?php

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
// Redirect to the login page if the user is not logged in
header('Location: ./login.php');
exit;

} elseif (!isset($_SESSION['adminLogged_In']) && $_SESSION['adminLogged_In'] == false) {
header('location: ./login.php');
}

?>