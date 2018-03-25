<!-- Statistics Section -->
<div id="statistics">

    <!-- Row -->
    <div class="row" >

        <!-- Left Column -->
        <div class="col-sm-6" id="left">

            <!-- Department Stats div -->
            <div id="departmentStats">
                <div class="card">
                    <div class="card-header">
                        <h4>Department</h4>
                    </div>
                    <div class="card-block">
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In feugiat ac diam ultricies tincidunt. Maecenas venenatis finibus libero sed dapibus. Fusce sit amet nisl a risus commodo placerat. Nam venenatis suscipit orci nec porttitor. Nullam et dui et lacus semper volutpat. Fusce eleifend ornare est vel hendrerit. Etiam aliquet purus</p>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In feugiat ac diam ultricies tincidunt. Maecenas venenatis finibus libero sed dapibus. Fusce sit amet nisl a risus commodo placerat. Nam venenatis suscipit orci nec porttitor. Nullam et dui et lacus semper volutpat. Fusce eleifend ornare est vel hendrerit. Etiam aliquet purus</p>
                    </div>
                </div>
            </div>
            <!-- End of Department Stats div -->

        </div>
        <!-- End of Left Column -->

        <!-- Right Column -->
        <div class="col-sm-6" id="right">

            <!-- Personal Stats div-->
            <div id="personalStats">
                <div class="card">
                    <div class="card-header">
                        <h4>Personal</h4>
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

                        <!-- Numbers Row -->
                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-sm-6">
                                <h5>Total hours</h5>
                                <div id="progressBar3">

                                </div>
                            </div>
                            <!-- End of Column 1 -->


                            <!-- Column 2 -->
                            <div class="col-sm-6">
                                <h5>Favourite cause</h5>
                                <h1 class="statHeading">RNLI</h1>
                            </div>
                            <!-- End of Column 2 -->

                        </div>
                        <!-- End of Numbers Row -->

                    </div>
                </div>
            </div>
            <!-- End of Personal Stats div -->

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
                                <h1 class="statHeading">UK Top 3...</h1>
                                <canvas id="uniStatsChart" width="200" height="200"></canvas>
                                <script>
                                    let ctx = document.getElementById("uniStatsChart").getContext('2d');
                                    let uniStatsChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: ["2015", "2016", "2017"],
                                            datasets: [{
                                                data: [15, 20, 30],
                                                fill: false,
                                                backgroundColor: ["rgba(0,31,63,0.2)", "rgba(61,153,112,0.2)", "rgba(255,220,0,0.2)"],
                                                borderColor: ["rgb(0,31,63)", "rgb(61,153,112)", "rgb(255,220,0)"],
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
                            </div>
                            <!-- End of Column 1 -->

                            <!-- Column 2 -->
                            <div class="col-sm-6">
                                <!-- Stat 1 -->
                                <div>
                                    <h5>Total Volunteers</h5>
                                    <h1 class="statHeading">792</h1>
                                </div>

                                <!-- Stat 2 -->
                                <div>
                                    <h5>Total combined hours</h5>
                                    <h1 class="statHeading">27,041</h1>
                                </div>
                            </div>
                            <!-- End of Column 2 -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- End of University Stats div -->

        </div>
        <!-- End of Right Column -->

    </div>
    <!-- End of Row -->

</div>
<!-- End Statistics Section -->
