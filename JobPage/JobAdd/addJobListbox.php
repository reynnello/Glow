<?php
/*
     * Name: Anton Opria
     * Student ID: C00309433
     * Date: 25.02.2026
     */
/** @var mysqli $con */ //connection to db necessary for phpstorm
require_once __DIR__ . '/../../db.inc.php';
ini_set('display_errors', 1); //display error
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$sql = "SELECT company_id, company_name FROM Company where is_deleted = 0"; //querying the db

if (!$result = mysqli_query($con, $sql)) //checking db connection
{
    die('Error in querying the database' . mysqli_error($con));
}

echo "<select name = 'companyList' id = 'companyList' onclick = 'populate()'>"; //setting id to 'comapnyList' and setting the onclick to populate function
echo"</select>";
mysqli_close($con);
?>