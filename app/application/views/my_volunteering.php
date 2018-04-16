<!-- My_Volunteering Div -->
<div id="volunteering">
    <h1>Volunteering</h1>

    <!-- Link to add/cancel Activities -->
    <div class="card">
        <div class="card-block">
            <a class="nav-link" href="<?php echo site_url('/my_volunteering/activities'); ?>">Add / Cancel Activity</a>
        </div>
    </div>

    <?php if (isset($message)) {
        echo '<p class="alert alert-info">'.$message.'</p>';
    } elseif (isset($error)) {
        // Equivalent to validation_errors(), but kept across a redirect
        echo $error;
    }?>


    <!-- View Pending Activities -->
    <div>
        <div class="card">
            <div class="card-header">
                <h5>Pending Activities</h5>
            </div>
            <div class="activityTable">
                <div class="card-block">
                    <?php if ($number_of_times['pending'] == 0): ?>
                        There are no pending activities.
                    <?php else: ?>
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cause</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">End Time</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Type</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- previous activities using if statement if start time is in past -->
                        <?php foreach ($upcoming_times as $time): ?>
                            <?php if ($time['status'] == 'pending'): ?>
                                <tr class="table-warning">
                                    <th scope="row"><?php echo $time['timeID']; ?></th>
                                    <td><?php foreach ($causes as $cause) { if ($cause['causeID'] == $time['causeID']) echo $cause['organisation']; };?></td>
                                    <td><?php echo $time['start']; ?></td>
                                    <td><?php echo $time['finish']; ?></td>
                                    <td><?php echo $time['comment']; ?></td>
                                    <td><?php if ($time['teamChallenge'] == '1') {echo 'Team';} else {echo 'Solo';}; ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


    <!-- View Upcoming Activities -->
    <div>
        <div class="card">
            <div class="card-header">
                <h5>Upcoming Activities</h5>
            </div>
            <div class="activityTable">
                <div class="card-block">
                    <?php if ($number_of_times['upcoming_confirmed'] == 0): ?>
                        There are no upcoming activities.
                    <?php else: ?>
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cause</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">End Time</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Type</th>
                        </tr>
                        </thead>
                        <tbody>
                            <!-- upcoming activities using if statement if start time is in future -->
                            <!-- replace cause id with organisation relating to that cause id -->
                            <?php foreach ($upcoming_times as $time): ?>
                                <?php if ($time['status'] == 'confirmed'): ?>
                                    <tr>
                                        <th scope="row"><?php echo $time['timeID']; ?></th>
                                        <td><?php foreach ($causes as $cause) { if ($cause['causeID'] == $time['causeID']) echo $cause['organisation']; };?></td>
                                        <td><?php echo $time['start']; ?></td>
                                        <td><?php echo $time['finish']; ?></td>
                                        <td><?php echo $time['comment']; ?></td>
                                        <td><?php if ($time['teamChallenge'] == '1') {echo 'Team';} else {echo 'Solo';}; ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


    <!-- View Previous Activities -->
    <div>
        <div class="card">
            <div class="card-header">
                <h5>Previous Activities</h5>
            </div>
            <div class="activityTable">
                <div class="card-block">
                    <?php if ($number_of_times['previous_confirmed'] == 0): ?>
                        There are no previous activities.
                    <?php else: ?>
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cause</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">End Time</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Type</th>
                        </tr>
                        </thead>
                        <tbody>
                            <!-- previous activities using if statement if start time is in past -->
                            <?php foreach ($previous_times as $time): ?>
                                <?php if ($time['status'] == 'confirmed'): ?>
                                    <tr>
                                        <th scope="row"><?php echo $time['timeID']; ?></th>
                                        <td><?php foreach ($causes as $cause) { if ($cause['causeID'] == $time['causeID']) echo $cause['organisation']; };?></td>
                                        <td><?php echo $time['start']; ?></td>
                                        <td><?php echo $time['finish']; ?></td>
                                        <td><?php echo $time['comment']; ?></td>
                                        <td><?php if ($time['teamChallenge'] == '1') {echo 'Team';} else {echo 'Solo';}; ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


    <!-- View Denied Activities -->
    <div>
        <div class="card">
            <div class="card-header">
                <h5>Denied Activities</h5>
            </div>
            <div class="activityTable">
                <div class="card-block">
                    <?php if ($number_of_times['denied'] == 0): ?>
                        There are no denied activities.
                    <?php else: ?>
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cause</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">End Time</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Type</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- denied activities using if statement - status is 'denied' -->
                        <?php foreach ($upcoming_times as $time): ?>
                            <?php if ($time['status'] == 'denied'): ?>
                                <tr class="table-danger">
                                    <th scope="row"><?php echo $time['timeID']; ?></th>
                                    <td><?php foreach ($causes as $cause) { if ($cause['causeID'] == $time['causeID']) echo $cause['organisation']; };?></td>
                                    <td><?php echo $time['start']; ?></td>
                                    <td><?php echo $time['finish']; ?></td>
                                    <td><?php echo $time['comment']; ?></td>
                                    <td><?php if ($time['teamChallenge'] == '1') {echo 'Team';} else {echo 'Solo';}; ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End of My Volunteering Div -->
