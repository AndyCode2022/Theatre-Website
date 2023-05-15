<?php require 'headerAdmin.php' ?>

<!-- Script to show the user has successfully logged in -->
<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && !isset($_SESSION['messageShown'])) {
    echo '<div class="alert alert-primary" role="alert">' .
        $_SESSION['message'] = "You have successfully logged in, " . $username . "!" . '</div>';
    $_SESSION['messageShown'] = true;
}
?>

<h1>Welcome To The Theatre Website</h1>

<h2>Whats on!</h2>

<div class="container text-center">
    <div class="row align-items-start">
        <div class="col">
            <img src="../images/jokerImage.jpg" class="rounded" alt="Joker" height="400px">
        </div>
        <div class="col">
            <img src="../images/theatre.jpg" class="rounded" alt="Theatre" height="400px">
        </div>
        <div class="col">
            <img src="../images/jokerImage.jpg" class="rounded" alt="Joker" height="400px">
        </div>
    </div>
</div>

<?php require 'footerAdmin.php' ?>

<!-- references -->
<!-- https://chat.openai.com/ -->