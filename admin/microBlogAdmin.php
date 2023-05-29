<?php require 'headerAdmin.php' ?>

<!-- FOR ADMINS ONLY -->
<!-- Input form for admins to put announcements onto the microblog page -->
<h2>Microblog</h2>



<div class="container">

    <form class="form" id="postBlog" action="../adminIncludes/processNewBlog.php" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Enter the title for your post</label>
            <input type="title" class="form-control" name="title" id="title" placeholder="title" required="true">
        </div>

        <div class="mb-3">
            <label for="postText" class="form-label">What would you like to post?</label>
            <textarea class="form-control" placeholder="insert your post information" name="postText" id="postText" rows="3"></textarea>
        </div>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>
<script src="../JavaScript/submitEvent.js"></script>


<!-- class="btn btn-primary" -->

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