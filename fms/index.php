<?php
include('security.php');
include('chartSetup.php');
include('includes/header.php');
include('includes/navbar.php');

?>


<!-- Begin Page Content -->
<div class="container-fluid ">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Fire Incident Management System Dashboard</h1>
    </div>

    <div class="row">
        <!-- total total cases count card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
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
                            <i class="fas fa-file-alt fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- total closed cases count card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Closed Cases
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                echo '<i class="fas fa-h1">' . $closedCaseCountRow . '</i>';

                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- total pending cases count card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Pending cases
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                echo '<i class="fas fa-h1">' . $pendingCaseCountRow . '</i>';

                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-spinner fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- total fake cases count card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Fake Cases reported
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                echo '<i class="fas fa-h1">' . $fakeCaseCountRow . '</i>';

                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exclamation-triangle fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card shadow mb-4">
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

    </div>

    <div class="row">
        <div class="col-xl">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Incident Area Statistics</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="incidentBarChart" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
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

    <!-- victim info section starts here -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Victim Info</h1>
    </div>

    <!-- victim chart section starts here -->
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Victim Status Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="donutChart" height="400"></canvas>
                    </div>
                    <hr>
                    <span class="d-flex justify-content-center">Total amount of victims: &nbsp; <span class="m-0 font-weight-bold text-danger"><?php echo $totalVictimCount ?></span> &nbsp; person.</span>
                </div>

            </div>
        </div>
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Victim contact method</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="contactChart" height="450"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lost & Recovered Asset Amount Over Month</h6>
                    <div class="form-inline float-right">
                        <label class="m-0 font-weight-bold text-primary">Chart Type</label>
                        &nbsp;
                        <select name="chartType" id="chartType" class="form-control" onchange="updateChartType()">
                            <option value="line">Line</option>
                            <option value="bar">Bar</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="assetChart" height="100"></canvas>
                    </div>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');

?>