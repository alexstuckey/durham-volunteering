


            <div class="container-fluid text-center" id="content">
                <div class="row content" style="min-height:100%;border: 1px solid green;">
                    <div class="col-sm-3 sidenav" id="leftSide">
                    </div>

                    <div data-spy="scroll" data-target=".navbar" data-offset="70" class="col-sm-6 text-left" id="centre">

                        <!-- Volunteering Div -->
                        <div class="text-center">
                            <h1 class="onboardh1">Welcome!</h1>
                            <h6>You are registering as username <?php echo $user['username'] ?>.</h6>
                            <p><br />Thank you for signing up to Durham University's Volunteering Project. With this account you can organize and track your volunteering activities.</p>
                            <a href="<?php echo site_url('/onboard/steps_details'); ?>">
                                <button class="btn btn-primary">Continue</button>
                            </a>
                        </div>
                        <!-- End if Volunteering Div -->

                    </div>

                    <div class="col-sm-3 sidenav" id="rightSide">
                    </div>
                </div>
            </div>
