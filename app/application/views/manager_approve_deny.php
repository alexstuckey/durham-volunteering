<!-- Manager can Approve/Deny Shifts Div -->
<div id="managerShiftResponse">
    <h1>Respond to Applications</h1>

    <div class="card">
        <div class="card-header">
            <h4>My managees</h4>
        </div>
        <div class="card-block">
            <ul>
            <?php if (count($managees) == 0): ?>
                <li><i>You have not confirmed any users as managees.</i></li>
            <?php endif;
                  foreach ($managees as $managee): ?>
                <li><?php echo $managee['firstName'] . ' ' . $managee['secondName']; ?></li>
            <?php endforeach; ?>
            </ul>

            <?php if (count($manageesNominated) > 0): ?>
                <h5>Nominated (waiting for your approval)</h5>
                <ul>
                <?php foreach ($manageesNominated as $managee): ?>
                    <li><?php echo $managee['firstName'] . ' ' . $managee['secondName']; ?></li>
                <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Approve Shift Requests</h4>
        </div>
        <div class="card-block">
            <form method="POST" action="<?php echo site_url('/time/manager_response'); ?>" id="shiftResponseForm">
                <div class="form-group">
                    <label for="shiftResponseSelect">Select Shift</label>
                    <select class="form-control" id="shiftResponseSelect" name="shiftResponseSelect">
                        <?php foreach ($managees as $managee): ?>
                            <?php foreach ($managee['times'] as $entries): ?>
                                <option value="<?php echo $entries['timeID']; ?>">
                                    <?php echo $entries['cisID'] . ': ' . $entries['start'] . ' to ' . $entries['finish'] . ' at ';?>
                                    <?php foreach ($causes as $cause) {
                                        if ($cause['causeID'] == $entries['causeID']) echo $cause['organisation'];
                                    };?>
                                    </option>
                            <?php endforeach; ?>
                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="shiftResponseRadios" id="shiftResponseRadio1" value="confirmed" checked>
                        Permit
                    </label>
                </div>

                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="shiftResponseRadios" id="shiftResponseRadio2" value="denied">
                        Deny
                    </label>
                </div>

                <div class="form-group">
                    <label for="shiftResponseComment">Comment (Optional)</label>
                    <textarea class="form-control" id="shiftResponseComment" rows="3" name="shiftResponseComment"></textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary" id="shiftResponseButton">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- End of Manager can Approve/Deny Shifts Div -->

