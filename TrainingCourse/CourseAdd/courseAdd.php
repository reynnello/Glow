<?php
/*
     * Name: Dzheffriei Iheisnulo
     * Student ID: C00311856
     * Date: 17.02.2026
     */

/** @var mysqli $con */
require_once __DIR__ . '/../../db.inc.php';//connection to db necessary for phpstorm
ini_set('display_errors', 1); //display error
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = $_POST['addTitle']; //creating variables and passing data from html fields
$provider = $_POST['addProvider'];
$description = $_POST['addDescription'];
$fee = $_POST['addFee'];
$venue = $_POST['addVenue'];
$places_total = $_POST['addPlaces'];
$places_left = $places_total;
$startDate = $_POST['addStartDate'];
$numOfDays = $_POST['addNumberOfDays'];
$startTime = $_POST['addStartTime'];
$endTime = $_POST['addEndTime'];

//
$status = "taking_bookings";
//sql query for insert
$sql = "INSERT INTO training_course (course_title, course_provider, course_description, fee, venue, places_total, places_remaining, start_date, num_days, start_time, end_time, status)
         VALUES('$title', '$provider', '$description', '$fee', '$venue', '$places_total', '$places_left', '$startDate', '$numOfDays', '$startTime', '$endTime', '$status')";

//if connection failed or sql query is wrong
if(!mysqli_query($con, $sql))
{
    die("Ann Error in the SQL Query ". mysqli_error($con));
}
//else
echo "<br>A record has been added for   " .
    $title;
//closing connection
mysqli_close($con);
?>
<!--Button for return back-->
<form action="../coursePage.html" method="POST">
    <br>
    <input type="submit" value="Return to Company Page"/>
</form>
