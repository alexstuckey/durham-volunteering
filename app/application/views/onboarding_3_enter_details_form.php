<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Personal Details</title>
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
                            <h1 class="onboardh1">Enter Your Details</h1>

                            <?php echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>'); ?>

                            <p>Please provide further information about yourself that will be added to your profile. We will use the name provided for contacting you and interacting with your manager.<br /></p>

                            <div class="card">

                                <div class="card-block">
                                    <form action="<?php echo site_url('/onboard/send_details'); ?>" method="post">

                                        <div class="form-group">
                                            <label for="inputFirstName">First Name</label>
                                            <input type="text" autocomplete="given-name" class="form-control" name="inputFirstName" id="inputFirstName" placeholder="Enter first name" value="<?php list($firstnamesplit)=explode(',', $user['firstnames']); echo set_value('inputLastName', ucwords(strtolower($firstnamesplit))); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="inputLastName">Last Name</label>
                                            <input type="text" autocomplete="family-name" class="form-control" name="inputLastName" id="inputLastName" placeholder="Enter last name" value="<?php echo set_value('inputFirstName', ucwords(strtolower($user['surname']))); ?>">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
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
