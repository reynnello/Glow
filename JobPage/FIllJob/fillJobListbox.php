<!--
Name: Anton Opria
ID: C00309433
Date: 17/03/2026
-->
<?php
/** @var mysqli $con */
require __DIR__ . '/../../db.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Fetch all vacant and non-deleted jobs
$sql = "SELECT job_id, 
               company_id, 
               job_title
        FROM job
        WHERE is_deleted = 0 AND status = 'vacant'
        ORDER BY job_title";

// Execute the query and check for errors
$result = mysqli_query($con, $sql);
if (!$result) {
    die('Error in querying the database: ' . mysqli_error($con));
}

echo "<select name='jobId' id='jobId' required>";
echo "<option value='' disabled selected>Select a vacant job...</option>";

// Loop through the results and populate the listbox
while ($row = mysqli_fetch_assoc($result)) {
	$jobId = (int)$row['job_id'];
	$companyId = (int)$row['company_id'];
	$jobTitle = $row['job_title'];

	// Fetch the company name for the current job
	$companyName = '';
	$companySql = "SELECT company_name FROM Company WHERE company_id = $companyId AND is_deleted = 0";
	$companyResult = mysqli_query($con, $companySql);
    // Check if the company query was successful and fetch the company name
	if ($companyRow = mysqli_fetch_assoc($companyResult)) {
		$companyName = $companyRow['company_name'];
	}
	if ($companyResult) {
		mysqli_free_result($companyResult);
	}

	$label = $companyName . " -- " . $jobTitle;
  $safeLabel = htmlspecialchars($label, ENT_QUOTES, 'UTF-8');
	echo "<option value='$jobId'>$safeLabel</option>";
}

echo "</select>";

mysqli_free_result($result);
mysqli_close($con);
?>

