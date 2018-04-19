<div class="col-sm-8 text-left" id="centre">

    <!-- Settings Div -->
    <div id="settings">
        <h1>Settings</h1>

        <?php if (isset($message)) {
            echo '<p class="alert alert-success">'.$message.'</p><br>';
        } elseif (isset($error)) {
            echo '<p class="alert alert-danger">'.$error.'</p><br>';
        }?>

        <?php echo validation_errors(); ?>

        <div class="card">
            <div class="card-block">
                <h4>Admin users</h4>
                <br>
                <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Username</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count = 1;
                    foreach ($admins as $admin): ?>
                    <tr>
                      <th scope="row"><?php echo $count; $count++; ?></th>
                      <td><?php echo $admin['cisID'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <form action="<?php echo site_url('/admin/settings/addAdmin'); ?>" method="post">
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <input type="text" class="form-control mb-2" id="adminUsernameAdd" name="adminUsernameAdd" placeholder="Username">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Add new</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
