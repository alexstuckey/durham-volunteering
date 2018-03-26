<script type="text/javascript">
    $(document).ready(function() {
        $('#inputDepartment').select2({
            theme: "bootstrap4"
        });
    });
</script>
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
<?php echo $declaration; ?>
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

