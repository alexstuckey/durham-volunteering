<div class="col-sm-9 text-left" id="centre">

    <!-- Causes div -->
    <div id="cause_select">
        <h1>Add a Cause</h1>

        <?php if (isset($message)) {

            echo '<p class="alert alert-info">'.$message.'</p>';
        }?>

        <?php echo validation_errors(); ?>

        <form class="col-lg-10" action="<?php echo site_url('/cause/add'); ?>" method="post">
          <div class="form-group">
            <label for="inputOrganisationName">Organisation name</label>
            <input type="text" class="form-control" id="inputOrganisationName" name="inputOrganisationName" value="<?php echo set_value('inputOrganisationName'); ?>">
          </div>

          <div class="form-group">
            <label for="inputType">Type</label>
            <select class="form-control" id="inputType" name="inputType">
                <?php foreach ($causeTypes as $type): ?>
                    <option value="<?php echo $type['typeID']; ?>" <?php echo  set_select('inputType', $type['typeID']); ?>><?php echo $type['name'] ?></option>
                <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="inputContactName">Contact Name</label>
            <input type="text" class="form-control" id="inputContactName" name="inputContactName" value="<?php echo set_value('inputContactName'); ?>">
          </div>

          <div class="form-group">
            <label for="inputContactEmail">Contact Email</label>
            <input type="email" class="form-control" id="inputContactEmail" name="inputContactEmail" value="<?php echo set_value('inputContactEmail'); ?>">
          </div>

          <div class="form-group">
            <label for="inputContactPhone">Contact Phone</label>
            <input type="tel" class="form-control" id="inputContactPhone" name="inputContactPhone" value="<?php echo set_value('inputContactPhone'); ?>">
          </div>

          <div class="form-group">
            <label for="inputNotes">Notes</label>
            <textarea class="form-control" rows="4" id="inputNotes" name="inputNotes"><?php echo set_value('inputNotes'); ?></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Add cause</button>
        </form>
    </div>

    <!-- End of causes div -->
</div>
