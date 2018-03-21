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
                                <?php echo $department['name'] ?>
                            </a>
                        </p>
                        <span class="mb-0 alignright badge badge-primary badge-pill">
                                <?php echo $department['total'] ?> volunteers
                        </span>
                    </div>
                    <div id="DepListCollapse-<?php echo $department['id'] ?>" class="collapse" role="tabpanel" aria-labelledby="DepListHeading-<?php echo $department['id'] ?>">
                        <div class="card-block">
                            <div id="textboxOne">
                                <p class="alignleft">Registered volunteers<br />Department members<br /><br /><a href="#">&rarr;  Edit</a></p>
                                <p class="alignright">25 volunteers<br />150 members</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>

<!-- End of Volunteering Div -->
</div>