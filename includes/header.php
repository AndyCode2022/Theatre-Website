<!--Checks if user is logged in or out -->
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

if(isset($_SESSION['adminlogged_in']))
{
    include './admin/adminIncludes/adminHeaderLoggedIn.php';
} 
else 
{
    include './admin/adminIncludes/adminHeaderLoggedOut.php';
}
?>

