<!-- Volunteering Div -->
<div id="volunteering">
    <h1>Volunteering</h1>

    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Shift application sent!
    </div>

    <div class="card">
        <div class="card-header">
            <h4>New Shift</h4>
        </div>
        <div class="card-block">
            <!-- TODO>> ADD ACTION ROUTE FOR POST REQUEST -->
            <form method="POST" action="" id="shiftApplicationForm">
                <div class="form-group">
                    <label for="shiftApplicationDateTimeStart">Start Date and time</label>
                    <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="shiftApplicationDateTimeStart" name="shiftApplicationDateTimeStart"required>
                </div>
                <div class="form-group">
                    <label for="shiftApplicationDateTimeEnd">End Date and time</label>
                    <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="shiftApplicationDateTimeEnd" name="shiftApplicationDateTimeEnd"required>
                </div>
                <div class="form-group">
                    <label for="shiftApplicationSelect">Select Cause</label>
                    <select class="form-control" id="shiftApplicationSelect" name="shiftApplicationSelect">
                        <option>RSPB</option>
                        <option>Barnardo's</option>
                        <option>Mencap</option>
                        <option>Oxfam</option>
                        <option>Samaritans</option>
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
            <h4>Cancel Shift</h4>
        </div>
        <div class="card-block">
            <!-- TODO>> ADD ACTION ROUTE FOR POST REQUEST -->
            <form  method="POST" action="" id="shiftCancelForm">
                <div class="form-group">
                    <label for="shiftCancelSelect">Select Shift</label>
                    <select class="form-control" id="shiftCancelSelect" name="shiftCancelSelect">
                        <option>jdns89 @ 2pm tomorrow</option>
                        <option>dhan35 @ 4pm Monday 29</option>
                        <option>djsh99 @ 9am Tuesday 30</option>
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

<!-- Horizontal Break -->
<hr>