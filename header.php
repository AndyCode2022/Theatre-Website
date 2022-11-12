<?php session_start(); ?>

<?php
$cookie_name = "user";
$cookie_value = "Andrew Webster";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>

<!DOCTYPE html>
<html lang="en">

<?php
setcookie("test_cookie", "test", time() + 3600, '/');
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theatre</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="app.js"></script>
</head>

<body>

    <?php
    if (count($_COOKIE) > 0) {
        echo "Cookies are enabled.";
    } else {
        echo "Cookies are disabled.";
    }
    ?>

    <nav class="Nav">
        <ul>
            <li>Home</li>
            <li>About</li>
            <li>MicroBlog</li>
        </ul>
    </nav>

    <div class="parent">
        <div class="div1"> </div>
        <div class="div2"> </div>
        <div class="div3"> </div>
    </div>

    <h1>Welcome to the theatre website</h1>

    <?php
    if (!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_name];
    }
    ?>

</body>