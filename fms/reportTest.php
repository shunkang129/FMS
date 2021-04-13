<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');
date_default_timezone_set("Asia/Kuala_Lumpur");

?>

<div class="container-fluid">

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

            <?php
            if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert"> ' . $_SESSION['success'] . ' 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span> </button></div>';
                unset($_SESSION['success']);
            }

            if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"> ' . $_SESSION['status'] . ' 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span> </button></div>';
                unset($_SESSION['status']);
            }

            ?>
            <form action="code.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Branch</label>
                        <select name="branch" class="form-control">
                            <option selected>Choose...</option>
                            <option>Stadium Ipoh</option>
                            <option>Pengkalan</option>
                            <option>AreaB</option>
                            <option>AreaC</option>
                        </select>
                    </div>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    <div class="form-group col-md-4">
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

                    <div class="form-group col-md-4">
                        <label for="">Incident datetime</label>
                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" />
                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Incident DATE ONLY</label>
                        <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                            <input type="text" name="report_date" class="form-control datetimepicker-input" data-target="#datetimepicker2" />
                            <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
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

<div class="container-fluid">

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Added report data</h6>
        </div>
        <div class="card-body">


            <div class="table-responsive">
                <?php
                $query = "SELECT * FROM report";
                $query_run = mysqli_query($mysqli, $query);
                ?>
                <table class="table table-md table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <caption>List of admins</caption>
                    <thead>
                        <tr>
                            <th>Branch</th>
                            <th>Incident Type</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                                <tr>
                                    <td class="align-middle"><?php echo $row['branch']; ?></td>
                                    <td class="align-middle"><?php echo $row['incidentType']; ?></td>
                                    <td class="align-middle"><?php echo $row['reportDate']; ?></td>
                                    <td class="align-middle">
                                        <div id="actionsBtn">
                                            <form action="register_edit.php" method="POST">
                                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" class="btn btn-info btn-circle btn-sm" name="edit_btn"> <i class="fas fa-edit"></i></button> </button>
                                            </form>
                                            &nbsp;
                                            <form action="code.php" method="POST">
                                                <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" name="deletebtn" class="btn btn-danger btn-circle btn-sm"> <i class="fas fa-times"></i> </button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "No record found";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>






</div>





<?php

include('includes/scripts.php');
include('includes/footer.php');

?>