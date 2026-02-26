<?php
/** @var mysqli $con */
require_once __DIR__ . '/../../db.inc.php'; //connection to db necessary for phpstorm
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

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

if (!mysqli_query($con, $sql)) {
    die("An Error in the SQL Query " . mysqli_error($con));
}

echo "<br>A record has been added for " . $name;

mysqli_close($con);
?>
<!--Button for return back-->
<form action="../jobPage.html" method="POST">
    <br>
    <input type="submit" value="Return to Client Page"/>
</form>