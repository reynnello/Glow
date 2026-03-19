<!--
Name: Oleksandr Storozhuk
ID: C00313344
Date: 22/02/2026
-->
<?php
/** @var mysqli $con */
require_once __DIR__ . '/../../db.inc.php';//connection to db necessary for phpstorm
ini_set('display_errors', 1); //display error
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$name = $_POST['addName']; //creating variables and passing data from html fields
$address = $_POST['addAddress'];
$eircode = $_POST['addEircode'];
$phone = $_POST['addPhone'];
$dob = $_POST['addDob'];
$driverLicense = $_POST['addDriverLicense'];
$jobTitle = $_POST['addJobTitle'];
$qualifications = $_POST['addQualifications'];
$minAnnualSalary = $_POST['addMinAnnualSalary'];
$emp_status = 'Unemployed';

//sql query for insert
$sql = "INSERT INTO client (client_name, address, eircode, telephone, date_of_birth, driver_license_type, job_title_interest, qualifications, min_annual_salary, employment_status)
         VALUES('$name', '$address', '$eircode', '$phone', '$dob', '$driverLicense', '$jobTitle', '$qualifications', '$minAnnualSalary', '$emp_status')";

//if connection failed or sql query is wrong
if(!mysqli_query($con, $sql))
{
    die("Ann Error in the SQL Query ". mysqli_error($con));
}
//else
mysqli_close($con);
?>

<!-- result modal -->
<?php
$modalTitle = 'Client Added';
$modalMessage = 'A record has been added for <b>' . $name . '</b>.';
$returnHref = '../clientPage.html';
$returnLabel = 'Return to Client Page';
$cssHref = '../../Main.css';
require_once __DIR__ . '/../../resultModal.inc.php';
?>
