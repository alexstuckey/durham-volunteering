<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Welcome</title>
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
                        <div class="text-center">
                            <h1 class="onboardh1">Welcome!</h1>
                            <h6>You are registering as username <?php echo $cis_username ?>.</h6>
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
