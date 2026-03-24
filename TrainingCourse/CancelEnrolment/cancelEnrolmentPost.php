<!--Name: Dzheffriei Ihesinulo, Anton Opria, Oleksandr Storozhuk -->
<!--Student ID: C00311856, C00309433, C00313344 -->
<!--Date: 17.02.26-->
<?php
/** @var mysqli $con */
require_once __DIR__ . '/../../db.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$enrolmentId = mysqli_real_escape_string($con, $_POST['enrolmentId']);
$courseId    = mysqli_real_escape_string($con, $_POST['courseId']);
$clientId    = mysqli_real_escape_string($con, $_POST['clientId']);
$today       = date('Y-m-d');

// 1. Mark enrolment as cancelled
$sql1 = "UPDATE enrolment
         SET date_cancelled = '$today', is_deleted = '1'
         WHERE enrolment_id = '$enrolmentId'";

if (!mysqli_query($con, $sql1))
{
    echo "Error cancelling enrolment: " . mysqli_error($con);
    mysqli_close($con);
    exit;
}

if (mysqli_affected_rows($con) === 0)
{
    echo "No enrolment was updated. It may have already been cancelled.";
    mysqli_close($con);
    exit;
}

// 2. Return the place to the course
$sql2 = "UPDATE training_course
         SET places_remaining = places_remaining + 1
         WHERE course_id = '$courseId'";

if (!mysqli_query($con, $sql2))
{
    echo "Error restoring course place: " . mysqli_error($con);
    mysqli_close($con);
    exit;
}

// 3. Decrease client's training course count
$sql3 = "UPDATE client
         SET num_training_courses = num_training_courses - 1
         WHERE client_id = '$clientId'
           AND num_training_courses > 0";

if (!mysqli_query($con, $sql3))
{
    echo "Error updating client course count: " . mysqli_error($con);
    mysqli_close($con);
    exit;
}

// All 3 succeeded - show confirmation
echo "<h2>Enrolment Cancelled Successfully</h2>";
echo "Enrolment ID: "  . htmlspecialchars($_POST['enrolmentId'])  . "<br>";
echo "Client ID: "     . htmlspecialchars($_POST['clientId'])     . "<br>";
echo "Client Name: "   . htmlspecialchars($_POST['clientName'])   . "<br>";
echo "Course ID: "     . htmlspecialchars($_POST['courseId'])     . "<br>";
echo "Course Title: "  . htmlspecialchars($_POST['courseTitle'])  . "<br>";
echo "Date Cancelled: " . $today . "<br>";

mysqli_close($con);
?>

<form action="cancelEnrolment.html.php" method="post">
    <input type="submit" value="Return to Previous Screen">
</form>
