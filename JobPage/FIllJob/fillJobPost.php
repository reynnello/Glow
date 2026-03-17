<!--
Name: Anton Opria
ID: C00309433
Date: 17/03/2026
-->
<?php
/** @var mysqli $con */
require_once __DIR__ . '/../../db.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Read and validate inputs
$jobId = isset($_POST['jobId']) ? (int)$_POST['jobId'] : 0;
$clientId = isset($_POST['clientId']) ? (int)$_POST['clientId'] : 0;
$offerDate = $_POST['offerDate'] ?? '';
$acceptedSalary = $_POST['acceptedSalary'] ?? '';
$startDate = $_POST['startDate'] ?? '';

// Basic date validation, start date cannot be before offer date
if ($startDate < $offerDate) {
	die('Employment Start Date cannot be earlier than Date of Job Offer.');
}

// Update job status to filled and set accepted salary
$jobSql = "UPDATE job SET status = 'filled', annual_salary = '$acceptedSalary'
           WHERE job_id = '$jobId' AND is_deleted = 0 AND status = 'vacant'";

if (!mysqli_query($con, $jobSql)) {
    die("An Error in the SQL Query " . mysqli_error($con));
}

// Update client employment status to employed
$clientSql = "UPDATE client SET employment_status = 'Employed'
              WHERE client_id = '$clientId' AND is_deleted = 0 AND employment_status = 'Unemployed'";

if (!mysqli_query($con, $clientSql)) {
    die("An Error in the SQL Query " . mysqli_error($con));
}

mysqli_close($con);
?>
<!-- result modal -->
<?php
$modalTitle = 'Job Filled';
$modalMessage = 'The job status was updated to <b>filled</b>, and the client employment status was updated to <b>Employed</b>.';
$returnHref = '../jobPage.html';
$returnLabel = 'Return to Job Page';
$cssHref = '../../Main.css';
require_once __DIR__ . '/../../resultModal.inc.php';
?>

