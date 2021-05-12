<?php

include('security.php');
require_once('class/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

$document = new Dompdf();

$file_name = '';

if (isset($_POST['printReport_btn'])) {
    $id = $_POST['printReport_id'];

    $query = "SELECT * FROM report WHERE id='$id' ";
    $query_run = mysqli_query($mysqli, $query);


    while ($row = mysqli_fetch_assoc($query_run)) {
        $output = '

    <h4 align="center" style="font-size:36px;">BOMBA  <br /><span style="font-size:16px">' . $row['branch'] . '</span></h4>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family:Arial, san-sarif">';


        $val = $row['id'];
        $newID = str_pad($val, 4, "0", STR_PAD_LEFT); // append leading zeros to the report auto increment ID
        $output .=

            '<tr>
        <td align="left">
            <br />
            <br />
            <span style="font-size:16px;"><b>Report created time : </b>' . $row['reportCreateTime'] . '</span>
            <br />
            <br />
        </td>
        <td align="right">
        <br />
            <span style="font-size:16px;"><b>Report No. : </b>' . $newID . '</span>
            <br />
        </td>
    </tr>
    </table>';

        $output .= '
    <hr>
    <h4>Incident information</h4>
	<table width="60%" border="0" cellpadding="0" cellspacing="0" style="font-family:Arial, san-sarif">
    <tr>
    <th ></th>
    <th ></th>
    </tr>';
        $output .=
            '<tr>
        <td align="left">
            <span style="font-size:16px;"><b>Incident Date : </b></span>
            <hr style=" border: 1px dotted black;">
            <span style="font-size:16px;"><b>Incident Area: </b></span>
            <hr style=" border: 1px dotted black;">
            <span style="font-size:16px;"><b>Incident Cause : </b></span>
            <hr style=" border: 1px dotted black;">
        </td>
        
        <td align="left">
            <span style="font-size:16px;">' . $row['reportDate'] . '</span>
            <hr style=" border: 1px dotted black;">
            <span style="font-size:16px;">' . $row['incidentArea'] . '</span>
            <hr style=" border: 1px dotted black;">
            <span style="font-size:16px;">' . $row['incidentCause'] . '</span>
            <hr style=" border: 1px dotted black;">
        </td>
    </tr>
    </table>
    <br>';


        $output .= '
    <hr>
    <h4>Victim information</h4>
	<table width="60%" border="0" cellpadding="0" cellspacing="0" style="font-family:Arial, san-sarif;">
    <tr>
        <th ></th>
        <th ></th>
    </tr>';

        $output .=
            '<tr>
        <td align="left">
            <span style="font-size:16px;"><b>Contact Method: </b></span>
            <hr style=" border: 1px dotted black;">
            <span style="font-size:16px;"><b>Fatality: </b></span>
            <hr style=" border: 1px dotted black;">
            <span style="font-size:16px;"><b>Injury : </b></span>
            <hr style=" border: 1px dotted black;">
            <span style="font-size:16px;"><b>Saved : </b></span>
            <hr style=" border: 1px dotted black;">
            <span style="font-size:16px;"><b>Asset lost : </b></span>
            <hr style=" border: 1px dotted black;">
            <span style="font-size:16px;"><b>Asset recovered : </b></span>
            <hr style=" border: 1px dotted black;">
        </td>
        <td align="left">
            <span style="font-size:16px;">' . $row['contactMethod'] . '</span>
            <hr style=" border: 1px dotted black;">
            <span style="font-size:16px;">' . $row['victimFatality'] . ' person</span>
            <hr style=" border: 1px dotted black;">
            <span style="font-size:16px;">' . $row['victimInjured'] . ' person</span>
            <hr style=" border: 1px dotted black;">
            <span style="font-size:16px;">' . $row['victimSaved'] . ' person</span>
            <hr style=" border: 1px dotted black;">
            <span style="font-size:16px;">RM' . $row['asset_lost'] . '</span>
            <hr style=" border: 1px dotted black;">
            <span style="font-size:16px;">RM' . $row['asset_recover'] . '</span>
            <hr style=" border: 1px dotted black;">
        </td>
    </tr>
    </table>
    <br>
    <hr>
    <h4>Person In Charge : ' . $row['personInCharge'] . '</h4>
    ';
        $file_name = $row['personInCharge'] . '-' . $newID . '.pdf';
    }

    $output .= '</table>';

    $document->loadhtml($output, 'UTF-8');

    $document->setPaper('A4');
    $document->render(); // Get output of the pdf in browser

    ob_end_clean();

    // Attachment 0 = Preview // 1 = Download
    $document->stream("$file_name", array("Attachment" => 0));
}
