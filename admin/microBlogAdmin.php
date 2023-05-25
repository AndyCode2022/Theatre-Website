<?php require 'headerAdmin.php' ?>

<!-- FOR ADMINS ONLY -->
<!-- Input form for admins to put announcements onto the microblog page -->
<h2>Microblog</h2>

<div class="mb-3">
    <form action="../adminIncludes/processNewBlog.php" method="post">
        <label for="title" required="true" class="form-label">Announcement</label>
        <input type="title" class="form-control" name="title" id="title" placeholder="enter your title" required="yes">
</div>

<div class="mb-3">
    <label for="postText" class="form-label">What are your thoughts today?</label>
    <textarea class="form-control" placeholder="enter what's on your mind" name="postText" id="postText" rows="10" required="yes"></textarea>
</div>

<!-- Event listener for keyboard event press -->
<!-- <script src="../JavaScript/keyBoardEvent.js"></script> -->

<input type="submit" name="submit" id="submit" class="btn btn-primary">



</form>

<h1>Posts & Comments</h1>

<?php
// Display the posts & comments on the page
require '../adminIncludes/displayBlogsAdmin.php';
?>

<div class="container">
    <!-- Suspension & Promotion of a user form -->
    <div class="adminPanel">
        <h2>Admin Suspend & Promotion Panel</h2>
    </div>
    <?php require '../adminIncludes/userList.php'; ?>
</div>



<?php require 'footerAdmin.php' ?>