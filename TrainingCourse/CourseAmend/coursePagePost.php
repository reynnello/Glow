<!--Name: Dzheffriei Ihesinulo-->
<!--Student ID: C00311856-->
<!--Date: 17.02.26-->
<?php
/** @var mysqli $con */ //connection to db necessary for phpstorm
require_once __DIR__ . '/../../db.inc.php';
ini_set('display_errors', 1); //display error
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


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

if (! mysqli_query($con,$sql)) //if connection is not successful
{
    echo "Error ".mysqli_error($con);
}
else
{
    if (mysqli_affected_rows($con) != 0) //if rows affected
    {
        echo mysqli_affected_rows($con)." record(s) updated <br>"; // print the details
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
            ." has been updated";
    }
    else
    {
        echo "No records were changed";//else print
    }
}

mysqli_close($con);//close connection
?>
<form action = "coursePageAmend.html.php" method = "post" />

<input type = "submit" value = "Return to Previous Screen"><!--Return to the previous page-->
</form>