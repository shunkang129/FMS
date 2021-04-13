<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<!-- Modal -->

<div class="modal fade" id="facultyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="faculty_name" class="form-control" placeholder="Enter Name" required>
                    </div>
                    <div class="mb-3">
                        <label>Designation</label>
                        <input type="text" name="faculty_designation" class="form-control" placeholder="Enter Designation" required>
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <input type="text" name="faculty_description" class="form-control" placeholder="Enter Description" required>
                    </div>
                    <div class="mb-3">
                        <label>Upload Image</label>
                        <input type="file" name="faculty_image" id="file_image" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="save_faculty" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="container-fluid">

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col">
                    <h6 class="m-0 font-weight-bold text-primary">Admin Profile</h6>
                </div>
                <div class="col" align="right">
                    <button type="button" class="btn btn-primary btn-circle btn-sm float-right" data-toggle="modal" data-target="#facultyModal">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
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
                echo '<div class="modal fade" id="myModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Error</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>' . $_SESSION['status'] . '</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>';
                unset($_SESSION['status']);
            }
            ?>

            <div class="table-responsive">

                <?php
                $query = "SELECT * FROM faculty";
                $query_run = mysqli_query($mysqli, $query);

                if (mysqli_num_rows($query_run) > 0) {

                ?>

                    <table class="table table-md table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <caption>List of data</caption>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($query_run)) {
                            ?>
                                <tr>
                                    <td class="align-middle"><?php echo $row['id']; ?></td>
                                    <td class="align-middle"><?php echo $row['name']; ?></td>
                                    <td class="align-middle"><?php echo $row['designation']; ?></td>
                                    <td class="align-middle"><?php echo $row['description']; ?></td>
                                    <!-- <td><?php echo $row['images']; ?></td> -->
                                    <td class="align-middle"><?php echo '<img src="upload/' . $row['images'] . '" width="80px;" height="80px;" alt="image">'; ?></td>
                                    <td class="align-middle">
                                        <div id="actionsBtn">
                                            <button type="submit" id="editBtn" class="btn btn-warning btn-circle btn-sm align-center" name="edit_btn"> <i class="fas fa-edit"></i></button>&nbsp;
                                            <form method="POST" action="print.php">
                                                <input type="hidden" name="print_id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" id="printBtn" class="btn btn-info btn-circle btn-sm align-center" name="print_btn"> <i class="fas fa-file-pdf"></i></button>&nbsp;
                                            </form>
                                            <button type="submit" id="delBtn" class="btn btn-danger btn-circle btn-sm align-center" name="delete_btn"> <i class="fas fa-times"></i></button>
                                        </div>
                                    </td>

                                </tr>
                            <?php
                            }

                            ?>



                        <?php
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