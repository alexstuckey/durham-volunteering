<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php if (isset($page_title)) { echo $page_title; } else { echo "No Title"; }; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?php $this->load->helper('url'); ?>
        
        <!-- Popper JS -->
        <script src="<?php echo base_url('/static/js/popper.min.js'); ?>"></script>
        
        <!-- Vendor JS -->
        <script src="<?php echo base_url('/static/js/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('/static/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('/static/js/Chart.min.js'); ?>"></script>
        <script src="<?php echo base_url('/static/js/select2.min.js'); ?>"></script>


        <!-- App JS -->
        <script src="<?php echo base_url('/static/js/homepage.js'); ?>"></script>

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="<?php echo base_url('/static/css/bootstrap.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('/static/css/select2.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('/static/css/select2-bootstrap4.min.css'); ?>">

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
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item<?php if ($active == "home") { echo " active"; }; ?>">
                                <a class="nav-link" href="<?php echo base_url('index.php/home'); ?>">Home</a>
                            </li>
                            <li class="nav-item<?php if ($active == "volunteering") { echo " active"; }; ?>">
                                <a class="nav-link" href="<?php echo base_url('index.php/my_volunteering'); ?>">My Volunteering</a>
                            </li>
                            <li class="nav-item<?php if ($active == "applciations") { echo " active"; }; ?>">
                                <a class="nav-link" href="<?php echo base_url('index.php/manager'); ?>">Respond to Applications</a>
                            </li>
                            <li class="nav-item<?php if ($active == "other") { echo " active"; }; ?>">
                                <a class="nav-link" href="<?php echo base_url('index.php/statistics'); ?>">Statistics</a>
                            </li>
                        </ul>
                        <?php $isAdmin = TRUE; ?>
                        <?php if ($isAdmin == TRUE) { echo '
                        <ul class="navbar-nav">
                            <li class="nav-item'; if ($active == "admin") { echo " active"; } echo '">
                                <a class="nav-link" href="'; echo base_url('index.php/admin/departments'); echo '">Admin</a>
                            </li>
                        </ul>
                        '; }; ?>
                    </div>
                </nav>
            </div>
