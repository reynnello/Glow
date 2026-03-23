<!--
Name: Anton Opria
ID: C00309433
Date: 15/03/2026
-->
<?php
/** @var mysqli $con */
require_once __DIR__ . '/../../db.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

// sql query for update
$sql = "UPDATE job SET
            job_title = '$_POST[deleteTitle]',
            job_description = '$_POST[deleteDescription]',
            company_id = '$_POST[deleteCompanyId]',
            qualification_required = '$_POST[deleteQual]',
            work_type = '$_POST[deleteType]',
            annual_salary = '$_POST[deleteAnnualSalary]',
            drivers_license_required = '$_POST[deleteDriverLic]',
            location = '$_POST[deleteLocation]',
            is_deleted = '1'
        WHERE job_id = '$_POST[deleteId]'";

// Execute the query and check for errors
if (!mysqli_query($con, $sql)) {
    echo "Error " . mysqli_error($con);
} else {
    $rows = mysqli_affected_rows($con);
}

mysqli_close($con);
?>

<!-- result Modal -->
<?php
$rows = $rows ?? 0;
$modalTitle = 'Job Deleted';
if ($rows != 0) {
    $modalMessage = 'Job record for ' . $_POST['deleteTitle'] . ' has been deleted.';
} else {
    $modalMessage = 'No records were changed.';
}
$returnHref = 'deleteJobPage.html.php';
$returnLabel = 'Return to Previous Screen';
$cssHref = '../../Main.css';
require_once __DIR__ . '/../../resultModal.inc.php';
?>