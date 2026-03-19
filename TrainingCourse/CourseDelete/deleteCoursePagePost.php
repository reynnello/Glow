<?php
/** @var mysqli $con */ //connection to db necessary for phpstorm
require_once __DIR__ . '/../../db.inc.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();



$deleteID = $_POST['delId'];

$sql = "UPDATE training_course
        SET is_deleted = '1'
        WHERE course_id = '$deleteID'";

if (!mysqli_query($con, $sql))
{
    echo "Error " . mysqli_error($con);
}
else
{
    echo mysqli_affected_rows($con) . " record(s) updated <br>";
    echo "Course ID: " . $_POST['delId'] . "<br>"
            . "; Course Title: " . $_POST['delTitle'] . "<br>"
            . "; Course Provider: " . $_POST['delProvider'] . "<br>"
            . "; Course Description: " . $_POST['delDescription'] . "<br>"
            . "; Fee: " . $_POST['delFee'] . "<br>"
            . "; Venue: " . $_POST['delVenue'] . "<br>"
            . "; Places Total: " . $_POST['delPlaces'] . "<br>"
            . "; Places Left: " . $_POST['delLeftPlaces'] . "<br>"
            . "; Course Start Date: " . $_POST['delStartDate'] . "<br>"
            . "; Number of Days: " . $_POST['delNumberOfDays'] . "<br>"
            . "; Start Time: " . $_POST['delStartTime'] . "<br>"
            . "; End Time: " . $_POST['delEndTime'] . "<br>"
            . " has been deleted";
}

mysqli_close($con);
?>
<form action="deleteCoursePage.html.php" method="post">
    <input type="submit" value="Return to Previous Screen">
</form>