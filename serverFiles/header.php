<!--Checks if user is logged in or out for nav elements-->
<?php 
session_start(); 

if(isset($_SESSION['logged_in']))
{
    include './headerLoggedIn.php';
} 
else 
{
    include './headerLoggedOut.php';
}
?>

