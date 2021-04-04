<?php
session_start();
include('includes/header.php');

?>

<body style="background-image: linear-gradient(45deg, blue, aqua) ;">

    <div class="container" id="beginForm">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6 align-self-center">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">

                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>

                                        <?php
                                        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"> ' . $_SESSION['status'] . ' 
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span> </button></div>';
                                            unset($_SESSION['status']);
                                        }
                                        ?>

                                    </div>
                                    <form class="user" action="code.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control " placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control " placeholder="Password">
                                        </div>
                                        <button type="submit" name="loginbtn" class="btn btn-primary  btn-block"> Login </button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="signup.php">Don't have an account?</a>
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