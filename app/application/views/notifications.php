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
            <p class="card-text"><?php echo $notification['blurb']; ?></p>
            <form action="<?php echo site_url('/notifications/delete'); ?>" method="POST">
                <button type="submit" value="<?php echo $notification['notificationID']; ?>" class="btn btn-outline-warning dismiss" name="notificationDismiss">Dismiss</button>
            </form>
        </div>
        <div class="card-footer">
            <small class="text-muted">Date: <?php echo $notification['time']; ?></small>
        </div>
    </div>
    <?php endforeach; ?>

</div>
<!-- End of Notifications Div -->

