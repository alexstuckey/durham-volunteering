<div class="col-sm-8 text-left" id="centre">

    <!-- Settings Div -->
    <div id="settings">
        <h1>Settings</h1>
        <div class="card">
            <div class="card-block">
                    <h4>Admin users</h4>
                    <br>
                    <form class="form-inline">
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
                                    <input type="text" class="form-control mb-2" id="adminUsernameAdd" placeholder="Username">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-2">Add new</button>
                                </div>
                            </div>
                        </form>
                    <br>
                    <h4>Edit Footer</h4>
                    <br>
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="" checked>
                                        <b>Phone number</b>
                                        <br />
                                        Include a contact phone number in the footer.
                                        <label class="form-group row" style="margin-top:5px;margin-left:0;">
                                                <input class="form-control alignleft" style="width:200px; margin-right:10px;" type="tel" value="1-(555)-555-5555" id="tel-input">
                                                <button type="submit" class="btn btn-secondary">Change</button>
                                        </label>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="" checked>
                                        <b>Contact us email address</b>
                                        <br />
                                        Included email address in the footer.
                                        <label class="form-group row" style="margin-top:5px;margin-left:0;">
                                            <input class="form-control alignleft" style="width:200px; margin-right:10px;" type="email" value="community.engagement@durham.ac.uk" id="email-input">
                                            <button type="submit" class="btn btn-secondary">Change</button>
                                        </label>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="" checked>
                                        <b>University Portal Link</b>
                                        <br />
                                        Include the link to the Staff Volunteering website in the footer.
                                        <label class="form-group row" style="margin-top:5px;margin-left:0;">
                                            <input class="form-control alignleft" style="width:200px; margin-right:10px;" type="url" value="facebook.com" id="facebook-input">
                                            <button type="submit" class="btn btn-secondary">Change</button>
                                        </label>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <br />
                    <h4>Danger Zone</h4>
                    <br />
                    <div class="card" style="border-color:#D73A49;">
                        <div class="card-block danger">
                            <b>Temporarily disable the system</b>
                            <br />
                            This may be used for maintenance.
                            <a href="admin_6_maintenance.html"><button type="button" class="btn btn-outline-danger alignright">Disable the system</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
