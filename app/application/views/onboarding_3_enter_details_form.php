
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

                                        <div class="form-group">
                                            <label for="inputPersonalDeclaration">Personal Declaration</label>
                                            <small id="personalDeclaration" class="form-text text-muted">
                                                Whilst volunteering as part of the Durham University Staff Volunteering Scheme, I accept:
                                                1. I am eligible to participate in the task e.g. not absent from work/signed off through sickness
                                                2. My responsibility to actively understand the nature of both health and safety risks involved in the task
                                                3. My duty to adopt suitable precautions in partnerships with the recipient organisation
                                                4. I have disclosed any relevant medical information
                                                5. I have checked with my own GP if in doubt about my health and fitness for the event
                                                6. The purpose of my participation is for charitable purposes and I am not receiving payment of any form
                                                7. I have the freedom to participate or withdraw (under supervision) at any stage without any criticism
                                                8. Any expenses claimed are reasonable and associated with the volunteering done within hours when I would otherwise be working
                                                9. I will inform staff volunteering if my volunteering circumstances change at any time.
                                            </small>
                                            <label>I agree to the statement above and certify that all information given on this form is true and accurate.</label>
                                            <select class="form-control" name="inputPersonalDeclaration" id="inputPersonalDeclaration">
                                                <option>Select an option</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputDataProtection">Data Protection</label>
                                            <small id="dataProtection" class="form-text text-muted">
                                                The data submitted here will be treated as confidential and held securely by the Staff Volunteering team.
                                                The data will be utilised only for the purposes of non personal statistical analysis and for the purposes of keeping you informed of volunteering activities.
                                                We always strive to only collect data that is essential which will be held only for as long as is necessary.
                                                Please confirm that you agree to your data being managed in this way.
                                            </small>
                                            <select class="form-control" name="inputDataProtection" id="inputDataProtection">
                                                <option>Select an option</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
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

