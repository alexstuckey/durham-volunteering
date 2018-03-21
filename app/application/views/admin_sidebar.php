<div class="col-sm-3 sidenav" id="leftSide">
    <div class="card">
        <div class="card-header">
            <h5>Functions</h5>
        </div>
        <div class="list-group">
            <a href="<?php echo base_url('index.php/admin/departments'); ?>" class="list-group-item<?php if ($active_admin == "departments") { echo " active"; }; ?>">Departments</a>
            <a href="<?php echo base_url('index.php/admin/notification'); ?>" class="list-group-item<?php if ($active_admin == "notification") { echo " active"; }; ?>">Notification</a>
            <a href="<?php echo base_url('index.php/admin/emails'); ?>" class="list-group-item<?php if ($active_admin == "email_templates") { echo " active"; }; ?>">Email Templates</a>
            <a href="<?php echo base_url('index.php/admin/settings'); ?>" class="list-group-item<?php if ($active_admin == "settings") { echo " active"; }; ?>">Settings</a>
            <a href="<?php echo base_url('index.php/admin/edit_email'); ?>" class="list-group-item<?php if ($active_admin == "edit_email") { echo " active"; }; ?>">Edit Email</a>
        </div>
    </div>
</div>