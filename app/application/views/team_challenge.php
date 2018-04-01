<!-- Team Challenge Div -->
<div id="teamChallenge">
    <h1>Team Challenge</h1>

    <!-- validation -->
    <?php if (isset($message)) {
        echo '<p class="alert alert-info">'.$message.'</p>';
    } elseif (isset($error)) {
        // Equivalent to validation_errors(), but kept across a redirect
        echo $error;
    }?>

    <!-- View all Team Challenges -->
    <div>
        <div class="card">
            <div class="card-header">
                <h5>Ongoing Team Challenges</h5>
            </div>
            <div class="activityTable">
                <div class="card-block">
                    <p>Joining a Team Challenge will add it to your pending activities - your manager must confirm before you added to the team challenge. If you change your mind before your manager responds, you can leave the challenge by cancelling the shift in the 'My Volunteering' tab.</p>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cause</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">End Time</th>
                            <th scope="col">Description</th>
                            <th scope="col">Join</th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php foreach ($teamChallenges as $entries): ?>
                            <?php if ($entries['teamChallenge'] == '1' && $entries['status'] == 'confirmed'): ?>
                                <tr class="table">
                                    <th scope="row"><?php echo $entries['timeID']; ?></th>
                                    <td><?php foreach ($causes as $cause) { if ($cause['causeID'] == $entries['causeID']) echo $cause['organisation']; };?></td>
                                    <td><?php echo $entries['start']; ?></td>
                                    <td><?php echo $entries['finish']; ?></td>
                                    <td><?php echo $entries['comment']; ?></td>
                                    <?php if (in_array($_SERVER['REMOTE_USER'], $this->Time_model->getParticipantsOfTeamChallenge($entries['timeID']))): ?>
                                        <td>Participant</td>
                                    <?php else: ?>
                                        <td>
                                            <form method="post" action="<?php echo site_url('/team_challenge/join'); ?>" id="joinChallengeForm">
                                                <button name="joinChallengeButton" type="submit" value="<?php echo $entries['timeID']; ?>" class="btn btn-outline-primary" id="joinChallengeButton">Join</button>
                                            </form>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End of view all Team Challenges -->


    <!-- Create new team challenge -->
    <div class="card">
        <div class="card-header">
            <h5>New Team Challenge</h5>
        </div>
        <div class="card-block">

            <form method="post" action="<?php echo site_url('/team_challenge/create'); ?>" id="teamChallengeApplicationForm">

                <div class="form-group">
                    <label for="teamChallengeApplicationDateTimeStart">Start Date and time</label>
                    <input class="form-control" type="datetime-local" value="<?php echo $date; ?>" id="teamChallengeApplicationDateTimeStart" name="teamChallengeApplicationDateTimeStart" required>
                </div>

                <div class="form-group">
                    <label for="teamChallengeApplicationDateTimeEnd">End Date and time</label>
                    <input class="form-control" type="datetime-local" value="<?php echo $date; ?>" id="teamChallengeApplicationDateTimeEnd" name="teamChallengeApplicationDateTimeEnd" required>
                </div>

                <div class="form-group">
                    <label for="teamChallengeApplicationCause">Cause</label>
                    <select class="form-control" name="teamChallengeApplicationCause" id="teamChallengeApplicationCause">
                        <?php foreach ($causes as $cause): ?>
                            <option value="<?php echo $cause['causeID']; ?>"><?php echo $cause['organisation'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="teamChallengeApplicationComment">Description</label>
                    <textarea class="form-control" id="teamChallengeApplicationComment" rows="3" name="teamChallengeApplicationComment"></textarea>
                </div>

                <button type="submit" class="btn btn-outline-primary" id="shiftApplicationButton">Submit</button>

            </form>
        </div>
    </div>
    <!-- End of Create new team challenge -->



</div>
<!-- End of Team Challenge Div -->