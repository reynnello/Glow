<?php
/*
     * Name: Dzheffriei Iheisnulo
     * Student ID: C00311856
     * Date: 17.02.2026
     */
/** @var mysqli $con */ //connection to db necessary for phpstorm
require_once __DIR__ . '/./Glow/db.inc.php';
mysqli_set_charset($con, "utf8mb4");
//this query is selecting using alias
//course_title,client_name,date_enrolled,deposit_amount from enrolment(alias 'e')
//joining then where client_id from enrolment and client_id from client(alias 'c') are similar
//also checking for deleted tag
$sql = "
SELECT
  tc.course_title,                 
  c.client_name,
  e.date_enrolled,
  e.deposit_amount
FROM enrolment e
JOIN client c ON c.client_id = e.client_id
JOIN training_course tc ON tc.course_id = e.course_id
WHERE e.is_deleted = 0
  AND e.date_cancelled IS NULL
  AND c.is_deleted = 0
  AND tc.is_deleted = '0'
ORDER BY tc.course_title, e.date_enrolled
";

$result = mysqli_query($con, $sql);

if (!$result) {
    die("SQL Error: " . mysqli_error($con));
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Training Courses Report</title>
    <link rel="stylesheet" href="../companyPage.css">
</head>

<body>

<!-- Top bar -->
<header class="topbar">
    <a class="brand" href="mainPage.html.php" aria-label="Go to Main Page">
        <div class="logo">
            <img src="../resources/img/logo.jpeg" alt="Glow Jobs Logo">
        </div>
        <div class="brand-text">
            <div class="brand-title">Glow Jobs</div>
            <div class="brand-subtitle">Report</div>
        </div>
    </a>

    <!-- Tabs placeholders -->
    <nav class="tabs" aria-label="Primary navigation">
        <a class="tab" href="../ClientPage/clientPage.html">Client</a>
        <a class="tab" href="../JobPage/jobPage.html">Job</a>
        <a class="tab" href="../TrainingCoursePage/trainingCoursePage.html">Training Course</a>
        <a class="tab active" href="../companyPage.html">Company</a>
    </nav>
</header>

<!-- Page layout -->
<main class="page">

    <section class="card">
        <h1>Training Courses Report</h1>
        <p class="hint">Active enrolments only.</p>
            <!--div for report table-->
        <div class="report-table">
            <!--Opening table-->
            <table style="width:100%; border-collapse: collapse;">

                <thead>
                <tr>
                    <!--Table headers-->
                    <th>Course Title</th>
                    <th>Client Name</th>
                    <th>Date Enrolled</th>
                    <th>Deposit (€)</th>
                </tr>
                </thead>

                <tbody>
                <!--Table body-->
                <?php
                //if statement checking for results
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        //opening table row
                        echo "<td>" .$row['course_title']. "</td>"; // setting table fields
                        echo "<td>" .$row['client_name'] . "</td>";
                        echo "<td>" .$row['date_enrolled'] . "</td>";
                        echo "<td>" . number_format($row['deposit_amount'], 2) . "</td>";
                        echo "</tr>"; //closing table row
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found</td></tr>"; // if empty no records found on whole 4 fields
                }
                ?>

                </tbody>

            </table>

        </div>

        <br>

        <div class="actions">
            <!--print button-->
            <button class="btn primary" onclick="window.print()">Print Report</button>
            <!--back button-->
            <a href="../companyPage.html" class="btn">Back</a>
        </div>

    </section>

</main>

<footer class="footer">
    <span>© 2026 Glow Jobs Agency - "We are the best at what we do!"</span>
</footer>

</body>
</html>
