<div class="container-fluid text-center" id="content">
    <div class="row content">
        <div class="col-sm-3 sidenav" id="leftSide">
        </div>
        <div data-spy="scroll" data-target=".navbar" data-offset="70" class="col-sm-6 text-left" id="centre">

            <div id="volunteering">
                <h1 class="onboardh1">Enter Your Details</h1>
                <h4><br /></h4>
                <p>Please provide further information about yourself that will be added to your profile. We will use the name provided for contacting you and interacting with your manager.<br /></p>
                <div class="card">
                    <div class="card-block">
                        <form action="<?php echo site_url('/onboard/send_details'); ?>" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter first name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter last name">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 sidenav" id="rightSide">
        </div>
    </div>
</div>