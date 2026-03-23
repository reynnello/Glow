<!--
Name: Oleksandr Storozhuk
ID: C00313344
Date: 22/02/2026
-->
<?php
/** @var mysqli $con */ //connection to db necessary for phpstorm
require_once __DIR__ . '/../../db.inc.php';
ini_set('display_errors', 1); //display error
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


//update query
$sql = "UPDATE client SET client_name = '$_POST[amendName]',
        address = '$_POST[amendAddress]'
        ,eircode = '$_POST[amendEircode]'
        ,telephone = '$_POST[amendPhone]'
        ,date_of_birth = '$_POST[amendDob]'
        ,driver_licence_type = '$_POST[amendDriverLicense]'
        ,job_title_interest = '$_POST[amendJobTitle]'
        ,qualifications = '$_POST[amendQualifications]'
        ,min_annual_salary = '$_POST[amendMinAnnualSalary]'
        WHERE client_id = '$_POST[amendId]'";

if (! mysqli_query($con,$sql)) //if connection is not successful
{
    echo "Error ".mysqli_error($con);
}
else
{
    $rows = mysqli_affected_rows($con);
}

mysqli_close($con);//close connection
?>

<!-- result modal -->
<?php
$rows = $rows ?? 0;
$modalTitle = 'Client Updated';
if ($rows != 0) {
    $modalMessage = 'Client record for ' . $_POST['amendName'] . ' has been updated.';
} else {
    $modalMessage = 'No records were changed.';
}
$returnHref = 'clientPageAmend.html.php';
$returnLabel = 'Return to Previous Screen';
$cssHref = '../../Main.css';
require_once __DIR__ . '/../../resultModal.inc.php';
?>