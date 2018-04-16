<div class="col-sm-9 text-left" id="centre">

    <!-- Causes div -->
    <div id="cause_select">
        <h1>Causes</h1>

        <?php if (isset($message)) {

            echo '<p class="alert alert-info">'.$message.'</p>';
        }?>

        <?php echo validation_errors(); ?>

            <table class="table  table-responsive table-hover">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Organisation</th>
                    <th scope="col">Type</th>
                    <th scope="col">Contact Name</th>
                    <th scope="col">Contact Email</th>
                    <th scope="col">Contact Phone</th>
                    <th scope="col">Notes</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($causes as $cause): ?>
                        <tr>
                            <th scope="row">
                                <a href="<?php echo site_url('cause/' . $cause['causeID']); ?>">
                                    <?php echo $cause['causeID']; ?>
                                </a>
                            </th>
                            <td><?php echo $cause['organisation']; ?></td>
                            <td><?php echo $cause['name']; ?></td>
                            <td><?php echo $cause['contactName']; ?></td>
                            <td><?php echo $cause['contactEmail']; ?></td>
                            <td><?php echo $cause['contactPhone']; ?></td>
                            <td><?php echo $cause['notes']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="<?php echo site_url('cause/add'); ?>" class="btn btn-primary">Add a cause</a>
    </div>

    <!-- End of causes div -->
</div>
