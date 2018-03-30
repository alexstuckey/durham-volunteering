<div class="col-sm-8 text-left" id="centre">

    <div id="declaration">
        <h1>Personal Declaration</h1>

        <?php if (isset($message)) {
            echo '<p class="alert alert-info">'.$message.'</p>';
        }?>

        <?php echo validation_errors(); ?>
        
        <div class="card">
            <div class="card-block">

                <form action="<?php echo site_url('/admin/declaration/'); ?>" method="post">
                    <div class="form-group">
                        <label for="inputPersonalDeclaration">Set the Personal Declaration that every user must confirm before they may use the system.</label>
                        <textarea class="form-control" id="inputPersonalDeclaration" name="inputPersonalDeclaration" rows="8"><?php echo $declaration; ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
</div>
