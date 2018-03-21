<div data-spy="scroll" data-target=".navbar" class="col-sm-8 text-left" id="centre">

    <!-- Departments Div -->
    <div id="departments">
        <h1>Departments</h1>

        <div id="accordion" role="tablist" aria-multiselectable="true">

            <?php foreach ($departments as $department): ?>
                <div class="card">
                    <div class="card-header" role="tab" id="DepListHeading-<?php echo $department['id'] ?>">
                        <p class="mb-0 alignleft">
                            <a data-toggle="collapse" data-parent="#accordion" href="#DepListCollapse-<?php echo $department['id'] ?>" aria-expanded="true" aria-controls="DepListCollapse-<?php echo $department['id'] ?>">
                                <?php echo $department['departmentsName'] ?>
                            </a>
                        </p>
                        <span class="mb-0 alignright badge badge-primary badge-pill">
                                <?php echo $department['total'] ?> volunteers
                        </span>
                    </div>
                    <div id="DepListCollapse-<?php echo $department['id'] ?>" class="collapse" role="tabpanel" aria-labelledby="DepListHeading-<?php echo $department['id'] ?>">
                        <div class="card-block">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Name</span>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $department['departmentsName'] ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">Change</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>

<!-- End of Volunteering Div -->
</div>