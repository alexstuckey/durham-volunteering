<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php $this->load->helper('url'); ?>

        <!-- Popper JS -->
        <script src="https://community.dur.ac.uk/alexander.e.stuckey/password/durham-volunteering/app/static/js/popper.min.js"></script>

        <!-- Vendor JS -->
        <script src="<?php echo base_url('/static/js/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('/static/js/bootstrap.min.js'); ?>"></script>
        <script src="https://community.dur.ac.uk/alexander.e.stuckey/password/durham-volunteering/app/static/js/Chart.min.js"></script>

        <!-- App JS -->
        <script src="<?php echo base_url('/static/js/homepage.js'); ?>"></script>

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="<?php echo base_url('/static/css/bootstrap.css'); ?>">

        <!-- App CSS -->
        <link rel="stylesheet" href="<?php echo base_url('/static/css/homepage.css'); ?>" type="text/css">

        <!-- Admin CSS -->
        <link rel="stylesheet" href="admin.css" type="text/css">

    </head>

    <body>
        <!-- Webpage -->
        <div id="page">
            <div id="nav">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
                    <a class="navbar-brand" href="#">Staff Volunteering Programme</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                Admin
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="container-fluid text-center" id="content">
                <div class="row content">
                    <div class="col-sm-3 sidenav" id="leftSide">
                        <div class="card">
                            <div class="card-header">
                                <h5>Functions</h5>
                            </div>
                            <div class="list-group">
                                <a href="admin_1_departments.php" class="list-group-item">Departments</a>
                                <a href="admin_2_notification.php" class="list-group-item">Notification</a>
                                <a href="admin_3_emails.php" class="list-group-item">Email Templates</a>
                                <a href="admin_4_settings.php" class="list-group-item">Settings</a>
                            </div>
                        </div>
                    </div>

                    <div data-spy="scroll" data-target=".navbar" class="col-sm-8 text-left" id="centre">

                        <!-- Emails Div -->
                        <div id="email-templates">
                            <h1>Email Templates</h1>

                            <div id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <p class="mb-0 alignleft">
                                            Volunteer&nbsp;&nbsp;
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Welcome
                                            </a>
                                        </p>
                                    </div>
                                    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="card-block">
                                            <div id="textbox">
                                                <?php echo $welcomeVolunteer ?>
                                                <p class="alignleft"><a href="admin_5_edit_email.php">&rarr;  Edit</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header" role="tab" id="headingTwo">
                                        <p class="mb-0 alignleft">
                                            Volunteer&nbsp;&nbsp;
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Complete Onboarding Process
                                            </a>
                                        </p>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="card-block">
                                            <div id="textbox">
                                                <?php echo $onBoardingComplete ?>
                                                <p class="alignleft"><a href="admin_5_edit_email.php">&rarr;  Edit</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header" role="tab" id="headingTwo">
                                        <p class="mb-0 alignleft">
                                            Volunteer&nbsp;&nbsp;
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Shift Request
                                            </a>
                                        </p>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="card-block">
                                            <div id="textbox">
                                                <?php echo $volunteerShiftRequest ?>
                                                <p class="alignleft"><a href="admin_5_edit_email.php">&rarr;  Edit</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header" role="tab" id="headingTwo">
                                        <p class="mb-0 alignleft">
                                            Volunteer&nbsp;&nbsp;
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Shift Reminder
                                            </a>
                                        </p>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="card-block">
                                            <div id="textbox">
                                                <?php echo $volunteerShiftReminder ?>
                                                <p class="alignleft"><a href="admin_5_edit_email.php">&rarr;  Edit</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header" role="tab" id="headingTwo">
                                        <p class="mb-0 alignleft">
                                            Volunteer&nbsp;&nbsp;
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Shift Approval
                                            </a>
                                        </p>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="card-block">
                                            <div id="textbox">
                                                <?php echo $volunteerShiftApproval ?>
                                                <p class="alignleft"><a href="admin_5_edit_email.php">&rarr;  Edit</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header" role="tab" id="headingTwo">
                                        <p class="mb-0 alignleft">
                                            Volunteer&nbsp;&nbsp;
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Shift Denial
                                            </a>
                                        </p>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="card-block">
                                            <div id="textbox">
                                                <?php echo $volunteerShiftDenial ?>
                                                <p class="alignleft"><a href="admin_5_edit_email.php">&rarr;  Edit</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header" role="tab" id="headingTwo">
                                        <p class="mb-0 alignleft">
                                            Manager&nbsp;&nbsp;&nbsp;
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Nomination
                                            </a>
                                        </p>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="card-block">
                                            <div id="textbox">
                                                <?php echo $managerNomination ?>
                                                <p class="alignleft"><a href="admin_5_edit_email.php">&rarr;  Edit</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header" role="tab" id="headingThree">
                                        <p class="mb-0 alignleft">
                                            Manager&nbsp;&nbsp;&nbsp;
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Shift Request
                                            </a>
                                        </p>
                                    </div>
                                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="card-block">
                                            <div id="textbox">
                                                <?php echo $managerShiftRequest ?>
                                                <p class="alignleft"><a href="admin_5_edit_email.php">&rarr;  Edit</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End of Emails Div -->
                    </div>


                </div>
            </div>




            <!-- FOOTER -->
            <div id="footer">
            <footer class="container text-center">
                <p><br /><b>design & programming</b><br />software engineering team</p>
            </footer>

        </div>
        </div>
    </body>
</html>

