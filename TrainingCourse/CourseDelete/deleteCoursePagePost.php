<?php
/*
     * Name: Dzheffriei Iheisnulo
     * Student ID: C00311856
     * Date: 17.02.2026
     */

/** @var mysqli $con */ //connection to db necessary for phpstorm
require_once __DIR__ . '/../../db.inc.php';
ini_set('display_errors', 1); //display error
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


//update query
$sql = "UPDATE Company SET company_name = '$_POST[deleteName]',
        address = '$_POST[deleteAddress]'
        ,eircode = '$_POST[deleteEircode]'
        ,telephone = '$_POST[deletePhone]'
        ,website = '$_POST[deleteWebsite]'
        ,business_description = '$_POST[deleteDescription]'
        ,contact_name = '$_POST[deleteContactName]'
        ,contact_phone = '$_POST[deleteContactPhone]'
        ,contact_email = '$_POST[deleteContactEmail]'
        ,is_deleted = '1'
        WHERE company_id = '$_POST[deleteId]'";

if (! mysqli_query($con,$sql)) //if connection is not successful
{
    echo "Error ".mysqli_error($con);
}
else
{
        echo mysqli_affected_rows($con)." record(s) updated <br>"; // print the details
        echo "Company Id: ". $_POST['deleteId']."<br>"
            ."; Company Name: ". $_POST['deleteName']."<br>"
            ."; Company Address: ". $_POST['deleteAddress']."<br>"
            ."; Company Eircode: ".$_POST['deleteEircode']."<br>"
            ."; Company Telephone: ".$_POST['deletePhone']."<br>"
            ."; Company Website: ".$_POST['deleteWebsite']."<br>"
            ."; Company Business Description: ".$_POST['deleteDescription']."<br>"
            ."; Contact Name: ".$_POST['deleteContactName']."<br>"
            ."; Contact Phone: ".$_POST['deleteContactPhone']."<br>"
            ."; Contact Email: ".$_POST['deleteContactEmail'] ."<br>"
            ." has been deleted";
}

mysqli_close($con);//close connection
?>
<form action = "deleteCompanyPage.html.php" method = "post">

<input type = "submit" value = "Return to Previous Screen"><!--Return to the previous page-->
</form>