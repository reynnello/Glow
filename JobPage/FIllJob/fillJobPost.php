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


// Insert a record into filled_post to track the filled job(useless)
$filledPostSql = "INSERT INTO filled_post (job_id, client_id, date_of_offer, salary_accepted, employment_start_date)
                VALUES ('$jobId', '$clientId', '$offerDate', '$acceptedSalary', '$startDate')";

if (!mysqli_query($con, $filledPostSql)) {
    die("An Error in the SQL Query " . mysqli_error($con));
}

mysqli_close($con);
?>
<!-- result modal -->
<?php
$rows = $rows ?? 0;
$modalTitle = 'Job Filled';
// Display a different message if no records were changed (e.g., if the job was already filled or client was already employed)
if ($rows != 0) {
    $modalMessage = 'Job record for Job ID ' . $jobId . ' has been filled and client ID ' . $clientId . ' is now employed.';
} else {
    $modalMessage = 'No records were changed.';
}
$returnHref = '../jobPage.html';
$returnLabel = 'Return to Job Page';
$cssHref = '../../Main.css';
require_once __DIR__ . '/../../resultModal.inc.php';
?>

