<!-- Cookies -->

<!-- sets cookies for a day with a name of user and cookie value theatre -->
<?php
$cookie_name = "user";
$cookie_value = "Theatre";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>

<!-- Checks for saved cookies then displays them -->
<?php
if (!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

<!-- references -->
<!-- https://brightspace.uhi.ac.uk/d2l/le/content/310944/Home?itemIdentifier=D2L.LE.Content.ContentObject.ModuleCO-2359904 -->