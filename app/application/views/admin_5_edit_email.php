<div data-spy="scroll" data-target=".navbar" class="col-sm-8 text-left" id="centre">

    <!-- Notification Div -->
    <div id="notification">
        <h1>Email Templates</h1>

        <div class="card">
            <div class="card-block">
                <form action="admin_3_emails.php" method="post">
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
