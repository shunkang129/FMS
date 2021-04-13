<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');


?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Report Data</h6>
        </div>
        <div class="card-body">

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
            ?>

            <div class="table-responsive">
                <?php
                $query = "SELECT * FROM register";
                $query_run = mysqli_query($mysqli, $query);
                ?>
                <table class="table table-md table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <caption>List of report data</caption>
                    <thead>
                        <tr>
                            <th>Report No.</th>
                            <th>Incident Type</th>
                            <th>Incident DateTime</th>
                            <th>Incident Status</th>
                            <th>Person In-Charge</th>
                            <th>Injured</th>
                            <th>Saved</th>
                            <th>Fatality</th>
                            <th>Contact method</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                                <tr>
                                    <td class="align-middle"><?php echo $row['user_ID']; ?></td>
                                    <td class="align-middle"><?php echo $row['name']; ?></td>
                                    <td class="align-middle"><?php echo $row['email']; ?></td>
                                    <td class="align-middle"><?php echo $row['password']; ?></td>
                                    <td class="align-middle"><?php echo $_SESSION['display']; ?></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"><?php echo $row['usertype']; ?></td>
                                    <td class="align-middle">
                                        <div id="actionsBtn">
                                            <form action="register_edit.php" method="POST">
                                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" class="btn btn-info btn-circle btn-sm" name="edit_btn"> <i class="fas fa-edit"></i></button> </button>
                                            </form>
                                            &nbsp;
                                            <form action="code.php" method="POST">
                                                <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" name="deletebtn" class="btn btn-danger btn-circle btn-sm" id="delBtn"> <i class="fas fa-times"></i> </button>
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