<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
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
                            echo '<div class="alert alert-danger alert-dismissible fade show" id="message" role="alert"> ' . $_SESSION['status'] . ' 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span> </button></div>';
                            unset($_SESSION['status']);
                        }
                        ?>
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <!-- DataTables Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
                </div>
                <div class="card-body">

                    <?php

                    $profile_username = $_SESSION['display'];
                    $query = "SELECT * FROM register WHERE name='$profile_username'";
                    $query_run = mysqli_query($mysqli, $query);
                    $data = mysqli_fetch_assoc($query_run);

                    foreach ($query_run as $row) {
                    ?>

                        <form action="code.php" method="POST">
                            <input type="hidden" id="updateID" name="edit_id" value="<?php echo $row['id'] ?>">
                            <div class="form-group">
                                <label> Name </label>
                                <input type="text" value="<?php echo $row['name'] ?>" name="edit_username" class="form-control" placeholder="Enter Username" readonly>
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
                                <input type="password" name="edit_password" class="form-control" placeholder="Enter Old/New Password" required>
                            </div>
                            <div class="form-group">
                                <label> Role </label>
                                <input type="text" value="<?php echo $row['usertype'] ?>" name="update_usertype" class="form-control" readonly>
                            </div>

                            <button type="submit" name="updateProfilebtn" class="btn btn-primary float-right"><i class="fas fa-edit"></i> Update </button>

                        </form>
                    <?php
                    }

                    ?>


                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>