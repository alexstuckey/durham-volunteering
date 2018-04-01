<div class="container-fluid text-center" id="content">
    <div class="row justify-content-center">
        <div class="col-md-6" id="centre">

            <div class="text-center">
                <h1 class="onboardh1">Nominations</h1>
                <h6>The following users have nominated you as their manager.</h6>
                <br>
                
                <?php foreach ($manageesNominated as $managee): ?>
                <div class="card text-left">
                    <div class="card-header">
                        <h4><?php echo $managee['firstName'] . ' ' . $managee['secondName']; ?></h4>
                    </div>
                    <div class="card-block">
                        <p class="card-text"><?php echo $managee['firstName'] . ' ' . $managee['secondName']; ?> has requested that you become their manager.</p>

                        <a href="<?php echo site_url('/respond/nomination/confirm/' . $managee['cisID']); ?>" class="btn btn-success">Confirm</a>
                        <a href="<?php echo site_url('/respond/nomination/deny/' . $managee['cisID']); ?>" class="btn btn-secondary">Deny</a>

                    </div>

                </div>
                <?php endforeach; ?>

            </div>

        </div>
    </div>
</div>
