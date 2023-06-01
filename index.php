<?php require 'includes/header.php' ?>

<script src="JavaScript/touchEvent.js"></script>

<script src="JavaScript/windowEvent.js"></script>

<!-- Script to show the user has successfully logged in -->
<!-- Echos the message alert if user is logged in -->
<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && !isset($_SESSION['messageShown'])) {
    echo '<div class="alert alert-primary" role="alert">' .
    $_SESSION['message'] = "You have successfully logged in, " . $_SESSION['username'] . "!" . '</div>';
    $_SESSION['messageShown'] = true;
}
?>

<h1>Welcome To The Theatre Website</h1>

<h2>Whats on!</h2>

<script src="JavaScript/dialogueBox.js"></script>

<!-- image responsiveness for the images on the homepage of Theatre -->
<div class="container text-center">
    <div class="row align-items-start">
        <div class="col">
            <img src="images/jokerImage.jpg" class="rounded" alt="Joker" height="400px">
            <form>
                <input type="button" value="click me!" onclick="Warn();" />
            </form>
        </div>
        <div class="col">
            <img src="images/theatre.jpg" class="rounded" alt="Joker" height="400px">
        </div>
        <div class="col">
            <img src="images/jokerImage.jpg" class="rounded" alt="Joker" height="400px">
        </div>
    </div>
</div>

<script src="JavaScript/buttonEvent.js"></script>
<!-- Displays "Welcome to Theatre Website!" if clicked -->
<button onclick="myFunction()">click me</button>
<p id="buttonEvent"></p>

<!-- references -->
<!-- https://www.w3schools.com/js/js_events.asp -->

<!-- Displays contact information -->
<div class="contactInfo">
    <h2 class="contactHeading">Contact information</h2>
    <address>
        Moray St<br>
        Elgin<br>
        IV30 1JJ<br>
    </address>
</div>

<!-- Touch event -->

<!-- references -->
<!-- http://www.javascriptkit.com/javatutors/touchevents.shtml -->

<!-- Change event -->

<label>
    What movie are you going to see?!
    <select class="joker" name="joker">
        <option value="">Select One ..</option>
        <option value="Joker!">Joker</option>
        <option value="Joker!!">Joker...</option>
        <option value="Joker!!..">....Joker</option>
    </select>
</label>

<div class="result"></div>

<script src="JavaScript/changeEvent.js"></script>

<!-- references -->
<!-- https://developer.mozilla.org/en-US/docs/Web/API/HTMLElement/change_event -->

<!-- keyBoard event -->

<script src="JavaScript/keyBoardEvent.js"></script>

<!-- references -->
<!-- https://www.youtube.com/watch?v=lNJMDTSkNXo -->

<?php require 'includes/footer.php' ?>

<!-- references -->
<!-- https://www.pxfuel.com/en/search?q=Movie+Poster -->
<!-- https://www.wallpaperflare.com/red-cinema-chair-empty-theater-seats-with-dim-light-interior-wallpaper-wjpdu -->