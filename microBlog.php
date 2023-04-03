<?php require 'header.php' ?>

<!-- Input form for admins to put announcements onto the microblog page -->
<h2>Microblog</h2>
<form class="Form" id="microblogForm" action="serverFiles/processNewBlog.php" method="post">
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

<!-- announcements/blogs are display on the website by the admin -->
<h2>Posts</h2>
<div class="container">
    <div class="card">
        <div class="card-header">
            <?php echo isset($row['title']); ?>
        </div>
        <div class="card-body">
            <p class="card-text"><?php echo isset($row['body']); ?></p>
        </div>
        <div class="card-footer">
            <small class="text-muted"><?php echo isset($row['date_created']); ?></small>
        </div>
    </div>
    <button type="button" class="btn btn-primary">edit</button>
    <button type="button" class="btn btn-primary">delete</button>
    <button type="button" class="btn btn-primary">ban a user</button>
    <?php
    // Display the comments on the page
    require './serverFiles/processDisplayComment.php';
    ?>
</div>

<div class="container">
    <h2 class="mt-4">Comments</h2>
    <form method="post" action="serverFiles/processNewComment.php">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
        </div>
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <button type="submit" class="btn btn-primary">Add Comment</button>
    </form>
</div>


<?php
// Submit the comments to the database
require './serverFiles/processNewComment.php';
?>

<?php require 'footer.php' ?>