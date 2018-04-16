<div data-spy="scroll" data-target=".navbar" class="col-sm-8 text-left" id="centre">

    <!-- Notification Div -->
    <div id="notification">
        <h1>Broadcast a Notification</h1>
        
        <div class="card">
            <div class="card-block">
                <form action="<?php echo site_url('/admin/broadcast'); ?>" method="post" id="broadcastForm">

                    <div class="form-group">
                        <label for="broadcastNotification">Use this form to write a notification. After submitting it will be sent to every user of the system.</label>
                        <textarea class="form-control" id="broadcastNotification" name="broadcastNotification" rows="5"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
</div>
