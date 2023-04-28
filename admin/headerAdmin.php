<!--Checks if user is logged in or out -->
<?php 
session_start(); 

if(isset($_SESSION['logged_in'])) { 
    include './headerLoggedInAdmin.php';
} else {
    include './headerLoggedOutAdmin.php';
}


?>

