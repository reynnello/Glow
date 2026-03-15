<!--
Name: Anton Opria
ID: C00309433
Date: 15/03/2026
-->
<?php
/** @var mysqli $con */
require_once __DIR__ . '/../../db.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$sql = "SELECT job_id,
               company_id,
               job_title,
               job_description,
               qualification_required,
               work_type,
               annual_salary,
               drivers_license_required,
               location
        FROM job
        WHERE is_deleted = 0
        ORDER BY job_title";

if (!$result = mysqli_query($con, $sql)) //checking db connection
{
    die('Error in querying the database' . mysqli_error($con));
}

echo "<select name='amendJobListbox' id='amendJobListbox' onclick='populate()' required>";
echo "<option value='' disabled selected>Select a job...</option>";

while ($row = mysqli_fetch_assoc($result))
{
    $jobId = (int)$row['job_id'];
    $companyId = (int)$row['company_id'];
    $jobTitle = $row['job_title'];
    $jobDescription = $row['job_description'];
    $qualificationRequired = $row['qualification_required'];
    $workType = $row['work_type'];
    $annualSalary = $row['annual_salary'];
    $driversLicenseRequired = $row['drivers_license_required'];
    $location = $row['location'];

    // Fetch company name based on company_id (simple like other pages)
    $companyName = 'Unknown Company';
    $companySql = "SELECT company_name FROM Company WHERE company_id = $companyId AND is_deleted = 0";
    $companyResult = mysqli_query($con, $companySql);
    if ($companyResult && ($companyRow = mysqli_fetch_assoc($companyResult))) {
        $companyName = $companyRow['company_name'];
    }
    if ($companyResult) {
        mysqli_free_result($companyResult);
    }

    $allText = "$jobId|$companyId|$companyName|$jobTitle|$jobDescription|$qualificationRequired|$workType|$annualSalary|$driversLicenseRequired|$location";
    $label = $companyName . " - " . $jobTitle;

    $safeValue = htmlspecialchars($allText, ENT_QUOTES, 'UTF-8');
    $safeLabel = htmlspecialchars($label, ENT_QUOTES, 'UTF-8');
    echo "<option value='$safeValue'>$safeLabel</option>";
}
echo "</select>";
mysqli_close($con);
?>