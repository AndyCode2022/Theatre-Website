<?php
session_start();
require "dbconnect.php";
// add a user status for admin and users

$username = $_POST['username'];
$password = $_POST['password'];
$userStatus = isset($_POST['userStatus']) ? $_POST['userStatus'] : null;
$suspended = $_SESSION['suspended'];

$alertClass = "alert-danger";
$message = "Your username or password is incorrect";

if (!empty($username) && !empty($password)) {
    $stmt = $conn->prepare("SELECT userno, firstname, lastname, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Suspension control structure 
        if (!$row['suspended'] && password_verify($password, $row['password'])) {
            // User is not suspended and the password is correct
            // Set session variables and redirect to appropriate page
        } else {
            // User is suspended or the password is incorrect
            // Show error message and do not set session variables
        }
    } else {
         // handle case where query returns 0 or multiple rows
    // show error message and do not set session variables
    }
        if (isset($_POST['userStatus']) && ($_POST['userStatus'] == 0 || $_POST['userStatus'] == 1)) {
            $userStatus = $_POST['userStatus'];
        }
        if (password_verify($password, $row['password'])) {
            if ($userStatus == 1) {
                $message = "Hi " . $row['firstname'] . " " . $row['lastname'] . ". You have successfully logged in as an admin.";
                echo 'Click here to go to the admin screen' . " " . "<a href=../admin/indexAdmin.php>Admin</a>";
            } else {
                $message = "Hi " . $row['firstname'] . " " . $row['lastname'] . ". You have successfully logged in.";
                echo 'Click here to go to the home screen' . " " . "<a href=../user/indexUser.php>Home</a>";
            }
            $_SESSION['loggedin'] = true;
            $_SESSION['userno'] = $row['userno'];
            $_SESSION['userStatus'] = $userStatus;
            $alertClass = "alert-success";
        } else {
            $message = "Password not recognised";
        }

    $stmt->close();
  }
$conn->close();
?>

<!-- echos out if the password is wrong or not -->
<div class="container my-3">
    <div class="alert <?php echo $alertClass; ?> alert-dismissible fade show" role="alert">
        <?php echo $message; ?>
        <a href="../login.php">back</a>
        <br>
    </div>
</div>