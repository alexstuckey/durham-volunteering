<div class="col-sm-8 text-left" id="centre">

    <!-- Settings Div -->
    <div id="settings">
        <h1>Settings</h1>
        <div class="card">
            <div class="card-block">
                <form action="admin_4_settings.php" method="post">
                    <h4>Email Settings</h4>
                    <br>
                    <form class="form-inline">
                        <div class="form-group">
                            <p class="form-control-static"><b>Admin CIS usernames</b></p>
                            <input style="width:100px; margin-right:10px;" type="text" class="form-control alignleft" id="inputPassword2" value="abcd11">
                            <button type="submit" class="btn btn-secondary">Rename</button>
                        </div>
                        <div class="form-group">
                            <input style="width:100px; margin-right:10px;" type="text" class="form-control alignleft" id="inputPassword2" value="abcd11">
                            <button type="submit" class="btn btn-secondary">Rename</button>
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
