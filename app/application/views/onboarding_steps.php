            <div class="text-center" id="page-heading">
                <h1 class="onboardh1">Onboarding Process</h1>
                <p>Thank you for signing up to Durham University's Volunteering Project. With this account you can organize and track your volunteering activities.</p>
                <?php if ($active == "wait_nominate_manager"): ?>
                <br>
                <p>Currently waiting for confirmation of your nominating manager, <?php echo $manager['email']; ?>.</p>
                <?php endif; ?>
            </div>
            <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4" <?php if ($active !== "enter_details") { echo "style='opacity: 0.5; pointer-events: none;'"; } ?>>
                    <div class="card h-100">
                        <div class="card-header">
                            <h4>Step 1</h4>
                        </div>
                        <div class="card-body">
                            <h5>Personal Details</h5>
                            <p class="card-text">Enter or change your personal information.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <a href="<?php echo site_url('/onboard/enter_details'); ?>"><li class="list-group-item"><?php if ($active == "enter_details") { echo "&rarr; "; } ?> Enter your details</li></a>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 mb-4" <?php if ($active !== "nominate_manager") { echo "style='opacity: 0.5; pointer-events: none;'"; } ?>>
                    <div class="card h-100">
                        <div class="card-header">
                            <h4>Step 2</h4>
                        </div>
                        <div class="card-body">
                            <h5>Your Manager</h5>
                            <p class="card-text">Your manager gives you permission to use a specified time during working hours for volunteering.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <a href="<?php echo site_url('/onboard/enter_nominate_manager'); ?>"><li class="list-group-item"><?php if ($active == "nominate_manager") { echo "&rarr; "; } ?>Nominate a manager</li></a>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 mb-4" <?php if ($active !== "get_started") { echo "style='opacity: 0.5; pointer-events: none;'"; } ?>>
                    <div class="card h-100">
                        <div class="card-header">
                            <h4>Step 3</h4>
                        </div>
                        <div class="card-body">
                            <h5>Get Started</h5>
                            <p class="card-text">Go to your personal homepage to start organizing and tracking your volunteering activities.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <a href="<?php echo site_url('/home'); ?>"><li class="list-group-item"><?php if ($active == "get_started") { echo "&rarr; "; } ?>Go to app</li></a>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
