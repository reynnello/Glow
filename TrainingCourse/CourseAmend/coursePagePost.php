<!--Name: Dzheffriei Ihesinulo, Anton Opria, Oleksandr Storozhuk -->
<!--Student ID: C00311856, C00309433, C00313344 -->
<!--Date: 17.02.26-->
<?php
/** @var mysqli $con */ //connection to db necessary for phpstorm
require_once __DIR__ . '/../../db.inc.php';
ini_set('display_errors', 1); //display error
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$rows = 0;
$sqlError = '';


//update query
$sql = "UPDATE training_course SET course_title = '$_POST[delTitle]',
        course_provider = '$_POST[delProvider]'
        ,course_description = '$_POST[delDescription]'
        ,fee = '$_POST[delFee]'
        ,venue = '$_POST[delVenue]'
        ,places_total = '$_POST[delPlaces]'
        ,places_remaining = '$_POST[delLeftPlaces]'
        ,start_date = '$_POST[delStartDate]'
        ,num_days = '$_POST[delNumberOfDays]'
        ,start_time = '$_POST[delStartTime]'
        ,end_time = '$_POST[delEndTime]'
        WHERE course_id = '$_POST[delId]'";

if (!mysqli_query($con, $sql)) {
    $sqlError = mysqli_error($con);
} else {
    $rows = mysqli_affected_rows($con);
}

mysqli_close($con);//close connection
?>

<!-- result Modal -->
<?php
$rows = $rows ?? 0;
    $modalTitle = 'Update Result';
    if ($rows != 0) {
        $modalMessage = 'Course record for ' . $_POST['amendTitle'] . ' has been updated.';
    } else {
        $modalMessage = 'No records were changed.';
    }

$returnHref = 'coursePageAmend.html.php';
$returnLabel = 'Return to Previous Screen';
$cssHref = '../../Main.css';
require_once __DIR__ . '/../../resultModal.inc.php';
?>