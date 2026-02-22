<!--
Name: Oleksandr Storozhuk
ID: C00313344
Date: 22/02/2026
-->
<?php
/** @var mysqli $con */ //connection to db necessary for phpstorm
require_once __DIR__ . '/../db.inc.php';
ini_set('display_errors', 1); //display error
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


//update query
$sql = "UPDATE client SET client_name = '$_POST[amendName]',
        address = '$_POST[amendAddress]'
        ,eircode = '$_POST[amendEircode]'
        ,telephone = '$_POST[amendPhone]'
        ,date_of_birth = '$_POST[amendDob]'
        ,driver_licence_type = '$_POST[amendDriverLicense]'
        ,job_title_interest = '$_POST[amendJobTitle]'
        ,qualifications = '$_POST[amendQualifications]'
        ,min_annual_salary = '$_POST[amendMinAnnualSalary]'
        WHERE client_id = '$_POST[amendId]'";

if (! mysqli_query($con,$sql)) //if connection is not successful
{
    echo "Error ".mysqli_error($con);
}
else
{
    if (mysqli_affected_rows($con) != 0) //if rows affected
    {
        echo mysqli_affected_rows($con)." record(s) updated <br>"; // print the details
        echo "Client Id: ". $_POST['amendId']."<br>"
            ."; Client Name: ". $_POST['amendName']."<br>"
            ."; Client Address: ". $_POST['amendAddress']."<br>"
            ."; Client Eircode: ".$_POST['amendEircode']."<br>"
            ."; Client Telephone: ".$_POST['amendPhone']."<br>"
            ."; Client Date of Birth: ".$_POST['amendDob']."<br>"
            ."; Client Driver License Type: ".$_POST['amendDriverLicense']."<br>"
            ."; Client Job Title Interest: ".$_POST['amendJobTitle']."<br>"
            ."; Client Qualifications: ".$_POST['amendQualifications']."<br>"
            ."; Client Minimum Annual Salary: ".$_POST['amendMinAnnualSalary']."<br>"
            ." has been updated";
    }
    else
    {
        echo "No records were changed";//else print
    }
}

mysqli_close($con);//close connection
?>
<form action = "clientPageAmend.html.php" method = "post" />

<input type = "submit" value = "Return to Previous Screen"><!--Return to the previous page-->
</form>