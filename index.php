<?php require 'includes/header.php' ?>

<style>
    /* Dialogue box */

    /* The Modal (background) */

    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<!-- Script to show the user has successfully logged in -->
<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && !isset($_SESSION['messageShown'])) {
    echo '<div class="alert alert-primary" role="alert">' .
        $_SESSION['message'] = "You have successfully logged in, " . $_SESSION['username'] . "!" . '</div>';
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



<button onclick="displayDate()">The time is?</button>
<p id="demo"></p>

<!-- references -->
<!-- https://www.w3schools.com/js/js_events.asp -->


<script>
    // Dialogue Box

    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Some text in the Modal..</p>
    </div>
</div>

<!-- references -->
<!-- https://www.w3schools.com/howto/howto_css_modals.asp -->


<div class="contactInfo">
    <h2 class="contactHeading">Contact information</h2>
    <address>
        Moray St<br>
        Elgin<br>
        IV30 1JJ<br>
    </address>
</div>

<input type="text" onchange="changeHandler()">

<!-- Button event -->

<button onclick="myFunction()">Click me</button>

<!-- references -->
<!-- https://www.w3schools.com/jsref/event_onclick.asp -->

<?php require 'includes/footer.php' ?>

<!-- references -->
<!-- https://www.pxfuel.com/en/search?q=Movie+Poster -->
<!-- https://www.wallpaperflare.com/red-cinema-chair-empty-theater-seats-with-dim-light-interior-wallpaper-wjpdu -->