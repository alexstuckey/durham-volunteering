<div data-spy="scroll" data-target=".navbar" class="col-sm-8 text-left" id="centre">

    <!-- Notification Div -->
    <div id="notification">
        <h1>Broadcast a Notification</h1>
        
        <div class="card">
            <div class="card-block">
                <form action="<?php echo site_url('/onboard/send_nominate_manager'); ?>" method="post">


                    <div class="form-group">
                        <label for="exampleTextarea">Use this form to write a notification. After submitting it will be sent to every user of the system.</label>
                        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
</div>
