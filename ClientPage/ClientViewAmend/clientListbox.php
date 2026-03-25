<!--
Name: Oleksandr Storozhuk
ID: C00313344
Date: 22/02/2026
-->
<?php
/** @var mysqli $con */
require_once __DIR__ . '/../../db.inc.php'; // connect to the database

// Fetch all non-deleted clients with full details
$sql = "SELECT client_id, client_name, address, eircode, telephone, date_of_birth,
               driver_license_type, job_title_interest, qualifications, min_annual_salary
        FROM client
        WHERE is_deleted = 0";

if (!$result = mysqli_query($con, $sql)) {
    die('Error in querying the database: ' . mysqli_error($con));
}

// Render the select element; onclick triggers populate() in the parent page
echo "<select name='clientListbox' id='clientListbox' onclick='populate()'>";

while ($row = mysqli_fetch_array($result)) {
    // Map each column to a variable
    $clientId               = $row['client_id'];
    $clientName             = $row['client_name'];
    $clientAddress          = $row['address'];
    $clientEircode          = $row['eircode'];
    $clientPhone            = $row['telephone'];
    $clientDateOfBirth      = $row['date_of_birth'];
    $clientDriverLicenseType = $row['driver_license_type'];
    $clientJobTitleInterest = $row['job_title_interest'];
    $clientQualifications   = $row['qualifications'];
    $clientMinAnnualSalary  = $row['min_annual_salary'];

    // Pack all fields into one pipe-delimited string stored as the option value
    // The JS populate() function will split on '|' to fill the form fields
    $allText = "$clientId|$clientName|$clientAddress|$clientEircode|$clientPhone|$clientDateOfBirth|$clientDriverLicenseType|$clientJobTitleInterest|$clientQualifications|$clientMinAnnualSalary";

    echo "<option hidden>Select a client</option>";
    echo "<option value='$allText'>$clientName</option>";
}

echo "</select>";
mysqli_close($con);
?>
