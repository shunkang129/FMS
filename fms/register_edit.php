<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Admin Profile</h6>
        </div>
        <div class="card-body">

            <?php

            if (isset($_POST['edit_btn'])) {
                $id = $_POST['edit_id'];

                $query = "SELECT * FROM register WHERE id='$id' ";
                $query_run = mysqli_query($mysqli, $query);

                foreach ($query_run as $row) {
            ?>

                    <form action="code.php" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                        <div class="form-group">
                            <label> Name </label>
                            <input type="text" value="<?php echo $row['name'] ?>" name="edit_username" class="form-control" placeholder="Enter Username" required>
                        </div>
                        <div class="form-group">
                            <label> Email </label>
                            <input type="email" value="<?php echo $row['email'] ?>" name="edit_email" class="form-control" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group">
                            <label> ID </label>
                            <input type="text" value="<?php echo $row['user_ID'] ?>" name="edit_accountID" class="form-control" placeholder="Enter ID" required>
                        </div>
                        <div class="form-group">
                            <label> Password </label>
                            <input type="password" value="<?php echo $row['password'] ?>" name="edit_password" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label> Role </label>
                            <select name="update_usertype" class="form-control">
                                <option selected><?php echo $row['usertype'] ?></option>
                                <option>Admin</option>
                                <option>User</option>
                            </select>
                        </div>


                        <a href="register.php" class="btn btn-danger"> Cancel </a>
                        <button type="submit" name="updatebtn" class="btn btn-success"> Update </button>
                    </form>
            <?php
                }
            }
            ?>


        </div>
    </div>

</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>