<?php
session_start();
$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "fms_test";

$mysqli = new mysqli($server_name, $db_username, $db_password, $db_name);

if ($mysqli) {
    /* echo '<script>alert("Database connected")</script>'; */
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
                            <a href="#" class="btn btn-primary">:( </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
}

// pie chart (user stats)
$adminCount = mysqli_query($mysqli, "SELECT id FROM register WHERE usertype='Admin'");
$adminCountRow = mysqli_num_rows($adminCount);

$userCount = mysqli_query($mysqli, "SELECT id FROM register WHERE usertype='User'");
$userCountRow = mysqli_num_rows($userCount);

$otherCount = mysqli_query($mysqli, "SELECT usertype FROM register WHERE usertype='' ");
$otherCountRow = mysqli_num_rows($otherCount);

// pie chart (Branch stats)

$stadiumCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE branch='Stadium Ipoh'");
$stadiumCaseCountRow = mysqli_num_rows($stadiumCaseCount);

$PengCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE branch='Pengkalan'");
$PengCaseCountRow = mysqli_num_rows($PengCaseCount);

$BCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE branch='AreaB'");
$BCaseCountRow = mysqli_num_rows($BCaseCount);

$CCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE branch='AreaC'");
$CCaseCountRow = mysqli_num_rows($CCaseCount);

// bar chart (Incident Type stats)

$fireCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE incidentType='Fire'");
$fireCaseCountRow = mysqli_num_rows($fireCaseCount);

$floodCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE incidentType='Flood'");
$floodCaseCountRow = mysqli_num_rows($floodCaseCount);

$AnimalCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE incidentType='Animal capture'");
$AnimalCaseCountRow = mysqli_num_rows($AnimalCaseCount);

$OtherCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE incidentType <> 'Fire' AND incidentType <> 'Flood' AND incidentType <> 'Animal Capture' ");
$OtherCaseCountRow = mysqli_num_rows($OtherCaseCount);
