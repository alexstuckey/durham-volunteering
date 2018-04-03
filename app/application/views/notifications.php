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

            <form method="POST" action="<?php echo site_url('/notifications/delete'); ?>" >
                <input type="hidden" value="<?php echo $notification['notificationID']; ?>" name="notificationDismiss" id="notificationDismiss">
                <button type="submit" class="btn btn-outline-warning dismiss">Dismiss</button>
            </form>

        </div>
        <div class="card-footer">
            <small class="text-muted">Date: <?php echo $notification['time']; ?></small>
        </div>
    </div>
    <?php endforeach; ?>

</div>
<!-- End of Notifications Div -->
