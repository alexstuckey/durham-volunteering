<!-- My_Volunteering Div -->
<div id="volunteering">
    <h1>Volunteering</h1>

    <!-- Link to add/cancel Activities -->
    <div class="card">
        <div class="card-block">
            <a class="nav-link" href="<?php echo site_url('/my_volunteering/activities'); ?>">Add/ Cancel Activity</a>
        </div>
    </div>

    <!-- View Upcoming Activities -->
    <div>
        <div class="card">
            <div class="card-header">
                <h5>Upcoming Activities</h5>
            </div>
            <div class="card-block activityTable">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cause</th>
                        <th scope="col">Start Time</th>
                        <th scope="col">End Time</th>
                        <th scope="col">Team Challenge</th>
                    </tr>
                    </thead>
                    <tbody>
                        <!-- upcoming activities using if statement if start time is in future -->
                        <!-- replace cause id with organisation relating to that cause id -->
                        <?php foreach ($times as $entries): ?>
                            <tr>
                                <th scope="row"><?php echo $entries['timeID']; ?></th>
                                <td><?php echo $entries['causeID']; ?></td>
                                <td><?php echo $entries['start']; ?></td>
                                <td><?php echo $entries['finish']; ?></td>
                                <td><?php echo $entries['teamChallenge']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- View Previous Activities -->
    <div>
        <div class="card">
            <div class="card-header">
                <h5>Previous Activities</h5>
            </div>
            <div class="card-block activityTable">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cause</th>
                        <th scope="col">Start Time</th>
                        <th scope="col">End Time</th>
                        <th scope="col">Team Challenge</th>
                    </tr>
                    </thead>
                    <tbody>
                        <!-- previous activities using if statement if start time is in past -->
                        <?php foreach ($times as $entries): ?>
                            <tr>
                                <th scope="row"><?php echo $entries['timeID']; ?></th>
                                <td><?php echo $entries['causeID']; ?></td>
                                <td><?php echo $entries['start']; ?></td>
                                <td><?php echo $entries['finish']; ?></td>
                                <td><?php echo $entries['teamChallenge']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End of My Volunteering Div -->
