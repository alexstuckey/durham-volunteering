

            <div class="container-fluid text-center" id="content">
                <div class="row content">
                    <div class="col-sm-3 sidenav" id="leftSide">
                    </div>

                    <div data-spy="scroll" data-target=".navbar" data-offset="70" class="col-sm-6 text-left" id="centre">

                        <!-- Volunteering Div -->
                        <div id="volunteering">
                            <h1>Nominate Your Manager</h1>

                            <?php echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>'); ?>
                            
                            <p>As a member of staff you have the opportunity to volunteer during your working hours. However this is subject to a line-manager approval.<br /><br />Please use the form provided below to nominate your manager. We will send them an email containing links for accepting or rejecting the nomination. If the nomination gets rejected you will be able to nominate someone else.</p>

                            <div class="card">
                                <div class="card-block">
                                    <form action="<?php echo site_url('/onboard/send_nominate_manager'); ?>" method="post">
                                        <div class="form-group">
                                            <label for="inputEmailAddress">Email address</label>
                                            <input type="email" autocomplete="email" class="form-control" name="inputEmailAddress" id="inputEmailAddress" placeholder="Enter email" pattern=".+@dur(ham)?.ac.uk" value="<?php echo set_value('inputEmailAddress'); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="inputComment">Comment</label>
                                            <textarea class="form-control" name="inputComment" id="inputComment" rows="3"><?php echo set_value('inputComment'); ?></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End of Volunteering Div -->

                    </div>

                    <div class="col-sm-3 sidenav" id="rightSide">
                    </div>
                </div>
            </div>

