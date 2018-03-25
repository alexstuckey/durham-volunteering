
            <div class="container-fluid text-center" id="content">
                <div class="row content">
                    <div class="col-sm-3 sidenav" id="leftSide">
                    </div>

                    <div data-spy="scroll" data-target=".navbar" data-offset="70" class="col-sm-6 text-left" id="centre">

                        <!-- Volunteering Div -->
                        <div id="volunteering">
                            <h1 class="onboardh1">Enter Your Details</h1>

                            <?php echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>'); ?>

                            <p>Please provide further information about yourself that will be added to your profile. We will use the name provided for contacting you and interacting with your manager.<br /></p>

                            <div class="card">

                                <div class="card-block">
                                    <form action="<?php echo site_url('/onboard/send_details'); ?>" method="post">

                                        <div class="form-group">
                                            <label for="inputFirstName">First Name</label>
                                            <input type="text" autocomplete="given-name" class="form-control" name="inputFirstName" id="inputFirstName" placeholder="Enter first name" value="<?php list($firstnamesplit)=explode(',', $user['firstnames']); echo set_value('inputLastName', ucwords(strtolower($firstnamesplit))); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="inputLastName">Last Name</label>
                                            <input type="text" autocomplete="family-name" class="form-control" name="inputLastName" id="inputLastName" placeholder="Enter last name" value="<?php echo set_value('inputFirstName', ucwords(strtolower($user['surname']))); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="inputDepartment">Department</label>
                                            <select class="form-control" name="inputDepartment" id="inputDepartment">
                                                <?php foreach ($departments as $department): ?>
                                                    <option value="<?php echo $department['id']; ?>"><?php echo $department['departmentsName'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End if Volunteering Div -->
                    </div>

                    <div class="col-sm-3 sidenav" id="rightSide">
                    </div>
                </div>
            </div>

