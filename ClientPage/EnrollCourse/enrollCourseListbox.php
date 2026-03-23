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

$sql = "SELECT course_id, course_title, course_provider, course_description, fee, venue, places_remaining, start_date, num_days, start_time, end_time FROM training_course WHERE is_deleted = 0 AND status = 'taking_bookings' ORDER BY course_title";

if (!$result = mysqli_query($con, $sql))
{
    die('Error in querying the database' . mysqli_error($con));
}

echo "<select name='courseListbox' id='courseListbox' onchange='populateCourse()'>";
echo "<option hidden>-- Select a Course --</option>";

while ($row = mysqli_fetch_array($result))
{
    $courseId          = $row['course_id'];
    $courseTitle       = $row['course_title'];
    $courseProvider    = $row['course_provider'];
    $courseDescription = $row['course_description'];
    $fee               = $row['fee'];
    $venue             = $row['venue'];
    $placesRemaining   = $row['places_remaining'];
    $startDate         = $row['start_date'];
    $numDays           = $row['num_days'];
    $startTime         = $row['start_time'];
    $endTime           = $row['end_time'];

    $allText = "$courseId|$courseTitle|$courseProvider|$courseDescription|$fee|$venue|$placesRemaining|$startDate|$numDays|$startTime|$endTime";

    echo "<option value='$allText'>$courseTitle - &euro;$fee</option>";
}

echo "</select>";
?>
