<?php require 'includes/header.php' ?>

<!-- Script to show the user has successfully logged in -->
<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && !isset($_SESSION['messageShown'])) {
    echo '<script>';
    echo 'alert("' . $_SESSION['message'] . '");';
    echo '</script>';
    $_SESSION['messageShown'] = true;
}
?>

<h1>Welcome To The Theatre Website</h1>

<div class="container text-center">
    <div class="row align-items-start">
        <div class="col">
            What's on?!
        </div>
        <div class="col">
            One of three columns
        </div>
        <div class="col">
            One of three columns
        </div>
    </div>
</div>

<?php require 'includes/footer.php' ?>