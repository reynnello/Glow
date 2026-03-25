<!--
Name: Oleksandr Storozhuk
ID: C00313344
Date: 22/02/2026
-->
<?php
/** @var mysqli $con */
require_once __DIR__ . '/../../db.inc.php'; // connect to the database

// Read POST values into variables
$name           = $_POST['deleteName'];
$address        = $_POST['deleteAddress'];
$eircode        = $_POST['deleteEircode'];
$phone          = $_POST['deletePhone'];
$dob            = $_POST['deleteDob'];
$driverLicense  = $_POST['deleteDriverLicense'];
$jobTitle       = $_POST['deleteJobTitleInterest'];
$qualifications = $_POST['deleteQualifications'];
$minSalary      = $_POST['deleteMinimumAnnualSalary'];
$id             = $_POST['deleteId'];

// Soft-delete: set is_deleted = 1 rather than removing the row
// All other fields are updated too so the record stays consistent
$sql = "UPDATE client SET
            client_name        = '$name',
            address            = '$address',
            eircode            = '$eircode',
            telephone          = '$phone',
            date_of_birth      = '$dob',
            driver_license_type = '$driverLicense',
            job_title_interest = '$jobTitle',
            qualifications     = '$qualifications',
            min_annual_salary  = '$minSalary',
            is_deleted         = '1'
        WHERE client_id = '$id'";

if (!mysqli_query($con, $sql)) {
    echo "Error: " . mysqli_error($con);
} else {
    $rows = mysqli_affected_rows($con); // number of rows changed
}

mysqli_close($con);
?>

<!-- Show result modal indicating success or no change -->
<?php
$rows = $rows ?? 0;
$modalTitle = 'Client Deleted';
if ($rows != 0) {
    $modalMessage = 'Client record for ' . $_POST['deleteName'] . ' has been deleted.';
} else {
    $modalMessage = 'No records were changed.';
}
$returnHref  = 'deleteClientPage.html.php';
$returnLabel = 'Return to Previous Screen';
$cssHref     = '../../Main.css';
require_once __DIR__ . '/../../resultModal.inc.php';
?>
