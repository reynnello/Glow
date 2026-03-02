<?php

$host = "localhost:3306"; //host
$user = "jeff"; //username
$pass = "StrongPass123!"; //password
$db   = "Employment Agency System"; //db name

$con = new mysqli($host, $user, $pass, $db); //connection

if ($con->connect_error) { //if connection failed
    die("Connection failed: " . $con->connect_error);// print the error
}

?>