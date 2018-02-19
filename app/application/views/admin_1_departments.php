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

                    <!-- Departments Div -->
                    <div id="departments">
                        <h1>Departments</h1>

                        <div id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <p class="mb-0 alignleft">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Accounting
                                        </a>
                                    </p>
                                    <p class="mb-0 alignright">
                                            10 volunteers
                                    </p>
                                </div>
                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="card-block">
                                        <div id="textboxOne">
                                            <p class="alignleft">Registered volunteers<br />Department members<br /><br /><a href="#">&rarr;  Edit</a></p>
                                            <p class="alignright">10 volunteers<br />100 volunteers</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header" role="tab" id="headingTwo">
                                    <p class="mb-0 alignleft">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Catering
                                        </a>
                                    </p>
                                    <p class="mb-0 alignright">
                                        10 volunteers
                                    </p>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="card-block">
                                        <div id="textboxTwo">
                                            <p class="alignleft">Registered volunteers<br />Department members<br /><br /><a href="#">&rarr;  Edit</a></p>
                                            <p class="alignright">10 volunteers<br />100 volunteers</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header" role="tab" id="headingThree">
                                    <p class="mb-0 alignleft">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Careers
                                        </a>
                                    </p>
                                    <p class="mb-0 alignright">
                                        10 volunteers
                                    </p>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="card-block">
                                        <div id="textboxThree">
                                            <p class="alignleft">Registered volunteers<br />Department members<br /><br /><a href="#">&rarr;  Edit</a></p>
                                            <p class="alignright">10 volunteers<br />100 volunteers</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header" role="tab" id="headingFour">
                                    <p class="mb-0 alignleft">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Estates
                                        </a>
                                    </p>
                                    <p class="mb-0 alignright">
                                        10 volunteers
                                    </p>
                                </div>
                                <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                                    <div class="card-block">
                                        <div id="textboxFour">
                                            <p class="alignleft">Registered volunteers<br />Department members<br /><br /><a href="#">&rarr;  Edit</a></p>
                                            <p class="alignright">10 volunteers<br />100 volunteers</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header" role="tab" id="headingFive">
                                    <p class="mb-0 alignleft">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            Porters
                                        </a>
                                    </p>
                                    <p class="mb-0 alignright">
                                        10 volunteers
                                    </p>
                                </div>
                                <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive">
                                    <div class="card-block">
                                        <div id="textboxFive">
                                            <p class="alignleft">Registered volunteers<br />Department members<br /><br /><a href="#">&rarr;  Edit</a></p>
                                            <p class="alignright">10 volunteers<br />100 volunteers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End of Volunteering Div -->
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

