<!--
Name: Oleksandr Storozhuk
ID: C00313344
Date: 22/02/2026
-->
<?php
/** @var mysqli $con */
require_once __DIR__ . '/../../db.inc.php'; // connect to the database

// Update all editable client fields for the given client_id
$sql = "UPDATE client SET
            client_name        = '$_POST[amendName]',
            address            = '$_POST[amendAddress]',
            eircode            = '$_POST[amendEircode]',
            telephone          = '$_POST[amendPhone]',
            date_of_birth      = '$_POST[amendDob]',
            driver_licence_type = '$_POST[amendDriverLicense]',
            job_title_interest = '$_POST[amendJobTitle]',
            qualifications     = '$_POST[amendQualifications]',
            min_annual_salary  = '$_POST[amendMinAnnualSalary]'
        WHERE client_id = '$_POST[amendId]'";

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
$modalTitle = 'Client Updated';
if ($rows != 0) {
    $modalMessage = 'Client record for ' . $_POST['amendName'] . ' has been updated.';
} else {
    $modalMessage = 'No records were changed.';
}
$returnHref  = 'clientPageAmend.html.php';
$returnLabel = 'Return to Previous Screen';
$cssHref     = '../../Main.css';
require_once __DIR__ . '/../../resultModal.inc.php';
?>
