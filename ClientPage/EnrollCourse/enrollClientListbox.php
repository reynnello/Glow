<!--
Name: Oleksandr Storozhuk
ID: C00313344
-->
<?php
/** @var mysqli $con */
require_once __DIR__ . '/../../db.inc.php'; // connect to the database

// Fetch all non-deleted clients, ordered alphabetically
$sql = "SELECT client_id, client_name
        FROM client
        WHERE is_deleted = 0
        ORDER BY client_name";

if (!$result = mysqli_query($con, $sql)) {
    die('Error in querying the database: ' . mysqli_error($con));
}

// onchange fires populateClient() in the parent page when selection changes
echo "<select name='clientListbox' id='clientListbox' onchange='populateClient()'>";
echo "<option hidden>-- Select a Client --</option>";

while ($row = mysqli_fetch_array($result)) {
    $clientId   = $row['client_id'];
    $clientName = $row['client_name'];

    // Pack id and name into pipe-delimited value for JS to read
    $allText = "$clientId|$clientName";

    echo "<option value='$allText'>$clientName</option>";
}

echo "</select>";
?>
