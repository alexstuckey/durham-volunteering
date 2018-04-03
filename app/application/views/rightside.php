<!-- Right hand sidebar containing charts and extra info -->
<div class="col-sm-3 sidenav" id="rightSide">
    <div class="card">
        <div class="card-header">
            <h5>Hours by Department</h5>
        </div>
        <canvas id="myDepartmentShareChart" width="400" height="400"></canvas>
        <script>
            var ctx = document.getElementById("myDepartmentShareChart").getContext('2d');
            var myDoughnutChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["Accounting", "Catering", "Careers", "Estates", "Porters"],
                    datasets: [{
                        data: [10, 20, 30, 15, 25],
                        backgroundColor: ["#7EA74F", "#A22B6A", "#23A6AE", "#1F5974", "#06A679"]
                    }]
                },
                options: {
                }
            });
        </script>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Department progress</h5>
        </div>
        <canvas id="myDepartmentRaceChart" width="200" height="200"></canvas>
        <script>
            var ctx = document.getElementById("myDepartmentRaceChart").getContext('2d');
            var myDepartmentRaceChart = new Chart(ctx, {
                type: 'horizontalBar',
                data: {
                    labels: ["Accounting", "Catering", "Careers", "Estates", "Porters"],
                    datasets: [{
                        data: [10, 20, 30, 15, 25],
                        fill: false,
                        backgroundColor: ["rgba(126, 167, 79, 0.2)", "rgba(162, 43, 106, 0.2)", "rgba(35, 166, 174, 0.2)", "rgba(31, 89, 116, 0.2)", "rgba(6, 166, 121, 0.2)"],
                        borderColor: ["rgb(126, 167, 79)", "rgb(162, 43, 106)", "rgb(35, 166, 174)", "rgb(31, 89, 116)", "rgb(6, 166, 121)"],
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
<!--    <div class="card">-->
<!--        <div class="card-header">-->
<!--            <h5>Extra Info Box</h5>-->
<!--        </div>-->
<!--        <ul class="list-group">-->
<!--            <li class="list-group-item">First item</li>-->
<!--            <li class="list-group-item">Second item</li>-->
<!--            <li class="list-group-item">Third item</li>-->
<!--        </ul>-->
<!--    </div>-->
</div>
