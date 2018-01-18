<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Onboarding</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Vendor JS -->
        <script src="../../static/js/jquery.min.js"></script>
        <script src="../../static/js/bootstrap.min.js"></script>

        <!-- App JS -->
        <script src="../../static/js/homepage.js"></script>

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="../../static/css/bootstrap.css">

        <!-- App CSS -->
        <link rel="stylesheet" href="../../static/css/homepage.css" type="text/css">

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

            <h1><br /></h1>

            <div style="text-align:center;">
                <h1>Onboarding Process</h1>
                <br>
                <p>Thank you for signing up to Durham University's Volunteering Project.
                <br>
                With this account you can organize and track your volunteering activities.</p>
                <br>
            </div>
            <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4" <?php if ($active !== "enter_details") { echo "style='opacity: 0.5; pointer-events: none;'"; } ?>>
                    <div class="card h-100">
                        <div class="card-header">
                            <h4>Step 1</h4>
                        </div>
                        <div class="card-body">
                            <h5>Personal Details</h5>
                            <p class="card-text">Enter or change your personal information.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <a href="enter_details"><li class="list-group-item"><?php if ($active == "enter_details") { echo "&rarr; "; } ?> Enter your details</li></a>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 mb-4" <?php if ($active !== "nominate_manager") { echo "style='opacity: 0.5; pointer-events: none;'"; } ?>>
                    <div class="card h-100">
                        <div class="card-header">
                            <h4>Step 2</h4>
                        </div>
                        <div class="card-body">
                            <h5>Your Manager</h5>
                            <p class="card-text">Your manager gives you permission to use a specified time during working hours for volunteering.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <a href=""><li class="list-group-item"><?php if ($active == "nominate_manager") { echo "&rarr; "; } ?>Nominate a manager</li></a>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 mb-4" <?php if ($active !== "get_started") { echo "style='opacity: 0.5; pointer-events: none;'"; } ?>>
                    <div class="card h-100">
                        <div class="card-header">
                            <h4>Step 3</h4>
                        </div>
                        <div class="card-body">
                            <h5>Get Started</h5>
                            <p class="card-text">Go to your personal homepage to start organizing and tracking your volunteering activities.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <a href=""><li class="list-group-item"><?php if ($active == "get_started") { echo "&rarr; "; } ?>Go to app</li></a>
                        </ul>
                    </div>
                </div>
            </div>
            </div>

            <!-- FOOTER -->
            <br>

            <div style="background:white">
                <footer class="container text-center">
                    <h4><br /></h4>
                    <h1>We'd love to hear from you</h1>
                    <h4><br /></h4>
                    <p><b>Staff Volunteering & Outreach Team</b></p>
                    <a href="mailto:community.engagement@durham.ac.uk">
                        <img style="margin:20px;" src="../../src/images/mail.png" width="30px">
                    </a>
                    <a href="https://www.facebook.com/SVODurham/">
                        <img style="margin:20px;" src="../../src/images/FB-f-Logo.png" width="30px">
                    </a>
                    <a href="tel:0191 334 2199">
                        <img style="margin:20px;" src="../../src/images/telephone.png" width="30px">
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
