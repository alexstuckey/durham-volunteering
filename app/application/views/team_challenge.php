<!-- Team Challenge Div -->
<div id="teamChallenge">
    <h1>Team Challenge</h1>


    <!-- View all Team Challenges -->
    <div>
        <div class="card">
            <div class="card-header">
                <h5>Ongoing Team Challenges</h5>
            </div>
            <div class="activityTable">
                <div class="card-block">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cause</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">End Time</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Join</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- previous activities using if statement if start time is in past -->


                        <?php foreach ($teamChallenges as $entries): ?>
                            <?php if ($entries['teamChallenge'] == '1'): ?>
                                <?php $data['teamChallengeParticipants'] = $this->Time_model->getParticipantsOfTeamChallenge($entries['timeID']); ?>
                                <tr class="table">
                                    <th scope="row"><?php echo $entries['timeID']; ?></th>
                                    <td><?php foreach ($causes as $cause) { if ($cause['causeID'] == $entries['causeID']) echo $cause['organisation']; };?></td>
                                    <td><?php echo $entries['start']; ?></td>
                                    <td><?php echo $entries['finish']; ?></td>
                                    <td><?php echo $entries['comment']; ?></td>
                                    <?php if (isset($teamChallengeParticipants[$_SERVER['REMOTE_USER']])): ?>
                                        <td>Participant</td>
                                    <?php else: ?>
                                        <td>
                                            <form method="post" action="" id="joinChallengeForm">
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


</div>
<!-- End of Team Challenge Div -->