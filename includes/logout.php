<!-- Allows a user to logout when the logout button is pressed -->
<?php
  session_start();
  session_destroy();
  header ("Location: ../index.php");
    ?>