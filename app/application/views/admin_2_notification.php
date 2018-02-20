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
    <script src="https://community.dur.ac.uk/alexander.e.stuckey/password/durham-volunteering/app/static/js/jquery.min.js"></script>
    <script src="https://community.dur.ac.uk/alexander.e.stuckey/password/durham-volunteering/app/static/js/bootstrap.min.js"></script>
    <script src="https://community.dur.ac.uk/alexander.e.stuckey/password/durham-volunteering/app/static/js/Chart.min.js"></script>

    <!-- App JS -->
    <script src="https://community.dur.ac.uk/alexander.e.stuckey/password/durham-volunteering/app/static/js/homepage.js"></script>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="https://community.dur.ac.uk/alexander.e.stuckey/password/durham-volunteering/app/static/css/bootstrap.css">

    <!-- App CSS -->
    <link rel="stylesheet" href="https://community.dur.ac.uk/alexander.e.stuckey/password/durham-volunteering/app/static/css/homepage.css" type="text/css">

    <!-- Admin CSS -->
    <link rel="stylesheet" href="https://community.dur.ac.uk/alexander.e.stuckey/password/durham-volunteering/app/static/css/admin.css" type="text/css">

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
                                <a href="<?php echo base_url('index.php/admin/departments'); ?>" class="list-group-item">Departments</a>
                                <a href="<?php echo base_url('index.php/admin/notification'); ?>" class="list-group-item active">Notification</a>
                                <a href="<?php echo base_url('index.php/admin/emails'); ?>" class="list-group-item">Email Templates</a>
                                <a href="<?php echo base_url('index.php/admin/settings'); ?>" class="list-group-item">Settings</a>
                                <a href="<?php echo base_url('index.php/admin/edit_email'); ?>" class="list-group-item">Edit Email</a>
                            </div>
                        </div>
                    </div>
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

