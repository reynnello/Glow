<?php
/*
 * Name: Anton Opria
 * Student ID: C00309433
 * Date: 25.02.2026
 */
/** @var mysqli $con */
require_once __DIR__ . '/../../db.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$sql = "SELECT company_id, company_name FROM Company WHERE is_deleted = 0 ORDER BY company_name";
$result = mysqli_query($con, $sql);
if (!$result) {
    die('Error in querying the database: ' . mysqli_error($con));
}

echo "<select name='JobListbox' id='JobListbox' onclick='populate()' required>"; // setting id to 'JobListbox' and setting the onclick to populate function, also making it required
echo "<option value='' disabled selected>Select a company...</option>"; // adding a default option to prompt the user to select a company

while ($row = mysqli_fetch_assoc($result)) {
    $companyId = (int)$row['company_id'];
    $companyName = $row['company_name'];

    $allText = "$companyId|$companyName";
    echo "<option value='$allText'>$companyName</option>";
}

echo "</select>";

mysqli_close($con);
?>