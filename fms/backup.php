<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
date_default_timezone_set("Asia/Kuala_Lumpur");

?>



<div class="container-fluid">


    <div class="row">
        <div class="col-md-8">
            <div class="card-header py-3">
                <div class="row">

                    <div class="col">
                        <?php

                        if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                            echo '<div class="alert alert-success alert-dismissible fade show" id="message" role="alert"> ' . $_SESSION['success'] . ' 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span> </button></div>';
                            unset($_SESSION['success']);
                        }

                        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                            echo '<div class="alert alert-danger alert-dismissible fade show" id="message"  role="alert"> ' . $_SESSION['status'] . ' 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span> </button></div>';
                            unset($_SESSION['status']);
                        }
                        ?>
                        <h1 class="h3 mb-0 text-gray-800">Backup Database</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <!-- DataTables Example -->
            <div class="card shadow">
                <div class="card-header ">
                    <h6 class="m-0 font-weight-bold text-primary">Database</h6>
                    <h6 class="m-0 font-weight-bold text-dark float-right"><?php echo date('Y-m-d H:i'); ?></h6>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-md table-bordered table-hover" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Database</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle"><?php echo $_SESSION['display'] . '_' . date("Y-M-d") . '.sql'; ?></td>
                                    <td class="align-middle">
                                        <div id="actionsBtn">

                                            <form action="code.php" method="POST">
                                                <div class="form-row float-right">
                                                    <button type="submit" name="backup" class="btn btn-primary btn-md"> <i class="fas fa-file-export"></i> Backup </button>
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    <button type="submit" name="download" class="btn btn-primary btn-md"> <i class="fas fa-file-download"></i> Download </button>
                                                </div>
                                            </form>
                                        </div>

                                    </td>
                                </tr>

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>




<?php
include('includes/scripts.php');
include('includes/footer.php');
?>