<!--Name: Dzheffriei Ihesinulo, Anton Opria, Oleksandr Storozhuk -->
<!--Student ID: C00311856, C00309433, C00313344 -->
<!--Date: 17.02.26-->
<?php
/** @var mysqli $con */ //connection to db necessary for phpstorm
require_once __DIR__ . '/../../db.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$sql = "SELECT course_id, course_title, course_provider, course_description, fee, venue,
               places_total, places_remaining, start_date, num_days, start_time, end_time
        FROM training_course
        WHERE is_deleted = 0";

if (!$result = mysqli_query($con, $sql))
{
    die('Error in querying the database ' . mysqli_error($con));
}

echo "<select name='deleteCourseListbox' id='deleteCourseListbox' onclick='populate()'>";

while($row = mysqli_fetch_array($result))
{
    $courseId = $row['course_id'];
    $courseTitle = $row['course_title'];
    $courseProvider = $row['course_provider'];
    $courseDescription = $row['course_description'];
    $fee = $row['fee'];
    $venue = $row['venue'];
    $placesTotal = $row['places_total'];
    $placesLeft = $row['places_remaining'];
    $startDate = $row['start_date'];
    $numOfDays = $row['num_days'];
    $startTime = $row['start_time'];
    $endTime = $row['end_time'];

    $allText = "$courseId|$courseTitle|$courseProvider|$courseDescription|$fee|$venue|$placesTotal|$placesLeft|$startDate|$numOfDays|$startTime|$endTime";
    echo "<option value='$allText'>$courseTitle</option>";
}

echo "</select>";
mysqli_close($con);
?>