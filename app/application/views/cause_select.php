<!-- Cause select div -->
<div class="card">
    <div class="card-header">
        <h4>View Causes</h4>
    </div>
    <div class="card-block">

        <!-- Select 2 dropdown to select cause. value should hyperlink to the single cause functionality to load in cause html stub -->
        <form>
            <div class="form-group">
                <label for="shiftApplicationCause">Cause</label>
                <select class="form-control" name="shiftApplicationCause" id="shiftApplicationCause">
                    <?php foreach ($causes as $cause): ?>
                        <option value="<?php echo $cause['id']; ?>"><a href="<?php echo base_url('index.php/cause/1'); ?>"><?php echo $cause['organisation'] ?></a></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </form>
    </div>
</div>

<p> data of the single cause selected in above dropdown</p>

<!-- End of cause select div -->