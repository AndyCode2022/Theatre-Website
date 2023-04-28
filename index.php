<?php require 'includes/header.php' ?>

<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>
    <script>
        alert("<?php echo $_SESSION['message']; ?>");
    </script>
<?php endif; ?>

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