<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


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
                                <a href="<?php echo base_url('index.php/admin/notification'); ?>" class="list-group-item">Notification</a>
                                <a href="<?php echo base_url('index.php/admin/emails'); ?>" class="list-group-item">Email Templates</a>
                                <a href="<?php echo base_url('index.php/admin/settings'); ?>" class="list-group-item active">Settings</a>
                                <a href="<?php echo base_url('index.php/admin/edit_email'); ?>" class="list-group-item">Edit Email</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-8 text-left" id="centre">

                        <!-- Settings Div -->
                        <div id="settings">
                            <h1>Settings</h1>
                            <div class="card">
                                <div class="card-block">
                                    <form action="admin_4_settings.html" method="post">
                                        <h4>Email Settings</h4>
                                        <br>
                                        <form class="form-inline">
                                            <div class="form-group">
                                                <p class="form-control-static"><b>Admin CIS usernames</b></p>
                                                <input style="width:100px; margin-right:10px;" type="text" class="form-control alignleft" id="inputPassword2" value="abcd11">
                                                <button type="submit" class="btn btn-secondary">Rename</button>
                                            </div>
                                            <div class="form-group">
                                                <input style="width:100px; margin-right:10px;" type="text" class="form-control alignleft" id="inputPassword2" value="abcd11">
                                                <button type="submit" class="btn btn-secondary">Rename</button>
                                            </div>
                                        </form>
                                        <br>
                                        <h4>Edit Footer</h4>
                                        <br>
                                        <div class="card">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="" checked>
                                                            <b>Phone number</b>
                                                            <br />
                                                            Include a contact phone number in the footer.
                                                            <label class="form-group row" style="margin-top:5px;margin-left:0;">
                                                                    <input class="form-control alignleft" style="width:200px; margin-right:10px;" type="tel" value="1-(555)-555-5555" id="tel-input">
                                                                    <button type="submit" class="btn btn-secondary">Change</button>
                                                            </label>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="" checked>
                                                            <b>Email address</b>
                                                            <br />
                                                            Include email address in the footer.
                                                            <label class="form-group row" style="margin-top:5px;margin-left:0;">
                                                                <input class="form-control alignleft" style="width:200px; margin-right:10px;" type="email" value="admin@durham.ac.uk" id="email-input">
                                                                <button type="submit" class="btn btn-secondary">Change</button>
                                                            </label>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="" checked>
                                                            <b>Facebook page</b>
                                                            <br />
                                                            Include the link to Facebook page in the footer.
                                                            <label class="form-group row" style="margin-top:5px;margin-left:0;">
                                                                <input class="form-control alignleft" style="width:200px; margin-right:10px;" type="url" value="facebook.com" id="facebook-input">
                                                                <button type="submit" class="btn btn-secondary">Change</button>
                                                            </label>
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <br />
                                        <h4>Danger Zone</h4>
                                        <br />
                                        <div class="card" style="border-color:#D73A49;">
                                            <div class="card-block danger">
                                                <b>Temporarily disable the system</b>
                                                <br />
                                                This may be used for maintenance.
                                                <a href="admin_6_maintenance.html"><button type="button" class="btn btn-outline-danger alignright">Disable the system</button></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
    </body>
</html>

