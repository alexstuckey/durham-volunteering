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
