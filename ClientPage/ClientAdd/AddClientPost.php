<!--
Name: Oleksandr Storozhuk
ID: C00313344
Date: 22/02/2026
-->
<?php
/** @var mysqli $con */
require_once __DIR__ . '/../../db.inc.php'; // connect to the database

// Read POST values into variables
$name           = $_POST['addName'];
$address        = $_POST['addAddress'];
$eircode        = $_POST['addEircode'];
$phone          = $_POST['addPhone'];
$dob            = $_POST['addDob'];
$driverLicense  = $_POST['addDriverLicense'];
$jobTitle       = $_POST['addJobTitle'];
$qualifications = $_POST['addQualifications'];
$minAnnualSalary = $_POST['addMinAnnualSalary'];
$emp_status     = 'Unemployed'; // new clients always start as unemployed

// Insert the new client record
$sql = "INSERT INTO client (client_name, address, eircode, telephone, date_of_birth, driver_license_type, job_title_interest, qualifications, min_annual_salary, employment_status)
         VALUES('$name', '$address', '$eircode', '$phone', '$dob', '$driverLicense', '$jobTitle', '$qualifications', '$minAnnualSalary', '$emp_status')";

if (!mysqli_query($con, $sql)) {
    die("An Error in the SQL Query: " . mysqli_error($con));
}

mysqli_close($con);
?>

<!-- Show result modal with client name and return link -->
<?php
$modalTitle  = 'Client Added';
$modalMessage = 'A record has been added for <b>' . $name . '</b>.';
$returnHref  = '../clientPage.html';
$returnLabel = 'Return to Client Page';
$cssHref     = '../../Main.css';
require_once __DIR__ . '/../../resultModal.inc.php';
?>
