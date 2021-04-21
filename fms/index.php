<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate
            Report</a>
    </div>

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
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
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Admin
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                echo '<i class="fas fa-h1">' . $adminCountRow . '</i>';

                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total users with user role
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                echo '<i class="fas fa-h1">' . $userCountRow . '</i>';

                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Other Users
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                echo '<i class="fas fa-h1">' . $otherCountRow . '</i>';

                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pie Chart (branch stats)</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="pieChart1" height="165"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bar Chart (incident stats)</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="incidentBarChart" height="165"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Incident causes</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="myPolarChart" height="180"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="myChart" height="180"></canvas>
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
                    <h6 class="m-0 font-weight-bold text-primary">Amount of cases over month</h6>
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
                    <h6 class="m-0 font-weight-bold text-primary">Case amount over day</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="testingChart3" height="100"></canvas>
                    </div>
                    <hr class="align-center">
                    A time series chart of amount of cases over days.
                </div>
            </div>
        </div>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Victim Info</h1>
    </div>
    <!-- victim info panel card -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total fatalities
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <?php
                                echo '<i class="fas fa-h1">' . $fatalityCount . '</i>';
                                ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Injuries
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                echo '<i class="fas fa-h1">' . $injuredCount . '</i>';

                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Saved
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                echo '<i class="fas fa-h1">' . $saveCount . '</i>';

                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
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
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- victim amount chart -->
    <div class="row">
        <div class="col">
            <!-- donut Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User Chart</h6>
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
    </div>
    <!-- victim asset loss & recovered chart -->
    <div class="row">
        <div class="col">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Amount of lost and recovered asset over time</h6>
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