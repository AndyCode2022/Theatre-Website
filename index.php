<?php require 'includes/header.php' ?>

<!-- Script to show the user has successfully logged in -->
<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && !isset($_SESSION['messageShown'])) {
    // echo '<script>';
    echo 'alert("' . $_SESSION['message'] . '");';
    // echo '</script>';
    $_SESSION['messageShown'] = true;
}
?>

<h1>Welcome To The Theatre Website</h1>

<h2>Whats on!</h2>

<div class="container text-center">
    <div class="row align-items-start">
        <div class="col">
            <img src="images/jokerImage.jpg" class="rounded" alt="Joker" height="400px">
        </div>
        <div class="col">
            <img src="images/theatre.jpg" class="rounded" alt="Joker" height="400px">
        </div>
        <div class="col">
            <img src="images/jokerImage.jpg" class="rounded" alt="Joker" height="400px">
        </div>
    </div>
</div>

<?php require 'includes/footer.php' ?>

<!-- references -->
<!-- https://www.pxfuel.com/en/search?q=Movie+Poster -->