<!--Name: Dzheffriei Ihesinulo, Anton Opria, Oleksandr Storozhuk -->
<!--Student ID: C00311856, C00309433, C00313344 -->
<!--Date: 17.02.26-->
<?php
/** @var mysqli $con */
require_once __DIR__ . '/../../db.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$clientId = isset($_GET['clientId']) ? mysqli_real_escape_string($con, $_GET['clientId']) : '';

if ($clientId === '')
{
    echo "<option value=''>-- No Client Selected --</option>";
    exit;
}

$sql = "SELECT e.enrolment_id, e.course_id, e.date_enrolled, e.deposit_amount,
               t.course_title, t.course_provider, t.venue, t.start_date
        FROM enrolment e
        INNER JOIN training_course t ON e.course_id = t.course_id
        WHERE e.client_id = '$clientId'
          AND e.is_deleted = 0
        ORDER BY t.start_date";

if (!$result = mysqli_query($con, $sql))
{
    echo "<option value=''>-- Error loading enrolments --</option>";
    exit;
}

if (mysqli_num_rows($result) === 0)
{
    echo "<option value=''>-- No Active Enrolments Found --</option>";
    exit;
}

echo "<option value=''>-- Select an Enrolment --</option>";

while ($row = mysqli_fetch_array($result))
{
    $enrolmentId    = $row['enrolment_id'];
    $courseId       = $row['course_id'];
    $courseTitle    = htmlspecialchars($row['course_title']);
    $courseProvider = htmlspecialchars($row['course_provider']);
    $venue          = htmlspecialchars($row['venue']);
    $startDate      = $row['start_date'];
    $dateEnrolled   = $row['date_enrolled'];
    $depositAmount  = $row['deposit_amount'];

    // Pipe-delimited value: enrolmentId|courseId|courseTitle|courseProvider|venue|startDate|dateEnrolled|depositAmount
    $val = "$enrolmentId|$courseId|$courseTitle|$courseProvider|$venue|$startDate|$dateEnrolled|$depositAmount";

    echo "<option value='$val'>$courseTitle - Enrolled: $dateEnrolled</option>";
}
?>
