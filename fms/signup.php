<?php
session_start();
include('includes/header.php');

?>

<body style="background-image: linear-gradient(-45deg, violet, blue) ;">

    <div class="container" id="beginForm">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 style="color: orange;"><i class="fas fa-fire"></i> FlameStats</h1>
                                        <hr>
                                        <h1 class="h4 text-gray-900 mb-4">Create an account</h1>
                                    </div>
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
                                    <form class="user" action="code.php" method="POST">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" id="register_name" class="form-control" placeholder="Enter Name" onkeyup="checkname();" required>
                                            <small id="name_status"></small>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-8">
                                                <label>Email</label>
                                                <input type="email" name="email" id="register_email" class="form-control check_email" placeholder="Enter Email Address..." onkeyup="checkEmail();" required>
                                                <small id="email_status"></small>
                                            </div>
                                            <div class="col-sm-4">
                                                <label>ID</label>
                                                <input type="text" name="user_id" id="register_id" class="form-control check_id" placeholder="Enter ID" onkeyup="checkUserID();" required>
                                                <small id="id_status"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label>Password</label>
                                                <input type="password" name="password" id="password_id" class="form-control" placeholder="Password" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Confirm password</label>
                                                <input type="password" name="confirmpassword" id="confirmpassword_id" class="form-control" placeholder="Repeat Password" onkeyup="checkPW();" required>
                                                <small id="password_status"></small>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Register role</label>
                                            <select name="usertype" id="" class="form-control" required>
                                                <option selected></option>
                                                <option>Admin</option>
                                                <option>User</option>
                                            </select>
                                        </div>
                                        &nbsp;
                                        &nbsp;
                                        &nbsp;
                                        <button type="submit" name="registerbtn" class="btn btn-primary btn-user btn-block"> Register Account </button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Have an account already? Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</body>







<?php
include('includes/scripts.php');

?>