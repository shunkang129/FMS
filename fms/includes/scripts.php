<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
<script src="vendor/chart.js/Chart.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js' integrity='sha512-hZf9Qhp3rlDJBvAKvmiG+goaaKRZA6LKUO35oK6EsM0/kjPK32Yw7URqrq3Q+Nvbbt8Usss+IekL7CRn83dYmw==' crossorigin='anonymous'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<script src="js/demo/chart-bar-demo.js"></script>
<script src="js/custom.js"></script>

<script>
    // for the pie chart
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Admin", "Users", "Others"],
            datasets: [{
                label: 'No of users',
                data: [<?php
                        echo '"' . $adminCountRow . '",';
                        echo '"' . $userCountRow . '",';
                        echo '"' . $otherCountRow . '",';
                        ?>],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {

        }
    });
</script>

<script>
    // for the pie chart at chart.php
    var ctx2 = document.getElementById('pieChart1');
    var pieChart1 = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ["Stadium Ipoh", "Pengkalan", "Area B", "Area C"],
            datasets: [{
                label: 'No of cases',
                data: [<?php
                        echo '"' . $stadiumCaseCountRow . '",';
                        echo '"' . $PengCaseCountRow . '",';
                        echo '"' . $BCaseCountRow . '",';
                        echo '"' . $CCaseCountRow . '",';
                        ?>],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgba(42, 187, 155, 1)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(42, 187, 155, 1)'
                ],
                hoverOffset: 10,
                hoverBorderWidth: 4,
                borderWidth: 2
            }]
        },
        options: {

        }
    });

    var ctx3 = document.getElementById('incidentBarChart');
    var myChart = new Chart(ctx3, {
        type: 'horizontalBar',
        data: {
            labels: ["Fire", "Flood", "Animal Capture", "Others"],
            datasets: [{
                label: 'Case Amount:',
                data: [<?php
                        echo '"' . $fireCaseCountRow . '",';
                        echo '"' . $floodCaseCountRow . '",';
                        echo '"' . $AnimalCaseCountRow . '",';
                        echo '"' . $OtherCaseCountRow . '",';
                        ?>],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(155, 89, 182)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgb(155, 89, 182)'
                ],
                hoverOffset: 6,
                hoverBorderWidth: 4,
                borderWidth: 4,
            }]
        },
        options: {
            indexAxis: 'y',
            scales: {
                yAxes: [{
                    ticks: {

                        text: "Type of incident"
                    }
                }],
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1,
                        suggestedMax: 6,
                    }
                }]
            },
        }

    });

    var ctx5 = document.getElementById('myPolarChart');
    var myPolarChart = new Chart(ctx5, {
        type: 'polarArea',
        data: {
            labels: ["Fire", "Flood", "Animal Capture", "Others"],
            datasets: [{
                label: 'Type of incident',
                data: [<?php
                        echo '"' . $fireCaseCountRow . '",';
                        echo '"' . $floodCaseCountRow . '",';
                        echo '"' . $AnimalCaseCountRow . '",';
                        echo '"' . $OtherCaseCountRow . '",';
                        ?>],
                backgroundColor: [
                    'rgb(255, 99, 132,0.5)',
                    'rgb(54, 162, 235,0.5)',
                    'rgb(255, 205, 86,0.5)',
                    'rgb(155, 89, 182,0.5)'
                ],
                borderColor: [
                    'rgba(255,99,132,0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgb(155, 89, 182, 0.2)'
                ],
                hoverOffset: 6,
                hoverBorderWidth: 6,
                borderWidth: 4,
                hoverBackgroundColor: 'transparent',

            }]
        },
        options: {
            scale: {
                ticks: {
                    stepSize: 1,
                },
            }
        }
    });

    const dataSets = {
        labels: [
            <?php
            $date = "SELECT reportDate FROM report";
            $dateResult = mysqli_query($mysqli, $date);
            while ($daterow = mysqli_fetch_array($dateResult)) {
            ?>
                moment("<?php echo $daterow['reportDate']; ?>"),

            <?php
            }
            ?>
        ],
        datasets: [{
            type: "bar",
            borderColor: 'rgba(255, 206, 86, 1)',
            backgroundColor: 'rgba(255, 206, 86, 0.8)',
            data: [
                <?php
                $countCase = "SELECT count(id) AS cases, reportDate, monthname(reportDate) AS month, year(reportDate) AS year FROM report 
                -- WHERE reportDate BETWEEN '2021-03-01' AND '2021-05-10'
                GROUP BY year(reportDate), monthname(reportDate)";
                $result = mysqli_query($mysqli, $countCase);

                while ($row = mysqli_fetch_array($result)) {
                ?> {

                        x: moment("<?php echo $row['reportDate']; ?>"),
                        y: <?php echo $row['cases']; ?>
                    },
                <?php
                }
                ?>
            ]
        }]
    };


    new Chart("testingChart", {
        type: 'bar',
        data: dataSets,
        options: {
            responsive: true,
            maintainAspectRatio: true,
            tooltips: {
                mode: "x",
                callbacks: {

                    label: function(tooltipItems, data) {
                        return tooltipItems.yLabel + ' Cases';
                    }
                }
            },
            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: "Case amount",
                    },
                    ticks: {
                        suggestedMax: 20,
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: "Month",
                    },
                    maxBarThickness: 70,
                    type: "time",
                    distribution: "series",
                    time: {
                        tooltipFormat: 'MMM YYYY',
                        unit: 'month',
                    },
                }],
            },
            legend: {
                display: false
            }
        }
    });

    const dataSets3 = {
        labels: [

            <?php
            $date = "SELECT reportDate, monthname(reportDate) AS month FROM report";
            $dateResult = mysqli_query($mysqli, $date);
            while ($daterow = mysqli_fetch_array($dateResult)) {
            ?>
                moment("<?php echo $daterow['reportDate']; ?>"),

            <?php
            }
            ?>
        ],
        datasets: [{
            label: "case amount",

            data: [
                <?php
                $countCase = "SELECT count(id) AS cases, reportDate, day(reportDate) as day, monthname(reportDate) AS month, year(reportDate) AS year FROM report 
                GROUP BY year(reportDate), monthname(reportDate), day(reportDate)
                ORDER BY reportDate ASC";
                $result = mysqli_query($mysqli, $countCase);

                while ($row = mysqli_fetch_array($result)) {
                ?> {
                        x: new moment("<?php echo $row['reportDate']; ?>"),
                        y: <?php echo $row['cases']; ?>
                    },
                <?php
                }
                ?>
            ],
            borderColor: 'rgb(54, 162, 235)',
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            pointStyle: 'rectRounded',
            hoverRadius: 8,
            rotation: 5,
            pointHoverBackgroundColor: 'rgba(154, 18, 179, 1)',

        }]
    };


    ctx7 = document.getElementById('testingChart3').getContext('2d');
    testingChart3 = new Chart(ctx7, {
        type: 'line',
        data: dataSets3,
        options: {
            tooltips: {
                callbacks: {

                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1,
                        suggestedMax: 6
                    },
                    scaleLabel: {
                        display: true,
                        labelString: "Case amount",
                    },
                }],
                xAxes: [{
                    type: 'time',
                    distribution: 'series',
                    time: {
                        unit: 'month',
                        displayFormats: {
                            'month': 'MMM DD'
                        },
                        tooltipFormat: 'DD-MMM-YYYY',
                    },
                    ticks: {
                        source: 'data',
                    },
                    scaleLabel: {
                        display: true,
                        labelString: "Month",
                    },
                }]
            }
        }
    });
</script>