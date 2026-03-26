<!--
Name: Anton Opria
ID: C00309433
Date: 25/02/2026
-->
<?php
/** @var mysqli $con */
require_once __DIR__ . '/../../db.inc.php'; //connection to db necessary for phpstorm
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

// Retrieve and sanitize form data
$name = $_POST['addTitle'];
$desc = $_POST['addDescription'];
$company = (int)$_POST['companyId'];
$qualifications = $_POST['addQual'];
$type = $_POST['addType'];
$salary = $_POST['addAnnualSalary'];
$driverLicense = $_POST['addDriverLic'];
$location = $_POST['addLocation'];
$status = 'vacant';

//sql query for insert
$sql = "INSERT INTO job (job_title, job_description, company_id, qualification_required, work_type, annual_salary, drivers_license_required, location, status)
        VALUES ('$name', '$desc', $company, '$qualifications', '$type', '$salary', '$driverLicense', '$location', '$status')";

// Execute the query and check for errors
if (!mysqli_query($con, $sql)) {
    die("An Error in the SQL Query " . mysqli_error($con));
}

mysqli_close($con);
?>
<!-- result modal -->
<?php
$rows = $rows ?? 0;
$modalTitle = 'Job Added';
// Display a different message if no records were changed (e.g., if the job was already added with the same details)
if ($rows != 0) {
    $modalMessage = 'Job record for ' . $_POST['addTitle'] . ' has been added.';
} else {
    $modalMessage = 'No records were changed.';
}
$returnHref = '../jobPage.html';
$returnLabel = 'Return to Job Page';
$cssHref = '../../Main.css';
require_once __DIR__ . '/../../resultModal.inc.php';
?>