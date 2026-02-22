<!--
Name: Oleksandr Storozhuk
ID: C00313344
Date: 22/02/2026
-->
<?php
/** @var mysqli $con */
require_once __DIR__ . '/../db.inc.php';//connection to db necessary for phpstorm
ini_set('display_errors', 1); //display error
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$name = $_POST['addName']; //creating variables and passing data from html fields
$address = $_POST['addAddress'];
$eircode = $_POST['addEircode'];
$phone = $_POST['addPhone'];
$dob = $_POST['addDob'];
$driverLicense = $_POST['addDriverLicense'];
$jobTitle = $_POST['addJobTitle'];
$qualifications = $_POST['addQualifications'];
$minAnnualSalary = $_POST['addMinAnnualSalary'];

//sql query for insert
$sql = "INSERT INTO client (client_name, address, eircode, telephone, date_of_birth, driver_license_type, job_title_interest, qualifications, min_annual_salary)
         VALUES('$name', '$address', '$eircode', '$phone', '$dob', '$driverLicense', '$jobTitle', '$qualifications', '$minAnnualSalary')";

//if connection failed or sql query is wrong
if(!mysqli_query($con, $sql))
{
    die("Ann Error in the SQL Query ". mysqli_error($con));
}
//else
echo "<br>A record has been added for   " .
    $name;
//closing connection
mysqli_close($con);
?>
<!--Button for return back-->
<form action="../clientPage.html" method="POST">
    <br>
    <input type="submit" value="Return to Client Page"/>
</form>
