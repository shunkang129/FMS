<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');


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
            <h6 class="m-0 font-weight-bold text-primary">Report data</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <?php
                $query = "SELECT * FROM report";
                $query_run = mysqli_query($mysqli, $query);

                ?>
                <table class="table table-md table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <caption>List of reports</caption>
                    <thead>
                        <tr>
                            <th>Report ID</th>
                            <th>Station</th>
                            <th>Incident Area</th>
                            <th>Incident Cause</th>
                            <th>Incident Date</th>
                            <th>Fatalities</th>
                            <th>Injuries</th>
                            <th>Saved</th>
                            <th>Asset Lost(RM)</th>
                            <th>Asset Recovered(RM)</th>
                            <th>Contact Method</th>
                            <th>Person In Charge</th>
                            <th>Report Status</th>
                            <th>Support Document</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                $val = $row['id'];
                                $name = $row['docName'];
                                $newID = str_pad($val, 4, "0", STR_PAD_LEFT); // append leading zeros to the report auto increment ID
                        ?>
                                <tr>
                                    <td class="align-middle"><?php echo $newID; ?></td>
                                    <td class="align-middle"><?php echo $row['branch']; ?></td>
                                    <td class="align-middle"><?php echo $row['incidentArea']; ?></td>
                                    <td class="align-middle"><?php echo $row['incidentCause']; ?></td>
                                    <td class="align-middle"><?php echo $row['reportDate']; ?></td>
                                    <td class="align-middle"><?php echo $row['victimFatality']; ?></td>
                                    <td class="align-middle"><?php echo $row['victimInjured']; ?></td>
                                    <td class="align-middle"><?php echo $row['victimSaved']; ?></td>
                                    <td class="align-middle"><?php echo $row['asset_lost']; ?></td>
                                    <td class="align-middle"><?php echo $row['asset_recover']; ?></td>
                                    <td class="align-middle"><?php echo $row['contactMethod']; ?></td>
                                    <td class="align-middle"><?php echo $row['personInCharge']; ?></td>
                                    <?php
                                    if ($row['reportStatus'] == 'Closed') {
                                    ?>
                                        <td class="align-middle"><button class="btn-primary btn-sm"><?php echo $row['reportStatus']; ?></button></td>
                                    <?php
                                    } else if ($row['reportStatus'] == 'Pending') {
                                    ?>
                                        <td class="align-middle"><button class="btn-info btn-sm"><?php echo $row['reportStatus']; ?></button></td>
                                    <?php
                                    } else {
                                    ?>
                                        <td class="align-middle"><button class="btn-danger btn-sm"><?php echo $row['reportStatus']; ?></button></td>
                                    <?php
                                    }
                                    ?>
                                    <td class="align-middle"><a href="download.php?filename=<?php echo $name ?>"><?php echo $row['docName']; ?></td>
                                    <td class="align-middle">
                                        <div id="actionsBtn">

                                            <input type="hidden" name="view_id" value="<?php echo $row['id']; ?>">
                                            <button type="button" class="btn btn-info btn-circle btn-sm viewBtn" name="viewBtn" data-toggle="tooltip" data-placement="top" title="View Report"><i class="fas fa-eye"></i></button>
                                            &nbsp;


                                            <form method="POST" action="print.php">
                                                <input type="hidden" name="printReport_id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" id="printBtn" class="btn btn-warning btn-circle btn-sm" name="printReport_btn" formtarget="_blank" data-toggle="tooltip" data-placement="top" title="Print"> <i class="fas fa-file-pdf"></i></button>&nbsp;
                                            </form>
                                            &nbsp;

                                            <?php if ($_SESSION['role'] == 'Admin') { ?>
                                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" class="btn btn-success btn-circle btn-sm editReportBtn" name="edit_btn" data-toggle="tooltip" data-placement="top" title="Edit Report"> <i class="fas fa-edit"></i></button> </button>

                                                &nbsp;

                                                <form action="code.php" method="POST">
                                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" id="deleteReportBtn" name="deleteReportBtn" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Delete Report"> <i class="fas fa-trash"></i> </button>
                                                </form>
                                            <?php
                                            }
                                            ?>


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

<!-- View report modal -->
<div class="modal fade" id="viewReportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Report Data</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Report ID</label>
                    <input type="text" name="viewID" id="viewID" class="form-control" readonly style="border: none;">
                </div>
                <div class="form-group">
                    <label> Station </label>
                    <input type="text" id="view_branch" class="form-control" disabled style="border: none;">

                </div>
                <div class="form-group">
                    <label> Incident Area </label>
                    <input type="text" id="view_incidentArea" class="form-control" disabled style="border: none;">
                </div>
                <div class="form-group">
                    <label> Incident Cause </label>
                    <input type="text" id="view_incidentCause" class="form-control" disabled style="border: none;">
                </div>
                <div class="form-group">
                    <label> Incident Date </label>
                    <input type="text" id="view_incidentDate" class="form-control" disabled style="border: none;">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label> Fatalities </label>
                        <input type="text" id="view_fatality" class="form-control" disabled style="border: none;">
                    </div>
                    <div class="form-group col-md-4">
                        <label> Injuries </label>
                        <input type="text" id="view_injury" class="form-control" disabled style="border: none;">
                    </div>
                    <div class="form-group col-md-4">
                        <label> Saved </label>
                        <input type="text" id="view_saved" class="form-control" disabled style="border: none;">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label> Asset Lost </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="border: none;">RM</span>
                            </div>
                            <input type="number" id="view_assetLost" class="form-control" disabled style="border: none;">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label> Asset Recovered </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="border: none;">RM</span>
                            </div>
                            <input type="number" id="view_assetRecover" class="form-control" disabled style="border: none;">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label> Contact Method </label>
                        <input type="text" id="view_contact" class="form-control" disabled style="border: none;">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label> Person In Charge </label>
                        <input type="text" id="view_PIC" class="form-control" disabled style="border: none;">
                    </div>
                    <div class="form-group col-md-6">
                        <label> Report Status </label>
                        <input type="text" id="view_reportStatus" class="form-control" disabled style="border: none;">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- /.modal fade -->


<!-- Edit report modal -->
<div class="modal fade" id="editReportModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Update report data</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="code.php" method="POST">
                <input type="hidden" name="update_personInCharge" value="<?php echo $data['name']; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Report ID</label>
                        <input type="text" id="update_ReportID" name="update_ReportID" class="form-control" readonly="readonly" style="font-weight: bold; font-size: 20px; border-style: none; background-color: transparent;">
                    </div>
                    <div class="form-group">
                        <label> Station </label>
                        <select name="update_branch" id="update_branch" class="form-control">
                            <option selected>Choose...</option>
                            <option>Stadium Ipoh</option>
                            <option>Pengkalan</option>
                            <option>Meru Raya</option>
                            <option>Gopeng</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label> Incident Area </label>
                        <select name="update_incidentArea" id="update_incidentArea" class="form-control">
                            <option selected>Choose...</option>
                            <option>Hulu Perak</option>
                            <option>Kinta</option>
                            <option>Manjung</option>
                            <option>Kuala Kangsar</option>
                            <option>Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Incident Cause </label>
                        <select name="update_incidentCause" id="update_incidentCause" class="form-control">
                            <option selected>Choose...</option>
                            <option>Faulty Wiring</option>
                            <option>Equipment Defective</option>
                            <option>Crime</option>
                            <option>Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Incident Date </label>
                        <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                            <input type="text" name="update_incidentDate" id="update_incidentDate" class="form-control datetimepicker-input" data-target="#datetimepicker3" />
                            <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label> Fatalities </label>
                            <div class="input-group">
                                <select name="update_fatality" id="update_fatality" class="custom-select">
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
                        <div class="form-group col-md-4">
                            <label> Injuries </label>
                            <div class="input-group">
                                <select name="update_injury" id="update_injury" class="custom-select">
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
                        <div class="form-group col-md-4">
                            <label> Saved </label>
                            <div class="input-group">
                                <select name="update_saved" id="update_saved" class="custom-select">
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
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label> Asset Lost </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RM</span>
                                </div>
                                <input type="number" id="update_assetLost" name="update_assetLost" class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label> Asset Recovered </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RM</span>
                                </div>
                                <input type="number" name="update_assetRecovered" id="update_assetRecovered" class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Contact Method</label>
                            <select name="update_contact" id="update_contact" class="form-control">
                                <option selected>999</option>
                                <option>Station Hotline</option>
                                <option>Report at station</option>
                                <option>Others</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Report Status</label>
                            <select name="update_reportStatus" id="update_reportStatus" class="form-control">
                                <option selected>Closed</option>
                                <option>Pending</option>
                                <option>Fake</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="editReportButton" class="btn btn-success">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- /.modal fade -->


<?php


include('includes/scripts.php');
include('includes/footer.php');


?>

<!-- Scripts to trigger modal and pass data from datatables -->
<script>
    $(document).ready(function() {
        $("body").on("click", ".editReportBtn", function(event) {

            $('#editReportModal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_ReportID').val(data[0]);
            $('#update_branch').val(data[1]);
            $('#update_incidentArea').val(data[2]);
            $('#update_incidentCause').val(data[3]);
            $('#update_incidentDate').val(data[4]);
            $('#update_fatality').val(data[5]);
            $('#update_injury').val(data[6]);
            $('#update_saved').val(data[7]);
            $('#update_assetLost').val(data[8]);
            $('#update_assetRecovered').val(data[9]);
            $('#update_contact').val(data[10]);
            $('#view_PIC').val(data[11]);
            $('#update_reportStatus').val(data[12]);
        });

        $("body").on("click", ".viewBtn", function(event) {

            $('#viewReportModal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#viewID').val(data[0]);
            $('#view_branch').val(data[1]);
            $('#view_incidentArea').val(data[2]);
            $('#view_incidentCause').val(data[3]);
            $('#view_incidentDate').val(data[4]);
            $('#view_fatality').val(data[5]);
            $('#view_injury').val(data[6]);
            $('#view_saved').val(data[7]);
            $('#view_assetLost').val(data[8]);
            $('#view_assetRecover').val(data[9]);
            $('#view_contact').val(data[10]);
            $('#view_PIC').val(data[11]);
            $('#view_reportStatus').val(data[12]);

        });
    });
</script>