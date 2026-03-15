<!--
Name: Anton Opria
ID: C00309433
Date: 25/02/2026
-->
<?php
/** @var mysqli $con */
require_once __DIR__ . '/../../db.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Fetch all vacant and non-deleted jobs along with their company names
$sql = "SELECT company_id, company_name FROM Company WHERE is_deleted = 0 ORDER BY company_name";
$result = mysqli_query($con, $sql);
if (!$result) {
    die('Error in querying the database: ' . mysqli_error($con));
}

echo "<select name='JobListbox' id='JobListbox' onclick='populate()' required>";
echo "<option value='' disabled selected>Select a company...</option>"; 

// Loop through the results and populate the listbox
while ($row = mysqli_fetch_assoc($result)) {
    $companyId = (int)$row['company_id'];
    $companyName = $row['company_name'];

    $allText = "$companyId|$companyName";
    echo "<option value='$allText'>$companyName</option>";
}

echo "</select>";

mysqli_close($con);
?>