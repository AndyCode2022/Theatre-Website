<!-- PHP saving data for users on website -->
<?php session_start(); ?>

<!-- Setting the cookie name and value -->
<?php
$cookie_name = "user";
$cookie_value = "Theatre";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
// Cookie is set to expire after 30 days
?>

<!-- Setting the cookie up on the website -->
<?php
setcookie("test_cookie", "test", time() + 3600, '/');
?>

<!-- Code to detemine whether the cookie is set on the website or not -->
<?php
if (!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    // echo "Cookie '" . $cookie_name . "' is set!<br>";
    // echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

<?php
if (count($_COOKIE) > 0) {
    // echo "Cookies are enabled.";
} else {
    echo "Cookies are disabled.";
}
?>

<!-- HTML DOCUMENT WITH DATA -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theatre</title>
    <link rel="stylesheet" href="styles/style.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar for navigating through the website -->
    <!-- Make a bootstrap 5 navbar to allow dark mode to be compatible -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Theatre</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="indexUser.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="microBlogUser.php">MicroBlog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registerUser.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="updateUser.php">Change Your Details</a>
                    </li>
                </ul>
            </div>
            <div class="button1">
                <button onclick="functionDark()">Dark Mode</button>
             <?php require '../serverFiles/logout.php'; ?>
                <form method="post" action="logout.php">
                    <button type="submit" name="logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <script src="JavaScript/app.js"></script>