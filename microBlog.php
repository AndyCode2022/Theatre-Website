<?php require 'header.php' ?>

<!-- Input form for admins to put announcements onto the microblog page -->
<h2>Microblog</h2>
<form class="Form" id="microblogForm" action="processNewBlog.php" method="post">
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
</div>

<!-- User report form to report users -->
<h2>Report a User</h2>
<div class="container">
    <form class="Form" id="ReportForm" action="processReportForm.php" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Enter Your Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">What is the name of the user
                you have chosen to report and what is the issue?
            </label>
            <textarea class="form-control" id="message" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <input class="form-control" type="submit" name="submit" value="Submit">
        </div>
    </form>
</div>

<?php require 'footer.php' ?>