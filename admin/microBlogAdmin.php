<?php require '../includes/header.php' ?>

<?php require '../includes/checklogin.php' ?>
<!-- FOR ADMINS ONLY -->
<!-- Input form for admins to put announcements onto the microblog page -->
<h2>Microblog</h2>
<form class="Form" id="microblogForm" action="../adminIncludes/processNewBlog.php" method="post">
    <div class="mb-3">
        <label for="title" class="form-label">Announcement</label>
        <input type="text" class="form-control" id="title" name="title" required="yes"><br>
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">What are your thoughts today?</label>
        <textarea class="form-control" id="body" name="body" rows="10" required="yes"></textarea><br><br>
    </div>
    <div class="mb-3">
        <input class="form-control" type="submit" name="submit" value="Submit">
    </div>
</form>

<?php
// Display the posts & comments on the page
require '../includes/displayBlogs.php';
?>

<div class="container">
    <!-- Suspension & Promotion of a user form -->
    <h2>Admin Suspend & Promotion Panel</h2>
    <?php require '../adminIncludes/userList.php'; ?>
</div>

<?php require '../includes/footer.php' ?>