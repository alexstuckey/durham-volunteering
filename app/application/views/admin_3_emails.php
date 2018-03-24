<div data-spy="scroll" data-target=".navbar" class="col-sm-8 text-left" id="centre">

    <!-- Emails Div -->
    <div id="email-templates">
        <h1>Email Templates</h1>

        <?php if (isset($message)) {

            echo '<p class="alert alert-info">'.$message.'</p>';
        }?>

        <?php echo validation_errors(); ?>

        <div id="accordion" role="tablist" aria-multiselectable="true">

            <?php foreach ($email_templates as $template): ?>
                <div class="card">
                    <div class="card-header" role="tab" id="EmailListHeading-<?php echo $template['emailName'] ?>">
                        <p class="mb-0 alignleft">
                            <strong><?php echo ucwords($template['group']) ?></strong>&nbsp;&nbsp;
                            <a data-toggle="collapse" data-parent="#accordion" href="#EmailListCollapse-<?php echo $template['emailName'] ?>" aria-expanded="true" aria-controls="EmailListCollapse-<?php echo $template['emailName'] ?>">
                                <?php echo $template['emailName'] ?>
                            </a>
                        </p>
                    </div>
                    <div id="EmailListCollapse-<?php echo $template['emailName'] ?>" class="collapse" role="tabpanel" aria-labelledby="EmailListHeading-<?php echo $template['emailName'] ?>">
                        <div class="card-block">
                            <form action="<?php echo site_url('/admin/emails/edit'); ?>" method="post">
                                <input type="hidden" class="form-control" name="emailName" value="<?php echo $template['emailName'] ?>">

                                <div class="form-group">
                                    <label for="emailDescription"><h5>Description</h5></label>
                                    <p><?php echo $template['emailDescription'] ?></p>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="emailSubject"><h5>Subject</h5></label>
                                    <input type="text" class="form-control" name="emailSubject" id="emailSubject" value="<?php echo $template['emailSubject'] ?>">
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="emailContent"><h5>Email body</h5></label>
                                    <textarea class="form-control" id="emailContent" rows="15" name="emailContent"><?php echo $template['emailContent'] ?></textarea>
                                </div>
                                <button class="btn btn-primary" type="submit">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- End of Emails Div -->
</div>
