<?php
include('security.php');
include('chartSetup.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Victim Info</h1>
    </div>
    <!-- fatalities count info panel card -->
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
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- injuries count info panel card -->
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
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- saved count info panel card -->
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
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- total victim count info panel card -->
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
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    <h6 class="m-0 font-weight-bold text-primary">Victim Contact Method</h6>
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
                    <h6 class="m-0 font-weight-bold text-primary">Lost & Recovered Amount Asset Over Month</h6>
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