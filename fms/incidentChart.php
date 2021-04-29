<?php

include('security.php');
include('chartSetup.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">General Statistics</h1>
    </div>

    <div class="row">
        <!-- total cases count card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total cases
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <?php


                                $query = "SELECT id FROM report ORDER BY id";
                                $query_run = mysqli_query($mysqli, $query);

                                $row = mysqli_num_rows($query_run);

                                echo '<i class="fas fa-h1">' . $row . '</i>';
                                ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- total victim count card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total victims
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                echo '<i class="fas fa-h1">' . $totalVictimCount . '</i>';

                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exclamation fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- total system users count card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total users
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                echo '<i class="fas fa-h1">' . $otherCountRow . '</i>';

                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <!-- Area Chart -->
            <div class="card shadow mb-6">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Amount Of Cases On Station (Branch Stats)</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="pieChart1" height="180"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <!-- Bar Chart -->
            <div class="card shadow mb-6">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Report Status Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="reportChart" height="180"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Incident Statistics</h1>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Incident Causes (Polar Chart)</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="myPolarChart" height="180"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Incident Area Statistics</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="incidentBarChart" height="180"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Case & Victim Count Over Month</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="testingChart" height="100"></canvas>
                    </div>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Case Count Over Day</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="testingChart3" height="100"></canvas>
                    </div>
                    <hr class="align-center">
                </div>
            </div>
        </div>
    </div>

</div>




<?php

include('includes/scripts.php');
include('includes/footer.php');

?>