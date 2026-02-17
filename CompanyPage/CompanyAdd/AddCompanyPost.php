<?php
/*
     * Name: Dzheffriei Iheisnulo
     * Student ID: C00311856
     * Date: 17.02.2026
     */

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
$website = $_POST['addWebsite'];
$description = $_POST['addDescription'];
$contactName = $_POST['addContactName'];
$contactPhone = $_POST['addContactPhone'];
$contactEmail = $_POST['addContactEmail'];

//sql query for insert
$sql = "INSERT INTO Company (company_name, address, eircode, telephone, website, business_description, contact_name, contact_phone, contact_email)
         VALUES('$name', '$address', '$eircode', '$phone', '$website', '$description', '$contactName', '$contactPhone', '$contactEmail')";

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
<form action="../companyPage.html" method="POST">
    <br>
    <input type="submit" value="Return to Company Page"/>
</form>
