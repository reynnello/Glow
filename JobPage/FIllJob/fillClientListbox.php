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

// Unemployed clients only
$sql = " SELECT client_id,
                client_name
        FROM client
        WHERE is_deleted = 0 AND employment_status = 'Unemployed'
        ORDER BY client_name";

$result = mysqli_query($con, $sql);
if (!$result) {
    die('Error in querying the database: ' . mysqli_error($con));
}

echo "<select name='clientId' id='clientId' required>";
echo "<option value='' disabled selected>Select an unemployed client...</option>";

while ($row = mysqli_fetch_assoc($result)) {
    $clientId = (int)$row['client_id'];
    $clientName = $row['client_name'];

    $safeLabel = htmlspecialchars($clientName, ENT_QUOTES, 'UTF-8');
    echo "<option value='{$clientId}'>{$safeLabel}</option>";
}

echo "</select>";

mysqli_free_result($result);
mysqli_close($con);
?>
