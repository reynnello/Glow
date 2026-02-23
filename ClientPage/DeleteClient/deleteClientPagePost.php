<!--
Name: Oleksandr Storozhuk
ID: C00313344
Date: 22/02/2026
-->
<?php
/** @var mysqli $con */ //connection to db necessary for phpstorm
require_once __DIR__ . '/./Glow/db.inc.php';
ini_set('display_errors', 1); //display error
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


//update query
$sql = "UPDATE client SET client_name = '$_POST[deleteName]',
        address = '$_POST[deleteAddress]'
        ,eircode = '$_POST[deleteEircode]'
        ,telephone = '$_POST[deletePhone]'
        ,date_of_birth = '$_POST[deleteDob]'
        ,driver_license_type = '$_POST[deleteDriverLicense]'
        ,job_title_interest = '$_POST[deleteJobTitle]'
        ,qualifications = '$_POST[deleteQualifications]'
        ,min_annual_salary = '$_POST[deleteMinAnnualSalary]'
        ,is_deleted = '1'
        WHERE client_id = '$_POST[deleteId]'";

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
            ."; Client Job Title Interest: ".$_POST['deleteJobTitle']."<br>"
            ."; Client Qualifications: ".$_POST['deleteQualifications']."<br>"
            ."; Client Minimum Annual Salary: ".$_POST['deleteMinAnnualSalary']."<br>"
            ." has been deleted";
}

mysqli_close($con);//close connection
?>
<form action = "deleteClientPage.html.php" method = "post">

<input type = "submit" value = "Return to Previous Screen"><!--Return to the previous page-->
</form>