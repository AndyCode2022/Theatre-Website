<?php

require 'dbconnect.php';
function checkLogin(){
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
// Redirect to the login page if the user is not logged in
header('Location: ./login.php');
exit;
 }
}

?>