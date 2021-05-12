<?php

$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "fms";

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

// user stats
$adminCount = mysqli_query($mysqli, "SELECT id FROM register WHERE usertype='Admin'");
$adminCountRow = mysqli_num_rows($adminCount);

$userCount = mysqli_query($mysqli, "SELECT id FROM register WHERE usertype='User'");
$userCountRow = mysqli_num_rows($userCount);

$otherCount = mysqli_query($mysqli, "SELECT id FROM register");
$otherCountRow = mysqli_num_rows($otherCount);

$enableCount = mysqli_query($mysqli, "SELECT id FROM register WHERE `status`='Enable'");
$enableCountRow = mysqli_num_rows($enableCount);

$disableCount = mysqli_query($mysqli, "SELECT id FROM register WHERE `status`='Disable'");
$disableCountRow = mysqli_num_rows($disableCount);


// pie chart (Branch stats)

$stadiumCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE branch='Stadium Ipoh'");
$stadiumCaseCountRow = mysqli_num_rows($stadiumCaseCount);

$PengCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE branch='Pengkalan'");
$PengCaseCountRow = mysqli_num_rows($PengCaseCount);

$meruCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE branch='Meru Raya'");
$meruCaseCountRow = mysqli_num_rows($meruCaseCount);

$gopengCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE branch='Gopeng'");
$gopengCaseCountRow = mysqli_num_rows($gopengCaseCount);

// report status statistics

$closedCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE reportStatus='Closed'");
$closedCaseCountRow = mysqli_num_rows($closedCaseCount);

$pendingCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE reportStatus='Pending'");
$pendingCaseCountRow = mysqli_num_rows($pendingCaseCount);

$fakeCaseCount = mysqli_query($mysqli, "SELECT id FROM report WHERE reportStatus='Fake'");
$fakeCaseCountRow = mysqli_num_rows($fakeCaseCount);


// bar chart (Incident Area stats)

$Area1Count = mysqli_query($mysqli, "SELECT id FROM report WHERE incidentArea='Hulu Perak'");
$Area1CountRow = mysqli_num_rows($Area1Count);

$Area2Count = mysqli_query($mysqli, "SELECT id FROM report WHERE incidentArea='Kinta'");
$Area2CountRow = mysqli_num_rows($Area2Count);

$Area3Count = mysqli_query($mysqli, "SELECT id FROM report WHERE incidentArea='Manjung'");
$Area3CountRow = mysqli_num_rows($Area3Count);

$Area4Count = mysqli_query($mysqli, "SELECT id FROM report WHERE incidentArea='Kuala Kangsar'");
$Area4CountRow = mysqli_num_rows($Area4Count);

$OtherAreaCount = mysqli_query($mysqli, "SELECT id FROM report WHERE incidentArea ='Others' ");
$OtherAreaCountRow = mysqli_num_rows($OtherAreaCount);

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

// contact method stats
$contact999Count = mysqli_query($mysqli, "SELECT id FROM report WHERE contactMethod='999'");
$contact999CountRow = mysqli_num_rows($contact999Count);

$contactHotlinecount = mysqli_query($mysqli, "SELECT id FROM report WHERE contactMethod='Station Hotline'");
$contactHotlineCountRow = mysqli_num_rows($contactHotlinecount);

$contactStationCount = mysqli_query($mysqli, "SELECT id FROM report WHERE contactMethod='Report at station'");
$contactStationCountRow = mysqli_num_rows($contactStationCount);

$otherContactCount = mysqli_query($mysqli, "SELECT id FROM report WHERE contactMethod='Others'");
$otherContactCounttRow = mysqli_num_rows($otherContactCount);
