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

// All 3 succeeded - show confirmation
echo mysqli_affected_rows($con) . " record(s) updated <br>";
echo "Enrolment confirmed!<br>";
echo "Client ID: "     . $_POST['clientId']      . "<br>";
echo "Client Name: "   . $_POST['clientName']    . "<br>";
echo "Course ID: "     . $_POST['courseId']      . "<br>";
echo "Course Title: "  . $_POST['courseTitle']   . "<br>";
echo "Date Enrolled: " . $today                  . "<br>";
echo "Deposit Paid: &euro;" . $_POST['depositAmount'] . "<br>";

mysqli_close($con);
?>

<form action="enrollCourse.html.php" method="post">
    <input type="submit" value="Return to Previous Screen">
</form>
