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
            <h6 class="m-0 font-weight-bold text-primary">Admin Profile
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addadminprofile">
                    Add Admin Profile
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
                    <caption>List of admins</caption>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
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