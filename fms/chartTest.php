<?php

session_start();
require "dbconfig.php";

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js' integrity='sha512-hZf9Qhp3rlDJBvAKvmiG+goaaKRZA6LKUO35oK6EsM0/kjPK32Yw7URqrq3Q+Nvbbt8Usss+IekL7CRn83dYmw==' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="styles.css">
    <title>trying</title>
</head>

<body>
    <div class="container">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        let ctx = document.getElementById('myChart');
        let myChart = new Chart(ctx, {
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
</body>

</html>