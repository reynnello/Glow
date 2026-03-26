<!--
Name: Anton Opria
ID: C00309433
Date: 15/03/2026
-->
<?php
/** @var mysqli $con */ //connection to db necessary for phpstorm
require_once __DIR__ . '/../../db.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


// sql query for update
$sql = "UPDATE job SET
    job_title = '$_POST[amendTitle]',
    job_description = '$_POST[amendDescription]',
    company_id = '$_POST[amendCompanyId]',
    qualification_required = '$_POST[amendQual]',
    work_type = '$_POST[amendType]',
    annual_salary = '$_POST[amendAnnualSalary]',
    drivers_license_required = '$_POST[amendDriverLic]',
    location = '$_POST[amendLocation]'
    WHERE job_id = '$_POST[amendId]'";

// Execute the query and check for errors
if (! mysqli_query($con,$sql))
{
    echo "Error ".mysqli_error($con);
}
else
{
    $rows = mysqli_affected_rows($con);
}

mysqli_close($con); //close connection
?>

<!-- result Modal -->
<?php
$rows = $rows ?? 0;
$modalTitle = 'Job Updated';
// Display a different message if no records were changed (e.g., if the job was already updated with the same details)
if ($rows != 0) {
    $modalMessage = 'Job record for ' . $_POST['amendTitle'] . ' has been updated.';
} else {
    $modalMessage = 'No records were changed.';
}
$returnHref = 'amendJobPage.html.php';
$returnLabel = 'Return to Previous Screen';
$cssHref = '../../Main.css';
require_once __DIR__ . '/../../resultModal.inc.php';
?>