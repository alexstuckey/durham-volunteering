<!-- Notifications Div -->
<div id="notifications">
    <h1>Notifications</h1>

    <!-- Auto-Generated notification dismiss/archive popups appear in this div -->
    <div id="notification_popups">

    </div>

    <!-- For each notification in the database -->
    <?php foreach ($notifications as $notification): ?>
    <div class="card">
        <div class="card-header">
            <h4><?php echo $notification['title']; ?></h4>
        </div>
        <div class="card-block">
            <p class="card-text">Y<?php echo $notification['blurb']; ?></p>
            <form action="" method="POST">
                <button type="submit" value="<?php echo $notification['notificationID']; ?>" class="btn btn-outline-warning dismiss">Dismiss</button>
            </form>
        </div>
        <div class="card-footer">
            <small class="text-muted">Last updated: <?php echo $notification['time']; ?></small>
        </div>
    </div>
    <?php endforeach; ?>


<!-- End of Notifications Div -->

