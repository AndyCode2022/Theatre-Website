   <?php

    if (isset($_POST['logout'])) { // check if the logout button is clicked
        session_destroy(); // destroy all session data
        header("Location: ../login.php"); // redirect to the login page
        exit; // stop script execution
    }
    ?>