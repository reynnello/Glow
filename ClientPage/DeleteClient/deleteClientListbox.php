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

$sql = "SELECT client_id, client_name, address, eircode, telephone, date_of_birth, driver_license_type, job_title_interest, qualifications, min_annual_salary FROM client where is_deleted = 0"; //querying the db

if (!$result = mysqli_query($con, $sql)) //checking db connection
{
    die('Error in querying the database' . mysqli_error($con));
}

echo "<select name = 'deleteClientListbox' id = 'deleteClientListbox' onclick = 'populate()'>"; //setting id to 'deleteClientListbox' and setting the onclick to populate function

while($row = mysqli_fetch_array($result)) //setting the data to variables
{
    $clientId = $row['client_id'];
    $clientName = $row['client_name'];
    $clientAddress = $row['address'];
    $clientEircode = $row['eircode'];
    $clientPhone = $row['telephone'];
    $clientDob = $row['date_of_birth'];
    $clientDriverLicense = $row['driver_license_type'];
    $clientJobTitle = $row['job_title_interest'];
    $clientQualifications = $row['qualifications'];
    $clientMinAnnualSalary = $row['min_annual_salary'];

    $allText = "$clientId|$clientName|$clientAddress|$clientEircode|$clientPhone|$clientDob|$clientDriverLicense|$clientJobTitle|$clientQualifications|$clientMinAnnualSalary";
    //$allText is now filled with data splited by '|'
    echo "<option value = '$allText'>$clientName</option>";
    //option is now saved and the user can see the client name in Listbox that will store all the client data
}
echo"</select>";
mysqli_close($con);
?>