<!-- Volunteering Forms Div -->
<div id="volunteering">
    <h1>Volunteering</h1>

    <!-- Link back to My_Volunteering -->
    <div class="card">
        <div class="card-block">
            <a class="nav-link" href="<?php echo site_url('/my_volunteering'); ?>">&#8592; Back to Your Volunteering</a>
        </div>
    </div>

    <?php if (isset($message)) {
        echo '<p class="alert alert-info">'.$message.'</p>';
    } elseif (isset($error)) {
        // Equivalent to validation_errors(), but kept across a redirect
        echo $error;
    }?>

    <div class="card">
        <div class="card-header">
            <h4>New Activity</h4>
        </div>
        <div class="card-block">

            <form method="post" action="<?php echo site_url('/time/create'); ?>" id="shiftApplicationForm">

                <div class="form-group">
                    <label for="shiftApplicationDateTimeStart">Start Date and time</label>
                    <input class="form-control" type="datetime-local" value="<?php echo $date; ?>" id="shiftApplicationDateTimeStart" name="shiftApplicationDateTimeStart"required>
                </div>

                <div class="form-group">
                    <label for="shiftApplicationDateTimeEnd">End Date and time</label>
                    <input class="form-control" type="datetime-local" value="<?php echo $date; ?>" id="shiftApplicationDateTimeEnd" name="shiftApplicationDateTimeEnd"required>
                </div>

                <div class="form-group">
                    <label for="shiftApplicationCause">Cause</label>
                    <select class="form-control" name="shiftApplicationCause" id="shiftApplicationCause">
                        <?php foreach ($causes as $cause): ?>
                            <option value="<?php echo $cause['causeID']; ?>"><?php echo $cause['organisation'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="shiftApplicationComment">Comment (Optional)</label>
                    <textarea class="form-control" id="shiftApplicationComment" rows="3" name="shiftApplicationComment"></textarea>
                </div>

                <button type="submit" class="btn btn-outline-primary" id="shiftApplicationButton">Submit</button>

            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Cancel Activity</h4>
        </div>
        <div class="card-block">
            <form  method="POST" action="<?php echo site_url('/time/delete'); ?>" id="shiftCancelForm">

                <div class="form-group">
                    <label for="shiftCancelSelect">Select Shift</label>
                    <select class="form-control" id="shiftCancelSelect" name="shiftCancelSelect">
                        <?php foreach ($upcoming_times as $entries): ?>
                            <?php if ($entries['status'] == 'pending'): ?>
                                <option value="<?php echo $entries['timeID']; ?>"><?php echo '' . $entries['start'] . ' to ' . $entries['finish'] . ' at ';?><?php foreach ($causes as $cause) { if ($cause['causeID'] == $entries['causeID']) echo $cause['organisation']; };?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="shiftCancelComment">Comment (Optional)</label>
                    <textarea class="form-control" id="shiftCancelComment" rows="3" name="shiftCancelComment"></textarea>
                </div>

                <button type="submit" class="btn btn-outline-primary" id="shiftCancelButton">Submit</button>

            </form>
        </div>
    </div>
</div>
<!-- End of Volunteering Div -->
