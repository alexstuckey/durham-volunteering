<!-- Left Sidebar in Content Block -->
<div class="col-sm-4 sidenav" id="leftSide">
    <!-- Department Stats div-->
    <div id="departmentStats">
        <h1>Department</h1>

    <div class="card">
        <div class="card-header">
            <h4>Volunteering time proportion by cause</h4>
        </div>
        <div class="card-block">
                <!-- Stat 1 -->
                        <canvas id="myDepartmentShareChart" width="400" height="400">
                            <script>
                                // department proportion by hours chart
                                let myDoughnutChart = new Chart(document.getElementById("myDepartmentShareChart"), {
                                    type: 'doughnut',
                                    data: {
                                        labels: ["RNLI", "NSPCC", "MENCAP", "RSPB", "RSPCA", "Other"],
                                        datasets: [{
                                            data: [80, 60, 50, 35, 28, 16],
                                            backgroundColor: ["#7EA74F", "#A22B6A", "#23A6AE", "#1F5974", "#06A679", "EC932B"]
                                        }]
                                    },
                                    options: {
                                    }
                                });
                            </script>
                        </canvas>
                <!-- End of Stat 1 -->
        </div>
    </div>

        <div class="card">
            <div class="card-header">
                <h4>Top 3 Departments by Total Hours</h4>
            </div>
            <div class="card-block">
                <!-- Stat 2 -->
                <canvas id="myDepartmentRaceChart" width="200" height="200">
                    <script>
                        // department top 3 by hours chart options
                        let myDepartmentRaceChart = new Chart(document.getElementById("myDepartmentRaceChart").getContext('2d'), {
                            type: 'horizontalBar',
                            data: {
                                labels: ["Accounting", "Catering", "Careers"],
                                datasets: [{
                                    data: [60, 40, 20],
                                    fill: false,
                                    backgroundColor: ["rgba(126, 167, 79,0.2)", "rgba(162, 43, 106,0.2)", "rgba(35, 166, 174,0.2)"],
                                    borderColor: ["rgb(126, 167, 79)", "rgb(162, 43, 106)", "rgb(35, 166, 174)"],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                "scales": {
                                    "xAxes": [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                },
                                "legend": {
                                    display: false
                                }
                            }
                        });
                    </script>
                </canvas>
                <!-- End of Stat 2 -->
            </div>
        </div>
    </div>
    <!-- End of Row 1 -->

    <!-- Row 2 -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card-deck">

                <!-- Department Leaderboard card -->
                <div class="card">
                    <div class="card-header">
                        <h4>Department Leaderboard</h4>
                    </div>
                    <div class="card-block">
                        <h5>Your department is in position:</h5>
                        <div class="singleStatBold">
                            <h1><?php if ($positionWithinDepartment == 'null' || $positionWithinDepartment == '') { echo '4/23'; } else { echo $positionWithinDepartment[0] . '/' . $positionWithinDepartment[1]; } ?></h1>
                        </div>
                    </div>
                </div>
                <!-- End of Department Leaderboard card -->

                <!-- Position within Department card -->
                <div class="card">
                    <div class="card-header">
                        <h4>Volunteering within Department</h4>
                    </div>
                    <div class="card-block">
                        <h5>Within your department, you are in position:</h5>
                        <div class="singleStatBold">
                            <h1><?php if ($positionWithinDepartment == 'null' || $positionWithinDepartment == '') { echo '4/23'; } else { echo $positionWithinDepartment[0] . '/' . $positionWithinDepartment[1]; } ?></h1>
                        </div>
                    </div>
                </div>
                <!-- End of Position within Department card -->

            </div>
        </div>
    </div>
    <!-- End of Row 2 -->

    <!-- Row 3 -->
    <div class="card">
        <div class="card-header">
            <h4>Department Milestones</h4>
        </div>
        <div class="card-block">
            <!-- Department Milestone 1 -->
            <div id="milestone1">
                <h5>Milestone 1</h5>
                <div id="progressBar4">

                </div>
            </div>
            <!-- End of Department Milestone 1 -->
        </div>
    </div>
    <!-- End of Row 3 -->
    </div>
    <!-- End of Department Stats Div -->
</div>

<!-- ScrollSpy set up in HEADER.PHP File -->
<!-- Central content column containing forms -->
<div class="col-sm-4 text-left" id="centre">

    <!-- Personal Stats div-->
    <div id="personalStats">
        <h1>Personal Statistics</h1>

        <!-- Milestones Card -->
        <div class="card">
            <div class="card-header">
                <h4>Personal Milestones</h4>
            </div>
            <div class="card-block">

                <!-- Milestone 1 -->
                <div id="milestone1">
                    <h5>Milestone 1</h5>
                    <div id="progressBar1">

                    </div>
                </div>
                <!-- End of Milestone 1 -->

                <!-- Milestone 2 -->
                <div id="milestone2">
                    <h5>Milestone 2</h5>
                    <div id="progressBar2">

                    </div>
                </div>
                <!-- End of Milestone 2 -->
            </div>
        </div>
        <!-- End of Milestones Card -->

        <!-- Numbers Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card-deck">

                    <div class="card">
                        <div class="card-header">
                            <h4>Total Hours</h4>
                        </div>
                        <div class="card-block">
                            <div id="progressBar3">

                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Favourite cause</h4>
                        </div>
                        <div class="card-block">
                            <div class="singleStatBold">
                                <h1><?php if ($getFavouriteCause == 'null' || $getFavouriteCause == '') { echo 'RNLI'; } else { echo $getFavouriteCause; } ?></h1>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- End of Numbers Row -->

    </div>
    <!-- End of Personal Stats Div -->
</div>

<!-- Right hand sidebar containing charts and extra info -->
<div class="col-sm-4 sidenav" id="rightSide">
    <!-- University Stats div -->
    <div id="uniStats">
        <div class="card">
            <div class="card-header">
                <h4>University</h4>
            </div>
            <div class="card-block">
                <div class="row">
                    <!-- Column 1 -->
                    <div class="col-sm-6">
                        <h5>UK Top 3...</h5>
                        <canvas id="uniStatsChart" width="200" height="200">
                            <script>
                                // University stats bar chart
                                let uniStatsChart = new Chart(document.getElementById("uniStatsChart").getContext('2d'), {
                                    type: 'bar',
                                    data: {
                                        labels: ["2015", "2016", "2017"],
                                        datasets: [{
                                            data: [15, 20, 30],
                                            fill: false,
                                            backgroundColor: ["rgba(6, 166, 121,0.2)", "rgba(236, 147, 43,0.2)", "rgba(104, 39, 92,0.2)"],
                                            borderColor: ["rgb(6, 166, 121)", "rgb(236, 147, 43)", "rgb(104, 39, 92)"],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        "scales": {
                                            "xAxes": [{
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        },
                                        "legend": {
                                            display: false
                                        }
                                    }
                                });
                            </script>
                        </canvas>
                    </div>
                    <!-- End of Column 1 -->

                    <!-- Column 2 -->
                    <div class="col-sm-6">
                        <!-- Stat 1 -->
                        <div>
                            <h5>Total Volunteers</h5>
                            <div class="statHeading">
                                <h1><?php if ($totalVolunteers == '' || $totalVolunteers == 'null') { echo '792'; } else { echo $totalVolunteers; } ?></h1>
                            </div>
                        </div>

                        <!-- Stat 2 -->
                        <div>
                            <h5>Total combined hours</h5>
                            <div class="statHeading">
                                <h1><?php if ($totalHoursVolunteered == '' || $totalHoursVolunteered == 'null') { echo '27,041';} else { echo $totalHoursVolunteered; } ?></h1>
                            </div>
                        </div>
                    </div>
                    <!-- End of Column 2 -->

                </div>
            </div>
        </div>
    </div>
    <!-- End of University Stats div -->
</div>


<!-- Script to pass extracted variable data from controller to the javascript for this page -->
<script type="text/javascript">
    let sumTimeByCause = JSON.parse('<?php echo $sumTimeByCause; ?>');
    let volunteeringTimeByDepartment = JSON.parse('<?php echo $volunteeringTimeByDepartment; ?>');
    let volunteeringTimePersonal = '<?php echo $volunteeringTimePersonal; ?>';
    let totalHoursVolunteered = '<?php echo $totalHoursVolunteered; ?>';
    let totalVolunteers = '<?php echo $totalVolunteers; ?>';
    let getFavouriteCause = '<?php echo $getFavouriteCause; ?>';
    let positionWithinDepartment = JSON.parse('<?php echo $positionWithinDepartment; ?>');

    // total time by cause:                 sumTimeByCause['timeSum']
    //                                      sumTimeByCause['organisation']
    // volunteering time by department:     volunteeringTimeByDepartment['departmentsName']
    //                                      volunteeringTimeByDepartment['timeSum']
    // personal volunteering time total:    volunteeringTimePersonal['timeSum']
    // total hours volunteered:             totalHoursVolunteered['timeSum']
    // total number of volunteers:
    // favourite cause:                     getFavouriteCause['organisation']
    // position within department:          positionWithinDepartment['departmentsName']
</script>
