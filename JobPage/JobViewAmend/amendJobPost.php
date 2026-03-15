<!--
Name: Anton Opria
ID: C00309433
Date: 15/03/2026
-->
<?php
/** @var mysqli $con */ //connection to db necessary for phpstorm
require_once __DIR__ . '/../../db.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


// sql query for update
$sql = "UPDATE job SET
    job_title = '$_POST[amendTitle]',
    job_description = '$_POST[amendDescription]',
    company_id = '$_POST[amendCompanyId]',
    qualification_required = '$_POST[amendQual]',
    work_type = '$_POST[amendType]',
    annual_salary = '$_POST[amendAnnualSalary]',
    drivers_license_required = '$_POST[amendDriverLic]',
    location = '$_POST[amendLocation]'
    WHERE job_id = '$_POST[amendId]'";

// Execute the query and check for errors
if (! mysqli_query($con,$sql))
{
    echo "Error ".mysqli_error($con);
}
else
{
    if (mysqli_affected_rows($con) != 0) //if rows affected
    {   
        // print the details of the updated record
        echo mysqli_affected_rows($con)." record(s) updated <br>"; 
        echo "Job Id: ". $_POST['amendId']."<br>"
            ."; Company Id: ". $_POST['amendCompanyId']."<br>"
            ."; Company Name: ". $_POST['amendCompanyName']."<br>"
            ."; Job Title: ". $_POST['amendTitle']."<br>"
            ."; Job Description: ". $_POST['amendDescription']."<br>"
            ."; Qualification Required: ". $_POST['amendQual']."<br>"
            ."; Type of Work: ". $_POST['amendType']."<br>"
            ."; Annual Salary: ". $_POST['amendAnnualSalary']."<br>"
            ."; Drivers License Required: ". $_POST['amendDriverLic']."<br>"
            ."; Location: ". $_POST['amendLocation']."<br>"
            ." has been updated";
    }
    else
    {
        echo "No records were changed"; //else print
    }
}

mysqli_close($con); //close connection
?>
<form action = "amendJobPage.html.php" method = "post">

<input type = "submit" value = "Return to Previous Screen"><!--Return to the previous page-->
</form>