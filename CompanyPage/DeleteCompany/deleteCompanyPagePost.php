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
        $rows = mysqli_affected_rows($con);
}

mysqli_close($con);//close connection
?>

<!-- result Modal -->
<?php
$rows = $rows ?? 0;
$modalTitle = 'Company Deleted';
if ($rows != 0) {
    $modalMessage = 'Company record has been deleted.';
} else {
    $modalMessage = 'No records were changed.';
}
$returnHref = 'deleteCompanyPage.html.php';
$returnLabel = 'Return to Previous Screen';
$cssHref = '../../Main.css';
require_once __DIR__ . '/../../resultModal.inc.php';
?>