<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');
date_default_timezone_set("Asia/Kuala_Lumpur");

?>

<div class="container-fluid">
    <?php
    if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
        echo '<div class="alert alert-success alert-dismissible fade show" id="message" role="alert"> ' . $_SESSION['success'] . ' 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span> </button></div>';
        unset($_SESSION['success']);
    }

    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        echo '<div class="alert alert-danger alert-dismissible fade show" id="message" role="alert"> ' . $_SESSION['status'] . ' 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span> </button></div>';
        unset($_SESSION['status']);
    }
    $profile_username = $_SESSION['display'];
    $query = "SELECT * FROM register WHERE name='$profile_username'";
    $query_run = mysqli_query($mysqli, $query);
    $data = mysqli_fetch_assoc($query_run);
    ?>
    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col">
                    <h6 class="m-0 font-weight-bold text-primary">Add new report (Testing)</h6>
                </div>
                <div class="col">
                    <h6 class="m-0 font-weight-bold text-dark float-right"><?php echo date('Y-m-d H:i'); ?></h6>
                </div>
            </div>
        </div>
        <div class="card-body">


            <h6 class="m-0 font-weight-bold text-secondary">Branch info</h6>
            &nbsp;
            &nbsp;
            &nbsp;
            <form action="code.php" method="POST">
                <input type="hidden" name="personInCharge" value="<?php echo $data['name']; ?>">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Branch</label>
                        <select name="branch" class="form-control">
                            <option selected>Choose...</option>
                            <option>Stadium Ipoh</option>
                            <option>Pengkalan</option>
                            <option>Meru Raya</option>
                            <option>Gopeng</option>
                        </select>
                    </div>
                </div>
                <hr>
                <h6 class="m-0 font-weight-bold text-secondary">Incident info</h6>
                &nbsp;
                &nbsp;
                &nbsp;
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Incident Type</label>
                        <select name="incidentType" class="form-control">
                            <option selected>Choose...</option>
                            <option>Fire</option>
                            <option>Flood</option>
                            <option>Animal capture</option>
                            <option>Others</option>
                        </select>
                    </div>
                    &nbsp;
                    &nbsp;
                    &nbsp;

                    <div class="form-group col-md-3">
                        <label>Incident Cause</label>
                        <select name="incidentCause" class="form-control">
                            <option selected>Choose...</option>
                            <option>Faulty Wiring</option>
                            <option>Equipment Defective</option>
                            <option>Crime</option>
                            <option>Others</option>
                        </select>
                    </div>
                    &nbsp;
                    &nbsp;
                    &nbsp;

                    <div class="form-group col-md-3">
                        <label for="">Incident DATE ONLY</label>
                        <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                            <input type="text" name="report_date" class="form-control datetimepicker-input" data-target="#datetimepicker2" />
                            <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <h6 class="m-0 font-weight-bold text-secondary">Victim info</h6>
                &nbsp;
                &nbsp;
                &nbsp;

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Fatalities</label>
                        <div class="input-group">
                            <select name="fatality" class="custom-select">
                                <option selected>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect02">Person</label>
                            </div>
                        </div>
                    </div>
                    &nbsp;
                    &nbsp;

                    <div class="form-group col-md-2">
                        <label>Injured</label>
                        <div class="input-group">
                            <select name="injured" class="custom-select">
                                <option selected>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect02">Person</label>
                            </div>

                        </div>
                    </div>
                    &nbsp;
                    &nbsp;

                    <div class="form-group col-md-2">
                        <label>Saved</label>
                        <div class="input-group">
                            <select name="saved" class="custom-select">
                                <option selected>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect02">Person</label>
                            </div>

                        </div>
                    </div>
                </div>
                &nbsp;
                &nbsp;

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Assets damaged/lost</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">RM</span>
                            </div>
                            <input type="number" name="assetLost" class="form-control" placeholder="enter amount..">
                        </div>
                    </div>
                    &nbsp;
                    &nbsp;


                    <div class="form-group col-md-2">
                        <label>Assets Recovered</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">RM</span>
                            </div>
                            <input type="number" name="assetRecovered" class="form-control" placeholder="enter amount..">
                        </div>
                    </div>
                </div>


                <div class="row float-right">
                    <button type="submit" class="btn btn-dark">Clear all</button>
                    &nbsp;
                    &nbsp;
                    <button type="submit" class="btn btn-primary" name="addReportBtn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php

include('includes/scripts.php');
include('includes/footer.php');

?>