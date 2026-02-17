<?php
/*
     * Name: Dzheffriei Iheisnulo
     * Student ID: C00311856
     * Date: 05.02.2026
     */
/** @var mysqli $con */ //connection to db necessary for phpstorm
require_once __DIR__ . '/../db.inc.php';
ini_set('display_errors', 1); //display error
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$sql = "SELECT company_id, company_name, address, eircode, telephone, website, business_description, contact_name, contact_phone, contact_email FROM Company where is_deleted = 0"; //querying the db

if (!$result = mysqli_query($con, $sql)) //checking db connection
{
    die('Error in querying the database' . mysqli_error($con));
}

echo "<br><select name = 'deleteCompanyListbox' id = 'deleteCompanyListbox' onclick = 'populate()'>"; //setting id to 'deleteCompanyListbox' and setting the onclick to populate function

while($row = mysqli_fetch_array($result)) //setting the data to variables
{
    $companyId = $row['company_id'];
    $companyName = $row['company_name'];
    $companyAddress = $row['address'];
    $companyEircode = $row['eircode'];
    $companyPhone = $row['telephone'];
    $companyWebsite = $row['website'];
    $companyBusinessDescription = $row['business_description'];
    $companyContactName = $row['contact_name'];
    $companyContactPhone = $row['contact_phone'];
    $companyContactEmail = $row['contact_email'];

    $allText = "$companyId|$companyName|$companyAddress|$companyEircode|$companyPhone|$companyWebsite|$companyBusinessDescription|$companyContactName|$companyContactPhone|$companyContactEmail";
    //$allText is now filled with data splited by '|'
    echo "<option value = '$allText'>$companyName</option>";
    //option is now saved and the user can see the company name in Listbox that will store all the company data
}
echo"</select>";
mysqli_close($con);
?>