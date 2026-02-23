<?php

$host = "localhost:3306"; //host
$user = "hui"; //username
$pass = "Huihuihui123"; //password
$db   = "EmploymentAgency"; //db name

$con = new mysqli($host, $user, $pass, $db); //connection

if ($con->connect_error) { //if connection failed
    die("Connection failed: " . $con->connect_error);// print the error
}

?>