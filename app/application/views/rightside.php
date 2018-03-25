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
                        backgroundColor: ["#FF851B", "#39CCCC", "#001f3f", "#3D9970", "#FFDC00"]
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
                        backgroundColor: ["rgba(255,133,27,0.2)", "rgba(57,204,204,0.2)", "rgba(0,31,63,0.2)", "rgba(61,153,112,0.2)", "rgba(255,220,0,0.2)"],
                        borderColor: ["rgb(255,133,27)", "rgb(57,204,204)", "rgb(0,31,63)", "rgb(61,153,112)", "rgb(255,220,0)"],
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
