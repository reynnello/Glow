<?php

/** @var mysqli $con */
require_once __DIR__ . '/../db.inc.php';//connection to db necessary for phpstorm
ini_set('display_errors', 1); //display error
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$name = $_POST['addName'];
$address = $_POST['addAddress'];
$eircode = $_POST['addEircode'];
$phone = $_POST['addPhone'];
$website = $_POST['addWebsite'];
$description = $_POST['addDescription'];
$contactName = $_POST['addContactName'];
$contactPhone = $_POST['addContactPhone'];
$contactEmail = $_POST['addContactEmail'];


$sql = "INSERT INTO Company (company_name, address, eircode, telephone, website, business_description, contact_name, contact_phone, contact_email)
         VALUES('$name', '$address', '$eircode', '$phone', '$website', '$description', '$contactName', '$contactPhone', '$contactEmail')";


if(!mysqli_query($con, $sql))
{
    die("Ann Error in the SQL Query ". mysqli_error($con));
}

echo "<br>A record has been added for   " .
    $name;

mysqli_close($con);
?>

<form action="/companyPage.html" method="POST">
    <br>
    <input type="submit" value="Return to Company Page"/>
</form>
