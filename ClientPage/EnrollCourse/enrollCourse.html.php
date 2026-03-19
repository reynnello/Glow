<!--
Name: Oleksandr Storozhuk
ID: C00313344
Date: 19/03/2026
-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enroll on a Training Course</title>
    <link rel="stylesheet" type="text/css" href="../../Main.css">
</head>

<body>

<header class="topbar">
    <a class="brand" href="mainPage.html.php" aria-label="Go to Main Page">
        <div class="logo">
            <img src="../../resources/img/logo.jpeg" alt="Glow Jobs Logo">
        </div>
        <div class="brand-text">
            <div class="brand-title">Glow Jobs</div>
            <div class="brand-subtitle">Enroll on a Training Course</div>
        </div>
    </a>

    <!-- Tabs placeholders -->
    <nav class="tabs" aria-label="Primary navigation">
        <a class="tab active" href="../clientpage.html">Client</a>
        <a class="tab" href="../../JobPage/jobPage.html">Job</a>
        <a class="tab" href="../../TrainingCoursePage/trainingcoursepage.html">Training Course</a>
        <a class="tab" href="../../CompanyPage/companyPage.html">Company</a>
    </nav>
</header>

<main class="page">
    <!-- Main card -->
    <section class="card">
        <h1>Enroll on a Training Course</h1>
        <p class="hint">Please select a client you wish to enroll and then click the enroll button. Please make sure that you chose the correct client and double-check the information</p>

        <form name="enrolForm" action="enrollCoursePost.php" method="post" onsubmit="return confirmCheck()">

            <!-- Client listbox -->
            <div class="field">
                <label for="clientListbox">Select Client</label>
                <?php include 'enrollClientListbox.php'; ?>
            </div>

            <!-- Course listbox -->
            <div class="field">
                <label for="courseListbox">Select Training Course</label>
                <?php include 'enrollCourseListbox.php'; ?>
            </div>

            <!-- Course info fields (read-only, populated by JS) -->
            <div class="form-grid">
                <div class="field">
                    <label for="courseId">Course ID</label>
                    <input type="text" name="courseId" id="courseId" disabled>
                </div>

                <div class="field">
                    <label for="courseTitle">Course Title</label>
                    <input type="text" name="courseTitle" id="courseTitle" disabled>
                </div>

                <div class="field">
                    <label for="courseProvider">Provider</label>
                    <input type="text" name="courseProvider" id="courseProvider" disabled>
                </div>

                <div class="field">
                    <label for="courseVenue">Venue</label>
                    <input type="text" name="courseVenue" id="courseVenue" disabled>
                </div>

                <div class="field">
                    <label for="courseStartDate">Start Date</label>
                    <input type="text" name="courseStartDate" id="courseStartDate" disabled>
                </div>

                <div class="field">
                    <label for="courseNumDays">Number of Days</label>
                    <input type="text" name="courseNumDays" id="courseNumDays" disabled>
                </div>

                <div class="field">
                    <label for="courseStartTime">Start Time</label>
                    <input type="text" name="courseStartTime" id="courseStartTime" disabled>
                </div>

                <div class="field">
                    <label for="courseEndTime">End Time</label>
                    <input type="text" name="courseEndTime" id="courseEndTime" disabled>
                </div>

                <div class="field">
                    <label for="courseFee">Course Fee (&euro;)</label>
                    <input type="text" name="courseFee" id="courseFee" disabled>
                </div>

                <div class="field">
                    <label for="coursePlaces">Places Remaining</label>
                    <input type="text" name="coursePlaces" id="coursePlaces" disabled>
                </div>

                <div class="field">
                    <label for="courseDescription">Description</label>
                    <input type="text" name="courseDescription" id="courseDescription" disabled>
                </div>
            </div>

            <!-- Deposit info -->
            <div id="depositInfo" style="display:none; margin: 14px 0; padding: 12px; border: 1px solid #ccc; background: #f9f9f9;">
                <strong>Deposit Required (10%):</strong>
                <span id="depositDisplay"></span>
                <br>
                <small>You must pay this deposit amount to confirm your place on the course.</small>
                <!-- Hidden fields passed to POST -->
                <input type="hidden" name="depositAmount" id="depositAmount">
                <input type="hidden" name="clientId" id="clientId">
                <input type="hidden" name="clientName" id="clientName">
            </div>

            <div style="margin-top: 14px;">
                <input type="submit" value="Confirm Enrolment" class="btn primary" id="enrolBtn" disabled>
                <a href="../clientPage.html" class="btn">Back</a>
            </div>

        </form>

        <p id="display" style="margin-top: 12px; color: red;"></p>
    </section>

    <!-- Side info cards -->
    <section class="info">
        <div class="info-card">
            <h2>How it works</h2>
            <p>
                Select a client from the first list, then select a training course.
                The course details will populate automatically.
                A 10% deposit will be shown before you confirm.
            </p>
        </div>

        <div class="info-card">
            <h2>What happens on enrolment</h2>
            <p>
                A new enrolment record is created, the number of available places
                on the course is reduced by 1, and the client's training course
                count is updated.
            </p>
        </div>
    </section>

</main>

<footer class="footer">
    <span>&copy; 2026 Glow Jobs Agency - "We are the best at what we do!"</span>
</footer>

<script>
    function populateClient()
    {
        var sel = document.getElementById("clientListbox");
        var result = sel.options[sel.selectedIndex].value;

        if (result === '')
        {
            document.getElementById("clientId").value   = '';
            document.getElementById("clientName").value = '';
            checkReady();
            return;
        }

        var details = result.split('|');

        document.getElementById("clientId").value   = details[0];
        document.getElementById("clientName").value = details[1];

        checkReady();
    }

    function populateCourse()
    {
        var sel = document.getElementById("courseListbox");
        var result = sel.options[sel.selectedIndex].value;

        if (result === '')
        {
            clearCourseFields();
            checkReady();
            return;
        }

        var details = result.split('|');

        document.getElementById("courseId").value          = details[0];
        document.getElementById("courseTitle").value       = details[1];
        document.getElementById("courseProvider").value    = details[2];
        document.getElementById("courseDescription").value = details[3];
        document.getElementById("courseFee").value         = details[4];
        document.getElementById("courseVenue").value       = details[5];
        document.getElementById("coursePlaces").value      = details[6];
        document.getElementById("courseStartDate").value   = details[7];
        document.getElementById("courseNumDays").value     = details[8];
        document.getElementById("courseStartTime").value   = details[9];
        document.getElementById("courseEndTime").value     = details[10];

        // Calculate 10% deposit
        var fee     = parseFloat(details[4]);
        var deposit = (fee * 0.10).toFixed(2);

        document.getElementById("depositAmount").value  = deposit;
        document.getElementById("depositDisplay").textContent = '€' + deposit;
        document.getElementById("depositInfo").style.display = 'block';

        checkReady();
    }

    function clearCourseFields()
    {
        document.getElementById("courseId").value          = '';
        document.getElementById("courseTitle").value       = '';
        document.getElementById("courseProvider").value    = '';
        document.getElementById("courseDescription").value = '';
        document.getElementById("courseFee").value         = '';
        document.getElementById("courseVenue").value       = '';
        document.getElementById("coursePlaces").value      = '';
        document.getElementById("courseStartDate").value   = '';
        document.getElementById("courseNumDays").value     = '';
        document.getElementById("courseStartTime").value   = '';
        document.getElementById("courseEndTime").value     = '';
        document.getElementById("depositInfo").style.display = 'none';
    }

    function checkReady()
    {
        var clientSelected = document.getElementById("clientListbox").value !== '';
        var courseSelected = document.getElementById("courseListbox").value !== '';
        var places         = parseInt(document.getElementById("coursePlaces").value) || 0;

        var btn = document.getElementById("enrolBtn");

        if (clientSelected && courseSelected && places > 0)
        {
            btn.disabled = false;
            document.getElementById("display").textContent = '';
        }
        else if (clientSelected && courseSelected && places <= 0)
        {
            btn.disabled = true;
            document.getElementById("display").textContent = 'No places remaining on this course.';
        }
        else
        {
            btn.disabled = true;
            document.getElementById("display").textContent = '';
        }
    }

    function confirmCheck()
    {
        var response = confirm('You are about to enrol this client. A deposit of €' + document.getElementById("depositAmount").value + ' will be required. Proceed?');

        if (response)
        {
            // Enable hidden fields so they are submitted
            document.getElementById("clientId").disabled    = false;
            document.getElementById("clientName").disabled  = false;
            document.getElementById("courseId").disabled    = false;
            document.getElementById("courseTitle").disabled = false;
            return true;
        }
        else
        {
            return false;
        }
    }
</script>

</body>
</html>
