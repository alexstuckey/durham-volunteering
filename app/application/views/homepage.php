<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?php $this->load->helper('url'); ?>
        
        <!-- Popper JS -->
        <script src="<?php echo base_url('/static/js/popper.min.js'); ?>"></script>
        
        <!-- Vendor JS -->
        <script src="<?php echo base_url('/static/js/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('/static/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('/static/js/Chart.min.js'); ?>"></script>
        
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
            <div id="nav">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
                    <a class="navbar-brand" href="#">Staff Volunteering Programme</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#notifications">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#volunteering">Volunteering</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#managerShiftResponse">Respond to Applications</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#otherSection">Other Section</a>
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
                                <h4>Shortcuts</h4>
                            </div>
                            <div class="list-group">
                                <a href="#" class="list-group-item">DUO</a>
                                <a href="#" class="list-group-item">University Email</a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Get Involved with Causes</h4>
                            </div>
                            <div class="list-group">
                                <a href="#" class="list-group-item">RSPB</a>
                                <a href="#" class="list-group-item">Barnardo's</a>
                                <a href="#" class="list-group-item">Mencap</a>
                                <a href="#" class="list-group-item">Oxfam</a>
                                <a href="#" class="list-group-item">Samaritans</a>
                                <a href="#" class="list-group-item">WaterAid</a>
                            </div>
                        </div>
                    </div>

                    <div data-spy="scroll" data-target=".navbar" class="col-sm-6 text-left" id="centre">

                        <!-- Notifications Div -->
                        <div id="notifications">
                            <h1>Notifications</h1>

                            <div id="notification_popups">
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Success!</strong> Notification deleted!
                                </div>
                            </div>

                            <div class="card" id="notification1">
                                <div class="card-header">
                                    <h4>Shift Approved</h4>
                                </div>
                                <div class="card-block">
                                    <p class="card-text">Your Manager approved your shift at Barnardo's on 23rd Feb, 3-6pm.</p>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-success archive">
                                            Archive
                                        </button>
                                        <button type="button" class="btn btn-outline-warning dismiss">
                                            Dismiss
                                        </button>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Last updated: 16 mins ago</small>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4>Shift awaiting approval</h4>
                                </div>
                                <div class="card-block">
                                    <p class="card-text">Shift application at Mencap on 28th Feb 12-2pm is awaiting approval from your Manager.</p>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-success archive">
                                            Archive
                                        </button>
                                        <button type="button" class="btn btn-outline-warning dismiss">
                                            Dismiss
                                        </button>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Last updated: 49 mins ago</small>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4>Congratulations!</h4>
                                </div>
                                <div class="card-block">
                                    <p class="card-text">You've completed 48 hours of volunteering so far!</p>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-success archive">
                                            Archive
                                        </button>
                                        <button type="button" class="btn btn-outline-warning dismiss">
                                            Dismiss
                                        </button>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Last updated: 2 days ago</small>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4>Get Involved!</h4>
                                </div>
                                <div class="card-block">
                                    <p class="card-text">You're all set up and ready - fill in the shift application form to get started with volunteering.</p>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-success archive">
                                            Archive
                                        </button>
                                        <button type="button" class="btn btn-outline-warning dismiss">
                                            Dismiss
                                        </button>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Last updated: 1 week ago</small>
                                </div>
                            </div>
                        </div>
                        <!-- End of Notifications Div -->

                        <!-- Horizontal Break -->
                        <hr>

                        <!-- Volunteering Div -->
                        <div id="volunteering">
                            <h1>Volunteering</h1>

                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Success!</strong> Shift application sent!
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4>New Shift</h4>
                                </div>
                                <div class="card-block">
                                    <!-- TODO>> ADD ACTION ROUTE FOR POST REQUEST -->
                                    <form method="POST" action="" id="shiftApplicationForm">
                                        <div class="form-group">
                                            <label for="shiftApplicationDateTimeStart">Start Date and time</label>
                                            <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="shiftApplicationDateTimeStart" name="shiftApplicationDateTimeStart"required>
                                        </div>
                                        <div class="form-group">
                                            <label for="shiftApplicationDateTimeEnd">End Date and time</label>
                                            <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="shiftApplicationDateTimeEnd" name="shiftApplicationDateTimeEnd"required>
                                        </div>
                                        <div class="form-group">
                                            <label for="shiftApplicationSelect">Select Cause</label>
                                            <select class="form-control" id="shiftApplicationSelect" name="shiftApplicationSelect">
                                                <option>Cause 1</option>
                                                <option>Cause 2</option>
                                                <option>Cause 3</option>
                                                <option>Cause 4</option>
                                                <option>Cause 5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="shiftApplicationComment">Comment (Optional)</label>
                                            <textarea class="form-control" id="shiftApplicationComment" rows="3" name="shiftApplicationComment"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-outline-primary" id="shiftApplicationButton">Submit</button>
                                    </form>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4>Cancel Shift</h4>
                                </div>
                                <div class="card-block">
                                    <!-- TODO>> ADD ACTION ROUTE FOR POST REQUEST -->
                                    <form  method="POST" action="" id="shiftCancelForm">
                                        <div class="form-group">
                                            <label for="shiftCancelSelect">Select Shift</label>
                                            <select class="form-control" id="shiftCancelSelect" name="shiftCancelSelect">
                                                <option>Shift 1</option>
                                                <option>Shift 2</option>
                                                <option>Shift 3</option>
                                                <option>Shift 4</option>
                                                <option>Shift 5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="shiftCancelComment">Comment (Optional)</label>
                                            <textarea class="form-control" id="shiftCancelComment" rows="3" name="shiftCancelComment"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-outline-primary" id="shiftCancelButton">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End of Volunteering Div -->

                        <!-- Horizontal Break -->
                        <hr>

                        <!-- Manager can Approve/Deny Shifts Div -->
                        <div id="managerShiftResponse">
                            <h1>Respond to Applications</h1>

                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Success!</strong> Permitted USER wgwq72 for shift at WaterAid on 16th March, 3-5pm.
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4>Approve Shift Requests</h4>
                                </div>
                                <div class="card-block">
                                    <!-- TODO>> ADD ACTION ROUTE FOR POST REQUEST -->
                                    <form method="POST" action="" id="shiftResponseForm">
                                        <div class="form-group">
                                            <label for="shiftResponseSelect">Select Shift</label>
                                            <select class="form-control" id="shiftResponseSelect" name="shiftResponseSelect">
                                                <option>Shift 1</option>
                                                <option>Shift 2</option>
                                                <option>Shift 3</option>
                                                <option>Shift 4</option>
                                                <option>Shift 5</option>
                                            </select>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="shiftResponseRadios" id="shiftResponseRadio1" value="option1" checked>
                                                Permit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="shiftResponseRadios" id="shiftResponseRadio2" value="option2">
                                                Deny
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="shiftResponseComment">Comment (Optional)</label>
                                            <textarea class="form-control" id="shiftResponseComment" rows="3" name="shiftResponseComment"></textarea>
                                        </div>
                                        <button type="button" class="btn btn-outline-primary" id="shiftResponseButton">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End of Manager can Approve/Deny Shifts Div -->

                        <!-- Horizontal Break -->
                        <hr>

                        <!-- Other Section -->
                        <div id="otherSection">
                            <h1>Other Section</h1>

                            <div class="card">
                                <div class="card-header">
                                    <h4>Section Object</h4>
                                </div>
                                <div class="card-block">
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In feugiat ac diam ultricies tincidunt. Maecenas venenatis finibus libero sed dapibus. Fusce sit amet nisl a risus commodo placerat. Nam venenatis suscipit orci nec porttitor. Nullam et dui et lacus semper volutpat. Fusce eleifend ornare est vel hendrerit. Etiam aliquet purus</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Footer Information</small>
                                </div>
                            </div>
                        </div>
                        <!-- End of Other Section -->

                    </div>

                    <div class="col-sm-3 sidenav" id="rightSide">
                        <div class="card">
                            <div class="card-header">
                                <h4>Hours by Department</h4>
                            </div>
                            <canvas id="myDepartmentShareChart" width="400" height="400"></canvas>
                            <script>
                            var ctx = document.getElementById("myDepartmentShareChart").getContext('2d');
                            var myDoughnutChart = new Chart(ctx, {
                                type: 'doughnut',
                                data: {
                                    labels: ["Orange", "Teal", "Navy", "Olive", "Yellow"],
                                    datasets: [{
                                        data: [10, 20, 30, 15, 25],
                                        backgroundColor: ["#FF851B", "#39CCCC", "#001f3f", "#3D9970", "#FFDC00"]   
                                    }]
                                },
                                options: {
                                }
                            });
                            </script>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Department progress</h4>
                            </div>
                            <canvas id="myDepartmentRaceChart" width="200" height="200"></canvas>
                            <script>
                            var ctx = document.getElementById("myDepartmentRaceChart").getContext('2d');
                            var myDepartmentRaceChart = new Chart(ctx, {
                                type: 'horizontalBar',
                                data: {
                                    labels: ["Orange", "Teal", "Navy", "Olive", "Yellow"],
                                    datasets: [{
                                        data: [10, 20, 30, 15, 25],
                                        fill: false,
                                        backgroundColor: ["rgba(255,133,27,0.2)", "rgba(57,204,204,0.2)", "rgba(0,31,63,0.2)", "rgba(61,153,112,0.2)", "rgba(255,220,0,0.2)"],
                                        borderColor: ["rgb(255,133,27)", "rgb(57,204,204)", "rgb(0,31,63)", "rgb(61,153,112)", "rgb(255,220,0)"],
                                        borderWidth: 1  
                                    }]
                                },
                                options: {
                                    "scales": {
                                        "xAxes": [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    },
                                    "legend": {
                                        display: false
                                    }
                                }
                            });
                            </script>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Extra Info Box</h4>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item">First item</li>
                                <li class="list-group-item">Second item</li>
                                <li class="list-group-item">Third item</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FOOTER -->
            <h1><br /></h1>

            <div id="footer">
                <footer class="container text-center">
                    <h4><br /></h4>
                    <h2>We'd love to hear from you</h2>
                    <h4><br /></h4>
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
