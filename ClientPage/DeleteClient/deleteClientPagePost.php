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

//set variables
$name = $_POST['deleteName'];
$address = $_POST['deleteAddress'];
$eircode = $_POST['deleteEircode'];
$phone = $_POST['deletePhone'];
$dob = $_POST['deleteDob'];
$driverLicense = $_POST['deleteDriverLicense'];
$jobTitle = $_POST['deleteJobTitleInterest'];
$qualifications = $_POST['deleteQualifications'];
$minSalary = $_POST['deleteMinimumAnnualSalary'];
$id = $_POST['deleteId'];

//update query
$sql = "UPDATE client SET client_name = '$name',
        address = '$address',
        eircode = '$eircode',
        telephone = '$phone',
        date_of_birth = '$dob',
        driver_license_type = '$driverLicense',
        job_title_interest = '$jobTitle',
        qualifications = '$qualifications',
        min_annual_salary = '$minSalary',
        is_deleted = '1'
        WHERE client_id = '$id'";

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
$modalTitle = 'Client Deleted';
if ($rows != 0) {
    $modalMessage = 'Client record has been deleted.';
} else {
    $modalMessage = 'No records were changed.';
}
$returnHref = 'deleteClientPage.html.php';
$returnLabel = 'Return to Previous Screen';
$cssHref = '../../Main.css';
require_once __DIR__ . '/../../resultModal.inc.php';
?>