<!--
Name: Oleksandr Storozhuk
ID: C00313344
-->
<?php
/** @var mysqli $con */
require_once __DIR__ . '/../../db.inc.php'; // connect to the database

// Read POST values into variables
$clientId      = $_POST['clientId'];
$courseId      = $_POST['courseId'];
$depositAmount = $_POST['depositAmount'];
$today         = date('Y-m-d'); // enrolment date is today

$rows = 0;

// 0. Check if client is already actively enrolled on this course
$sqlCheck = "SELECT enrolment_id FROM enrolment WHERE client_id = '$clientId' AND course_id = '$courseId' AND is_deleted = 0";
 
$checkResult = mysqli_query($con, $sqlCheck);
 
if (!$checkResult)
{
    echo "Error checking enrolment: " . mysqli_error($con);
    mysqli_close($con);
    exit;
}
 
if (mysqli_num_rows($checkResult) > 0)
{
    mysqli_close($con);
    $rows = 0;
    $modalTitle   = 'Enrolment Result';
    $modalMessage = 'This client is already enrolled on this course.';
    $returnHref   = 'enrollCourse.html.php';
    $returnLabel  = 'Return to Previous Screen';
    $cssHref      = '../../Main.css';
    require_once __DIR__ . '/../../resultModal.inc.php';
    exit;
}

// Step 1: Insert a new enrolment record
$sql = "INSERT INTO enrolment (client_id, course_id, date_enrolled, deposit_amount, is_deleted)
        VALUES ('$clientId', '$courseId', '$today', '$depositAmount', 0)";

if (!mysqli_query($con, $sql)) {
    echo "Error inserting enrolment: " . mysqli_error($con);
    mysqli_close($con);
    exit;
}

// Step 2: Reduce places_remaining on the course by 1
$sql2 = "UPDATE training_course
         SET places_remaining = places_remaining - 1
         WHERE course_id = '$courseId'";

if (!mysqli_query($con, $sql2)) {
    echo "Error updating training course places: " . mysqli_error($con);
    mysqli_close($con);
    exit;
}

// Step 3: Increment the client's training course counter by 1
$sql3 = "UPDATE client
         SET num_training_courses = num_training_courses + 1
         WHERE client_id = '$clientId'";

if (!mysqli_query($con, $sql3)) {
    echo "Error updating client training course count: " . mysqli_error($con);
    mysqli_close($con);
    exit;
}

// All three queries succeeded - count affected rows for the modal message
$rows = mysqli_affected_rows($con);

mysqli_close($con);
?>

<!-- Show result modal indicating success or no change -->
<?php
$rows = $rows ?? 0;
$modalTitle = 'Enrolment Result';
if ($rows != 0) {
    $modalMessage = 'Enrolment record for client ID: ' . $_POST['clientId'] . ' has been created.';
} else {
    $modalMessage = 'No records were changed.';
}
$returnHref  = 'enrollCourse.html.php';
$returnLabel = 'Return to Previous Screen';
$cssHref     = '../../Main.css';
require_once __DIR__ . '/../../resultModal.inc.php';
?>
