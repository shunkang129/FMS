<?php

include('security.php');
require_once('class/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

$document = new Dompdf();

$file_name = '';


if (isset($_POST['print_btn'])) {
    $id = $_POST['print_id'];

    $query = "SELECT * FROM faculty WHERE id='$id' ";
    $query_run = mysqli_query($mysqli, $query);

    $file_name = $id . '.pdf';

    $output = '<table width="100%" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th >ID</th>
            <th >Name</th>
            <th >Designation</th>
            <th >Description</th>
        </tr>

    ';

    $output .= '';

    while ($row = mysqli_fetch_assoc($query_run)) {
        $output .= '
        
        <tr>
            <td align="center">' . $row['id'] . '</td>
            <td align="center">' . $row['name'] . '</td>
            <td align="center">' . $row['designation'] . '</td>
            <td align="center">' . $row['description'] . '</td>
        </tr>
        ';
    }

    $output .= '</table>';

    $document->loadhtml($output, 'UTF-8');

    $document->setPaper('A4');
    $document->render(); // Get output of the pdf in browser

    ob_end_clean();

    // Attachment 0 = Preview // 1 = Download
    $document->stream("$file_name", array("Attachment" => 0));
}

if (isset($_POST['printReport_btn'])) {
    $id = $_POST['printReport_id'];

    $query = "SELECT * FROM report WHERE id='$id' ";
    $query_run = mysqli_query($mysqli, $query);

    $output = '<table width="100%" border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ReportID</th>
        <th>Branch</th>
        <th>Incident Type</th>
        <th>Incident Date</th>
        <th>Fatalities</th>
        <th>Injuries</th>
        <th>Saved</th>
        <th>Asset Lost</th>
        <th>Asset Recovered</th>
    </tr>

    ';

    $output .= '';

    while ($row = mysqli_fetch_assoc($query_run)) {
        $val = $row['id'];
        $newID = str_pad($val, 4, "0", STR_PAD_LEFT); // append leading zeros to the report auto increment ID
        $file_name = 'Report' . $newID . '.pdf';
        $output .= '
        
        <tr>
            <td align="center">' . $newID . '</td>
            <td align="center">' . $row['branch'] . '</td>
            <td align="center">' . $row['incidentType'] . '</td>
            <td align="center">' . $row['reportDate'] . '</td>
            <td align="center">' . $row['victimFatality'] . '</td>
            <td align="center">' . $row['victimInjured'] . '</td>
            <td align="center">' . $row['victimSaved'] . '</td>
            <td align="center">RM' . $row['asset_lost'] . '</td>
            <td align="center">RM' . $row['asset_recover'] . '</td>
        </tr>
        ';
    }

    $output .= '</table>';

    $document->loadhtml($output, 'UTF-8');

    $document->setPaper('A4');
    $document->render(); // Get output of the pdf in browser

    ob_end_clean();

    // Attachment 0 = Preview // 1 = Download
    $document->stream("$file_name", array("Attachment" => 0));
}
