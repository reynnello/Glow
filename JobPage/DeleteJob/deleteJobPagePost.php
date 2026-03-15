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
            status = '$_POST[deleteStatus]',
            is_deleted = '1'
        WHERE job_id = '$_POST[deleteId]'";

// Execute the query and check for errors
if (!mysqli_query($con, $sql)) {
    echo "Error " . mysqli_error($con);
} else {
    echo mysqli_affected_rows($con) . " record(s) updated <br>";
    echo "Job Id: " . $_POST['deleteId'] . "<br>"
        ."; Company Id: " . $_POST['deleteCompanyId'] . "<br>"
        ."; Company Name: " . $_POST['deleteCompanyName'] . "<br>"
        ."; Job Title: " . $_POST['deleteTitle'] . "<br>"
        ."; Job Description: " . $_POST['deleteDescription'] . "<br>"
        ."; Qualification Required: " . $_POST['deleteQual'] . "<br>"
        ."; Type of Work: " . $_POST['deleteType'] . "<br>"
        ."; Annual Salary: " . $_POST['deleteAnnualSalary'] . "<br>"
        ."; Drivers License Required: " . $_POST['deleteDriverLic'] . "<br>"
        ."; Location: " . $_POST['deleteLocation'] . "<br>"
        ."; Status: " . $_POST['deleteStatus'] . "<br>"
        ." has been deleted";
}

mysqli_close($con);
?>
<!--Button for return back-->
<form action="deleteJobPage.html.php" method="post">
    <br>
    <input type="submit" value="Return to Previous Screen" />
</form>