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
        echo mysqli_affected_rows($con)." record(s) updated <br>"; // print the details
        echo "Client Id: ". $_POST['deleteId']."<br>"
            ."; Client Name: ". $_POST['deleteName']."<br>"
            ."; Client Address: ". $_POST['deleteAddress']."<br>"
            ."; Client Eircode: ".$_POST['deleteEircode']."<br>"
            ."; Client Telephone: ".$_POST['deletePhone']."<br>"
            ."; Client Date of Birth: ".$_POST['deleteDob']."<br>"
            ."; Client Driver License Type: ".$_POST['deleteDriverLicense']."<br>"
            ."; Client Job Title Interest: ".$_POST['deleteJobTitleInterest']."<br>"
            ."; Client Qualifications: ".$_POST['deleteQualifications']."<br>"
            ."; Client Minimum Annual Salary: ".$_POST['deleteMinimumAnnualSalary']."<br>"
            ." has been deleted";
}

mysqli_close($con);//close connection
?>
<form action = "deleteClientPage.html.php" method = "post">

<input type = "submit" value = "Return to Previous Screen"><!--Return to the previous page-->
</form>