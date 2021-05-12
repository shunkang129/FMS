<?php
session_start();
$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "fms";

$mysqli = new mysqli($server_name, $db_username, $db_password, $db_name);

if ($mysqli) {
    /* echo '<script>alert("Database connected")</script>'; */ // To test database connection
} else {
    die("Connection failed: " . mysqli_connect_error());
    echo '
    <div class="container">
        <div class="row">
            <div class="col-md-8 mr-auto ml-auto text-center py-5 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title bg-danger text-white"> Database Connection Failed </h1>
                        <h2 class="card-title"> Database Failure</h2>
                        <p class="card-text"> Please Check Your Database Connection.</p>
                        <a href="login.php" class="btn btn-primary"> Try again :( </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';
}
