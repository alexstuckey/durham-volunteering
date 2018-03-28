<!-- Manager can Approve/Deny Shifts Div -->
<div id="managerShiftResponse">
    <h1>Respond to Applications</h1>

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
                            <?php foreach ($times as $entries): ?>
                                <?php if ($entries['cisID'] == $managee['cisID']): ?>
                                    <option value="<?php echo $entries['timeID']; ?>"><?php echo $entries['cisID'] . ': ' . $entries['start'] . ' to ' . $entries['finish'] . ' at ';?><?php foreach ($causes as $cause) { if ($cause['causeID'] == $entries['causeID']) echo $cause['organisation']; };?></option>
                                <?php endif; ?>
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
                <button type="button" class="btn btn-outline-primary" id="shiftResponseButton">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- End of Manager can Approve/Deny Shifts Div -->

