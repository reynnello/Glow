<?php
/** @var mysqli $con */ //connection to db necessary for phpstorm
require_once __DIR__ . '/../../db.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();



$deleteID = $_POST['delId'];

$rows = 0;
$sqlError = '';

$sql = "UPDATE training_course
        SET is_deleted = '1'
        WHERE course_id = '$deleteID'";

if (!mysqli_query($con, $sql)) {
    $sqlError = mysqli_error($con);
} else {
    $rows = mysqli_affected_rows($con);
}

mysqli_close($con);
?>
<!-- result Modal -->
<?php
$rows = $rows ?? 0;
    $modalTitle = 'Delete Result';
    if ($rows != 0) {
        $modalMessage = 'Course record has been deleted.';
    } else {
        $modalMessage = 'No records were changed.';
    }
$returnHref = 'deleteCoursePage.html.php';
$returnLabel = 'Return to Previous Screen';
$cssHref = '../../Main.css';
require_once __DIR__ . '/../../resultModal.inc.php';
?>