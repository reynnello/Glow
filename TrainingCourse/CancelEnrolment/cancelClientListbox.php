<!--Name: Dzheffriei Ihesinulo-->
<!--Student ID: C00311856-->
<!--Date: 17.02.26-->
<?php
/** @var mysqli $con */
require_once __DIR__ . '/../../db.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Only show clients who have at least one active enrolment
$sql = "SELECT DISTINCT c.client_id, c.client_name
        FROM client c
        INNER JOIN enrolment e ON c.client_id = e.client_id
        WHERE c.is_deleted = 0
          AND e.is_deleted = 0
        ORDER BY c.client_name";

if (!$result = mysqli_query($con, $sql))
{
    die('Error querying the database: ' . mysqli_error($con));
}

echo "<select name='clientListbox' id='clientListbox' onchange='populateClient()'>";
echo "<option value=''>-- Select a Client --</option>";

while ($row = mysqli_fetch_array($result))
{
    $clientId   = htmlspecialchars($row['client_id']);
    $clientName = htmlspecialchars($row['client_name']);

    echo "<option value='$clientId' data-info='$clientId|$clientName'>$clientName</option>";
}

echo "</select>";
?>
