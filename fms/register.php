<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Modal -->
<div class="modal fade" id="addadminprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add admin data</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="code.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label> Username </label>
                        <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                        <label> Email </label>
                        <input type="email" name="email" class="form-control check_email" placeholder="Enter Email" required>
                        <small class="error_email"></small>
                    </div>
                    <div class="form-group">
                        <label> Password </label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label> Confirm Password</label>
                        <input type="password" name="confirmpassword" id="" class="form-control" placeholder="Confirm Password">
                    </div>
                    <input type="hidden" name="usertype" value="admin">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- /.modal fade -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User List
                <button type="button" class="btn btn-primary btn-sm btn-circle float-right" data-toggle="modal" data-target="#addadminprofile">
                    <i class="fas fa-plus"></i>
                </button>
            </h6>
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
                    <caption>List of users</caption>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Status</th>
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
                                    <td class="align-middle"><?php echo $row['usertype']; ?></td>
                                    <?php
                                    if ($row['status'] == 'Enable') {
                                    ?>
                                        <td class="align-middle"><button class="btn-primary btn-sm"><?php echo $row['status']; ?></button></td>
                                    <?php
                                    } else if ($row['status'] == 'Disable') {
                                    ?>
                                        <td class="align-middle"><button class="btn-danger btn-sm"><?php echo $row['status']; ?></button></td>
                                    <?php
                                    }
                                    ?>
                                    <td class="align-middle">
                                        <div id="actionsBtn">
                                            <input type="hidden" name="view_id" value="<?php echo $row['id']; ?>">
                                            <button type="button" name="viewBtn" class="btn btn-success btn-circle btn-sm viewBtn"><i class="fas fa-eye"></i></button>
                                            &nbsp;

                                            <form action="register_edit.php" method="POST">
                                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" class="btn btn-info btn-circle btn-sm" name="edit_btn"> <i class="fas fa-edit"></i></button> </button>
                                            </form>
                                            &nbsp;
                                            <form action="code.php" method="POST">
                                                <input type="hidden" name="chg_id" value="<?php echo $row['id']; ?>">
                                                <?php if ($row['status'] == 'Enable') {
                                                ?>
                                                    <button type="submit" name="chgBtn" id="disableBtn" class="btn btn-danger btn-circle btn-sm"> <i class="fas fa-sync-alt"></i> </button>
                                                <?php
                                                } else {
                                                ?>
                                                    <button type="submit" name="chgBtn" id="enableBtn" class="btn btn-primary btn-circle btn-sm"> <i class="fas fa-check"></i> </button>
                                                <?php
                                                }
                                                ?>
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

<!-- View modal -->
<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Admin data</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>


            <div class="modal-body">
                <input type="hidden" name="viewID" id="viewID">
                <div class="form-group">
                    <label> Username </label>
                    <input type="text" name="username" id="view_username" class="form-control" disabled style="border: none;">

                </div>
                <div class="form-group">
                    <label> Email </label>
                    <input type="email" name="email" id="view_email" class="form-control check_email" disabled style="border: none;">
                </div>
                <div class="form-group">
                    <label> Password </label>
                    <input type="password" name="password" id="view_password" class="form-control" disabled style="border: none;">
                </div>
                <div class="form-group">
                    <label> Role </label>
                    <input type="text" name="usertype" id="view_usertype" class="form-control" disabled style="border: none;">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>



        </div>
    </div>
</div>
<!-- /.modal fade -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

<script>
    $(document).ready(function() {
        $('.viewBtn').on('click', function() {
            $('#viewModal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#viewID').val(data[0]);
            $('#view_username').val(data[1]);
            $('#view_email').val(data[2]);
            $('#view_password').val(data[3]);
            $('#view_usertype').val(data[4]);
        });
    });
</script>