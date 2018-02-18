<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Manager Nomination</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?php $this->load->helper('url'); ?>

        <!-- Vendor JS -->
        <script src="<?php echo base_url('/static/js/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('/static/js/bootstrap.min.js'); ?>"></script>
        
        <!-- App JS -->
        <script src="<?php echo base_url('/static/js/homepage.js'); ?>"></script>

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="<?php echo base_url('/static/css/bootstrap.css'); ?>">

        <!-- App CSS -->
        <link rel="stylesheet" href="<?php echo base_url('/static/css/homepage.css'); ?>" type="text/css">

    </head>

    <body>

        <!-- Webpage -->
        <div id="page">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
                <a class="navbar-brand" href="#">Staff Volunteering Programme</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>


            <div class="container-fluid text-center" id="content">
                <div class="row content">
                    <div class="col-sm-3 sidenav" id="leftSide">
                    </div>

                    <div data-spy="scroll" data-target=".navbar" data-offset="70" class="col-sm-6 text-left" id="centre">

                        <!-- Volunteering Div -->
                        <div id="volunteering">
                            <h1>Nominate Your Manager</h1>

                            <?php echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>'); ?>
                            
                            <p>As a member of staff you have the opportunity to volunteer during your working hours. However this is subject to a line-manager approval.<br /><br />Please use the form provided below to nominate your manager. We will send them an email containing links for accepting or rejecting the nomination. If the nomination gets rejected you will be able to nominate someone else.<br /></p>


                            <div class="card">
                                <div class="card-block">
                                    <form action="<?php echo site_url('/onboard/send_nominate_manager'); ?>" method="post">
                                        <div class="form-group">
                                            <label for="inputEmailAddress">Email address</label>
                                            <input type="email" autocomplete="email" class="form-control" name="inputEmailAddress" id="inputEmailAddress" placeholder="Enter email" value="<?php echo set_value('inputEmailAddress'); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="inputComment">Comment</label>
                                            <textarea class="form-control" name="inputComment" id="inputComment" value="<?php echo set_value('inputComment'); ?>" rows="3"></textarea>
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

            <!-- FOOTER -->

            <div id="footer">
                <footer class="container text-center">
                    <h2 id="footer-heading">We'd love to hear from you</h2>
                    <p><b>Staff Volunteering & Outreach Team</b></p>
                    <a href="mailto:community.engagement@durham.ac.uk">
                        <img class="contact_icon" src="<?php echo base_url('/static/images/mail.png'); ?>" width="25px">
                    </a>
                    <a href="https://www.facebook.com/SVODurham/">
                        <img class="contact_icon" src="<?php echo base_url('/static/images/FB-f-Logo.png'); ?>" width="25px">
                    </a>
                    <a href="tel:0191 334 2199">
                        <img class="contact_icon" src="<?php echo base_url('/static/images/telephone.png'); ?>" width="25px">
                    </a>
                </footer>

                <footer class="container text-center">
                    <hr>
                    <p><br /><b>design & programming</b><br />software engineering team</p>
                </footer>

            </div>
        </div>
    </body>
</html>
