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

$meruCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE branch='Meru Raya'");
$meruCaseCountRow = mysqli_num_rows($meruCaseCount);

$gopengCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE branch='Gopeng'");
$gopengCaseCountRow = mysqli_num_rows($gopengCaseCount);

// bar chart (Incident Type stats)

$fireCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE incidentType='Fire'");
$fireCaseCountRow = mysqli_num_rows($fireCaseCount);

$floodCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE incidentType='Flood'");
$floodCaseCountRow = mysqli_num_rows($floodCaseCount);

$AnimalCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE incidentType='Animal capture'");
$AnimalCaseCountRow = mysqli_num_rows($AnimalCaseCount);

$OtherCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE incidentType <> 'Fire' AND incidentType <> 'Flood' AND incidentType <> 'Animal Capture' ");
$OtherCaseCountRow = mysqli_num_rows($OtherCaseCount);

// polar chart (incident cause stats)

$wiringCauseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE incidentCause='Faulty Wiring'");
$wiringCauseCountRow = mysqli_num_rows($wiringCauseCount);

$equipmentCauseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE incidentCause='Equipment Defective'");
$equipmentCauseCountRow = mysqli_num_rows($equipmentCauseCount);

$crimeCauseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE incidentCause='Crime'");
$crimeCauseCountRow = mysqli_num_rows($crimeCauseCount);

$otherCauseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE incidentCause='Others'");
$otherCauseCountRow = mysqli_num_rows($otherCauseCount);

// victim info

$fataCount = mysqli_query($mysqli, "SELECT SUM(victimFatality) AS fatalityNumber FROM report");
if (mysqli_num_rows($fataCount) > 0) {
    $row = mysqli_fetch_assoc($fataCount);
}
$fatalityCount = $row['fatalityNumber'];

$injuryCount = mysqli_query($mysqli, "SELECT SUM(victimInjured) AS injuryNumber FROM report");
if (mysqli_num_rows($fataCount) > 0) {
    $row = mysqli_fetch_assoc($injuryCount);
}
$injuredCount = $row['injuryNumber'];

$savedCount = mysqli_query($mysqli, "SELECT SUM(victimSaved) AS savedNumber FROM report");
if (mysqli_num_rows($savedCount) > 0) {
    $row = mysqli_fetch_assoc($savedCount);
}
$saveCount = $row['savedNumber'];

$victimCount = mysqli_query($mysqli, "SELECT SUM(victimFatality + victimInjured + victimSaved) AS totalVictim FROM report");
if (mysqli_num_rows($victimCount) > 0) {
    $row = mysqli_fetch_assoc($victimCount);
}
$totalVictimCount = $row['totalVictim'];
