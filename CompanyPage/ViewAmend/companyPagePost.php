<?php
/*
     * Name: Dzheffriei Iheisnulo
     * Student ID: C00311856
     * Date: 17.02.2026
     */

/** @var mysqli $con */ //connection to db necessary for phpstorm
require_once __DIR__ . '/./Glow/db.inc.php';
ini_set('display_errors', 1); //display error
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


//update query
$sql = "UPDATE Company SET company_name = '$_POST[amendName]',
        address = '$_POST[amendAddress]'
        ,eircode = '$_POST[amendEircode]'
        ,telephone = '$_POST[amendPhone]'
        ,website = '$_POST[amendWebsite]'
        ,business_description = '$_POST[amendDescription]'
        ,contact_name = '$_POST[amendContactName]'
        ,contact_phone = '$_POST[amendContactPhone]'
        ,contact_email = '$_POST[amendContactEmail]'
        WHERE company_id = '$_POST[amendId]'";

if (! mysqli_query($con,$sql)) //if connection is not successful
{
    echo "Error ".mysqli_error($con);
}
else
{
    if (mysqli_affected_rows($con) != 0) //if rows affected
    {
        echo mysqli_affected_rows($con)." record(s) updated <br>"; // print the details
        echo "Company Id: ". $_POST['amendId']."<br>"
            ."; Company Name: ". $_POST['amendName']."<br>"
            ."; Company Address: ". $_POST['amendAddress']."<br>"
            ."; Company Eircode: ".$_POST['amendEircode']."<br>"
            ."; Company Telephone: ".$_POST['amendPhone']."<br>"
            ."; Company Website: ".$_POST['amendWebsite']."<br>"
            ."; Company Business Description: ".$_POST['amendDescription']."<br>"
            ."; Contact Name: ".$_POST['amendContactName']."<br>"
            ."; Contact Phone: ".$_POST['amendContactPhone']."<br>"
            ."; Contact Email: ".$_POST['amendContactEmail'] ."<br>"
            ." has been updated";
    }
    else
    {
        echo "No records were changed";//else print
    }
}

mysqli_close($con);//close connection
?>
<form action = "companyPageAmend.html.php" method = "post" />

<input type = "submit" value = "Return to Previous Screen"><!--Return to the previous page-->
</form>