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
                                <a href="<?php echo base_url('index.php/admin/departments'); ?>" class="list-group-item">Departments</a>
                                <a href="<?php echo base_url('index.php/admin/notification'); ?>" class="list-group-item">Notification</a>
                                <a href="<?php echo base_url('index.php/admin/emails'); ?>" class="list-group-item">Email Templates</a>
                                <a href="<?php echo base_url('index.php/admin/settings'); ?>" class="list-group-item">Settings</a>
                                <a href="<?php echo base_url('index.php/admin/edit_email'); ?>" class="list-group-item active">Edit Email</a>
                            </div>
                        </div>
                    </div>
                    <div data-spy="scroll" data-target=".navbar" class="col-sm-8 text-left" id="centre">

                        <!-- Notification Div -->
                        <div id="notification">
                            <h1>Email Templates</h1>


                    <div class="card">
                        <div class="card-block">
                            <form action="admin_3_emails.html" method="post">
                                <div class="form-group">
                                    <input class="form-control" id="exampleInputEmail1" value="Welcome">
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" id="exampleTextarea" rows="12">Welcome to Durham University’s Staff Volunteering Programme!We are thrilled that you’ve decided to participate in our program and we can’t wait for you to join our growing community of people passionate about volunteering.

After completing the onboarding process you’ll be able to access your personal homepage at <?php echo $site_url ?> and start organizing your activities. Get excited :)

Here are a few things you’ll need to do first to complete your onboarding process:
Enter your personal information. Please add your name to your profile. Use the form provided on the website. Add in your name and proceed with the next step.
Nominate a manager. As a member of staff you have the opportunity to volunteer during your working hours. However this is subject to a line-manager approval. Please use the form provided on the website to nominate your manager.

Just follow this link to complete your onboarding process.

If you have any questions along the way, please reach out to us via email,

Volunteering & Outreach Team

                                    </textarea>
                                </div>
                                <div class="alignright">
                                <button class="btn btn-secondary">Cancel</button>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </form>
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

