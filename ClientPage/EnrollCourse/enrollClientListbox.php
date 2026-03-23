<!--
Name: Oleksandr Storozhuk
ID: C00313344
-->
<?php
/** @var mysqli $con */
require_once __DIR__ . '/../../db.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$sql = "SELECT client_id, client_name FROM client WHERE is_deleted = 0 ORDER BY client_name";

if (!$result = mysqli_query($con, $sql))
{
    die('Error in querying the database' . mysqli_error($con));
}

echo "<select name='clientListbox' id='clientListbox' onchange='populateClient()'>";
echo "<option value=''>-- Select a Client --</option>";

while ($row = mysqli_fetch_array($result))
{
    $clientId   = $row['client_id'];
    $clientName = $row['client_name'];

    $allText = "$clientId|$clientName";

    echo "<option value='$allText'>$clientName</option>";
}

echo "</select>";
?>
