<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- datatable plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Moment.js plugins for datepicker and time-series chart input -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>

<!-- Chartjs plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js' integrity='sha512-hZf9Qhp3rlDJBvAKvmiG+goaaKRZA6LKUO35oK6EsM0/kjPK32Yw7URqrq3Q+Nvbbt8Usss+IekL7CRn83dYmw==' crossorigin='anonymous'></script>

<!-- Bootstrap datepicker plugins -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<!-- Custom functions scripts -->
<script src="js/custom.js"></script>

<!----------------- Chart Scripts Start Here ---------------------------------------------------------------------------------------------------------------->


<!-- System user pie chart -->
<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Admin", "Users"],
            datasets: [{
                label: 'No of users',
                data: [<?php
                        echo '"' . $adminCountRow . '",';
                        echo '"' . $userCountRow . '",';
                        ?>],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',

                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',

                ],
                borderWidth: 2
            }]
        },
        options: {

        }
    });
</script>

<!-- System user status pie chart -->
<script>
    var ctx1 = document.getElementById('userStatusChart');
    var userStatusChart = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: ["Enabled", "Disabled"],
            datasets: [{
                label: 'No of users',
                data: [<?php
                        echo '"' . $enableCountRow . '",';
                        echo '"' . $disableCountRow . '",';
                        ?>],
                backgroundColor: [
                    'rgb(54, 162, 235)',
                    'rgb(255, 99, 132)',

                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255,99,132,1)',

                ],
                borderWidth: 2
            }]
        },
        options: {

        }
    });
</script>

<!-- Station cases -->
<script>
    var ctx2 = document.getElementById('pieChart1');
    var pieChart1 = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ["Stadium Ipoh", "Pengkalan", "Meru Raya", "Gopeng"],
            datasets: [{
                label: 'No of cases',
                data: [<?php
                        echo '"' . $stadiumCaseCountRow . '",';
                        echo '"' . $PengCaseCountRow . '",';
                        echo '"' . $meruCaseCountRow . '",';
                        echo '"' . $gopengCaseCountRow . '",';
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
</script>

<!-- Incident Area chart -->
<script>
    var ctx3 = document.getElementById('incidentBarChart');
    var myChart = new Chart(ctx3, {
        type: 'horizontalBar',
        data: {
            labels: ["Hulu Perak", "Kinta", "Manjung", "Kuala Kangsar", "Others"],
            datasets: [{
                data: [<?php
                        echo '"' . $Area1CountRow . '",';
                        echo '"' . $Area2CountRow . '",';
                        echo '"' . $Area3CountRow . '",';
                        echo '"' . $Area4CountRow . '",';
                        echo '"' . $OtherAreaCountRow . '",';
                        ?>],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(155, 89, 182)',
                    '#1cc88a'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgb(155, 89, 182)',
                    '#1cc88a'
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
                    },
                    scaleLabel: {
                        display: true,
                        labelString: "Area",
                    },
                }],
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        suggestedMax: 6,
                    },
                    scaleLabel: {
                        display: true,
                        labelString: "Amount of cases",
                    },
                }]
            },
            legend: {
                display: false
            },
            tooltips: {
                callbacks: {

                    label: function(tooltipItems, data) {
                        return tooltipItems.xLabel + ' Cases';
                    }
                }
            }
        }

    });
</script>

<!-- Incident Cause chart -->
<script>
    var ctx5 = document.getElementById('myPolarChart');
    var myPolarChart = new Chart(ctx5, {
        type: 'polarArea',
        data: {
            labels: ["Faulty Wiring", "Equipment Defective", "Crime", "Others"],
            datasets: [{
                label: 'Type of incident',
                data: [<?php
                        echo '"' . $wiringCauseCountRow . '",';
                        echo '"' . $equipmentCauseCountRow . '",';
                        echo '"' . $crimeCauseCountRow . '",';
                        echo '"' . $otherCauseCountRow . '",';
                        ?>],
                backgroundColor: [
                    'rgb(255, 205, 86,0.5)',
                    'rgb(54, 162, 235,0.5)',
                    'rgb(255, 99, 132,0.5)',
                    'rgb(155, 89, 182,0.5)'
                ],
                borderColor: [
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255,99,132,0.2)',
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
                    stepSize: 3,
                },
            }
        }
    });
</script>

<!-- Cases amount over month -->
<script>
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
                label: "Case",
                borderColor: 'rgba(255, 206, 86, 1)',
                backgroundColor: 'rgba(255, 206, 86, 0.8)',
                hoverBackgroundColor: 'rgb(255,140,0)',
                barThickness: 75,
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
                ],
                order: 1
            },
            {
                type: "line",
                label: "Victim",
                borderColor: "red",
                backgroundColor: 'red',
                fill: false,
                data: [
                    <?php
                    $countCase = "SELECT count(id) AS cases, reportDate, monthname(reportDate) AS month, year(reportDate) AS year, SUM(victimFatality + victimInjured + victimSaved) AS totalVictim FROM report 
                GROUP BY year(reportDate), monthname(reportDate)
                ORDER BY reportDate ASC";
                    $result = mysqli_query($mysqli, $countCase);

                    while ($row = mysqli_fetch_array($result)) {
                    ?> {
                            x: moment("<?php echo $row['reportDate']; ?>"),
                            y: <?php echo $row['totalVictim']; ?>
                        },
                    <?php
                    }
                    ?>
                ],
                order: 2
            }
        ]
    };

    new Chart("testingChart", {
        data: dataSets,
        options: {
            responsive: true,
            maintainAspectRatio: true,
            tooltips: {
                mode: "x",
            },
            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: "Case amount / Victim amount",
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
                    type: "time",
                    distribution: "series",
                    time: {
                        tooltipFormat: 'MMM YYYY',
                        unit: 'month',
                    },
                }],
            },
        }
    });
</script>

<!-- Cases amount over day -->
<script>
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
                        source: 'auto',
                    },
                    scaleLabel: {
                        display: true,
                        labelString: "Day",
                    },
                }]
            }
        }
    });
</script>

<!-- Casualties amount chart -->
<script>
    ctx9 = document.getElementById("donutChart");
    donutChart = new Chart(ctx9, {
        type: 'doughnut',
        data: {
            labels: ["Fatalities", "Injuries", "Saved"],
            datasets: [{
                data: [<?php
                        echo '"' . $fatalityCount . '",';
                        echo '"' . $injuredCount . '",';
                        echo '"' . $saveCount . '",';
                        ?>],
                backgroundColor: ['#DC143C', '#FF8C00', '#1cc88a'],
                hoverBackgroundColor: ['#FF6347', '#FFA500', '#17a673'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: true
            },
            cutoutPercentage: 65,
            animation: {
                animateScale: true,
            }

        },
    });
</script>

<!-- Lost and recovered asset amount against month chart -->
<script>
    const dataSets7 = {
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
                label: ['lost'],
                data: [
                    <?php
                    $countCase = "SELECT SUM(asset_lost) AS lost, reportDate, monthname(reportDate) AS month, year(reportDate) AS year FROM report 
                GROUP BY year(reportDate), monthname(reportDate)
                ORDER BY reportDate ASC";
                    $result = mysqli_query($mysqli, $countCase);

                    while ($row = mysqli_fetch_array($result)) {
                    ?> {
                            x: new moment("<?php echo $row['reportDate']; ?>"),
                            y: <?php echo $row['lost']; ?>
                        },
                    <?php
                    }
                    ?>
                ],
                showLine: true,
                fill: false,
                borderColor: 'rgb(255, 0, 0)',
                backgroundColor: 'rgba(255, 0, 0, 0.6)',
                barThickness: 'flex',
            },
            {
                label: ['recover'],
                data: [
                    <?php
                    $countCase = "SELECT SUM(asset_recover) AS recover, reportDate, monthname(reportDate) AS month, year(reportDate) AS year FROM report 
                GROUP BY year(reportDate), monthname(reportDate)
                ORDER BY reportDate ASC";
                    $result = mysqli_query($mysqli, $countCase);

                    while ($row = mysqli_fetch_array($result)) {
                    ?> {
                            x: new moment("<?php echo $row['reportDate']; ?>"),
                            y: <?php echo $row['recover']; ?>
                        },
                    <?php
                    }
                    ?>
                ],
                showLine: true,
                fill: false,
                borderColor: 'rgba(0, 200, 200, 1)',
                backgroundColor: 'rgba(0, 200, 200, 1)',
                barThickness: 'flex',
            },
        ]
    };

    ctx10 = document.getElementById('assetChart');
    assetChart = new Chart(ctx10, {
        type: 'line',
        data: dataSets7,
        options: {

            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,

                    },
                    scaleLabel: {
                        display: true,
                        labelString: "Asset (RM)",
                    },
                    stacked: true
                }],
                xAxes: [{
                    type: 'time',
                    distribution: 'series',
                    time: {
                        unit: 'month',
                        displayFormats: {
                            'month': 'MMM YYYY'
                        },
                        tooltipFormat: 'MMM-YYYY',
                    },
                    ticks: {
                        source: 'auto',
                    },
                    scaleLabel: {
                        display: true,
                        labelString: "Month",
                    },
                    gridLines: {
                        offsetGridLines: true
                    },
                    stacked: true
                }]
            },
            tooltips: {
                mode: 'index',
                intersect: false,
                position: 'nearest',
                callbacks: {

                    label: function(tooltipItems, data) {
                        return 'Total Amount: ' + 'RM' + tooltipItems.yLabel;
                    }
                }
            },
        }
    });

    function updateChartType() {
        // here we destroy/delete the old or previous chart and redraw it again
        assetChart.destroy();
        assetChart = new Chart(ctx10, {
            type: document.getElementById("chartType").value,
            data: dataSets7,
            options: {

                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,

                        },
                        stacked: true
                    }],
                    xAxes: [{
                        type: 'time',
                        distribution: 'series',
                        time: {
                            unit: 'month',
                            displayFormats: {
                                'month': 'MMM YYYY'
                            },
                            tooltipFormat: 'MMM-YYYY',
                        },
                        ticks: {
                            source: 'auto',
                        },
                        stacked: true
                    }]
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                    position: 'nearest',
                    callbacks: {

                        label: function(tooltipItems, data) {
                            return 'Total Amount: ' + 'RM' + tooltipItems.yLabel;
                        }
                    }
                },
            }
        });
    };
</script>

<!-- contact method chart -->
<script>
    ctx11 = document.getElementById("contactChart");
    contactChart = new Chart(ctx11, {
        type: 'pie',
        data: {
            labels: ["999", "Station hotline", "Report at station", "Others"],
            datasets: [{
                data: [<?php
                        echo '"' . $contact999CountRow . '",';
                        echo '"' . $contactHotlineCountRow . '",';
                        echo '"' . $contactStationCountRow . '",';
                        echo '"' . $otherContactCounttRow . '",';
                        ?>],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#BA55D3'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#FF00FF'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: true
            },

            animation: {
                animateScale: true,
            }

        },
    });
</script>

<!-- Report status cahrt -->
<script>
    var ctx12 = document.getElementById('reportChart');
    var reportChart = new Chart(ctx12, {
        type: 'doughnut',
        data: {
            labels: ["Closed", "Pending", "Fake"],
            datasets: [{
                label: 'No of users',
                data: [<?php
                        echo '"' . $closedCaseCountRow . '",';
                        echo '"' . $pendingCaseCountRow . '",';
                        echo '"' . $fakeCaseCountRow . '",';
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