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

$clientId     = $_POST['clientId'];
$courseId     = $_POST['courseId'];
$depositAmount = $_POST['depositAmount'];
$today        = date('Y-m-d');

// 1. Insert new enrolment record
$sql = "INSERT INTO enrolment (client_id, course_id, date_enrolled, deposit_amount, is_deleted)
        VALUES ('$clientId', '$courseId', '$today', '$depositAmount', 0)";

if (!mysqli_query($con, $sql))
{
    echo "Error inserting enrolment: " . mysqli_error($con);
    mysqli_close($con);
    exit;
}

// 2. Decrease places_remaining in training_course by 1
$sql2 = "UPDATE training_course SET places_remaining = places_remaining - 1 WHERE course_id = '$courseId'";

if (!mysqli_query($con, $sql2))
{
    echo "Error updating training course places: " . mysqli_error($con);
    mysqli_close($con);
    exit;
}

// 3. Increase num_training_courses in client by 1
$sql3 = "UPDATE client SET num_training_courses = num_training_courses + 1 WHERE client_id = '$clientId'";

if (!mysqli_query($con, $sql3))
{
    echo "Error updating client training course count: " . mysqli_error($con);
    mysqli_close($con);
    exit;
}

if (! mysqli_query($con,$sql)) //if connection is not successful
{
    echo "Error ".mysqli_error($con);
}
else
{
        $rows = mysqli_affected_rows($con);
}

mysqli_close($con);//close connection
?>

<!-- result modal -->
<?php
$rows = $rows ?? 0;
$modalTitle = 'Enrolment Result';
if ($rows != 0) {
    $modalMessage = 'Enrolment record for ID: ' . $_POST['clientId'] . ' has been created.';
} else {
    $modalMessage = 'No records were changed.';
}
$returnHref = 'enrollCourse.html.php';
$returnLabel = 'Return to Previous Screen';
$cssHref = '../../Main.css';
require_once __DIR__ . '/../../resultModal.inc.php';
?>
