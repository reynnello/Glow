<!--Name: Dzheffriei Ihesinulo-->
<!--Student ID: C00311856-->
<!--Date: 17.02.26-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cancel Enrolment</title>
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
            <div class="brand-subtitle">Cancel Enrolment</div>
        </div>
    </a>

    <nav class="tabs" aria-label="Primary navigation">
        <a class="tab active" href="../../ClientPage/clientPage.html">Client</a>
        <a class="tab" href="../../JobPage/jobPage.html">Job</a>
        <a class="tab" href="../coursePage.html">Training Course</a>
        <a class="tab" href="../../CompanyPage/companyPage.html">Company</a>
    </nav>
</header>

<main class="page">
    <section class="card">
        <h1>Cancel Enrolment</h1>
        <p class="hint">Select a client, then choose the enrolment you wish to cancel. Please double-check the details before confirming.</p>

        <form name="cancelForm" action="cancelEnrolmentPost.php" method="post" onsubmit="return confirmCheck()">

            <!-- Client listbox -->
            <div class="field">
                <label for="clientListbox">Select Client</label>
                <?php include 'cancelClientListbox.php'; ?>
            </div>

            <!-- Enrolment listbox (populated by JS via AJAX) -->
            <div class="field">
                <label for="enrolmentListbox">Select Enrolment</label>
                <select name="enrolmentListbox" id="enrolmentListbox" onchange="populateEnrolment()" disabled>
                    <option value="">-- Select a Client First --</option>
                </select>
            </div>

            <!-- Enrolment detail fields (read-only, populated by JS) -->
            <div class="form-grid">
                <div class="field">
                    <label for="enrolmentId">Enrolment ID</label>
                    <input type="text" id="enrolmentId" disabled>
                </div>

                <div class="field">
                    <label for="courseTitle">Course Title</label>
                    <input type="text" id="courseTitle" disabled>
                </div>

                <div class="field">
                    <label for="courseProvider">Provider</label>
                    <input type="text" id="courseProvider" disabled>
                </div>

                <div class="field">
                    <label for="courseVenue">Venue</label>
                    <input type="text" id="courseVenue" disabled>
                </div>

                <div class="field">
                    <label for="courseStartDate">Start Date</label>
                    <input type="text" id="courseStartDate" disabled>
                </div>

                <div class="field">
                    <label for="dateEnrolled">Date Enrolled</label>
                    <input type="text" id="dateEnrolled" disabled>
                </div>

                <div class="field">
                    <label for="depositAmount">Deposit Paid (&euro;)</label>
                    <input type="text" id="depositAmount" disabled>
                </div>
            </div>

            <!-- Hidden fields passed to POST -->
            <input type="hidden" name="enrolmentId"  id="enrolmentIdHidden">
            <input type="hidden" name="clientId"     id="clientIdHidden">
            <input type="hidden" name="clientName"   id="clientNameHidden">
            <input type="hidden" name="courseId"     id="courseIdHidden">
            <input type="hidden" name="courseTitle"  id="courseTitleHidden">

            <div style="margin-top: 14px;">
                <input type="submit" value="Confirm Cancellation" class="btn primary" id="cancelBtn" disabled>
                <a href="../coursePage.html" class="btn">Back</a>
            </div>

        </form>

        <p id="display" style="margin-top: 12px; color: red;"></p>
    </section>

    <!-- Side info cards -->
    <section class="info">
        <div class="info-card">
            <h2>How it works</h2>
            <p>
                Select a client from the first list. Their active enrolments will
                load automatically. Choose the enrolment you wish to cancel and
                confirm.
            </p>
        </div>

        <div class="info-card">
            <h2>What happens on cancellation</h2>
            <p>
                The enrolment is marked as cancelled, the available places on the
                course are increased by 1, and the client's training course count
                is reduced by 1.
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
        var clientId = sel.options[sel.selectedIndex].value;

        // Reset enrolment listbox and detail fields
        clearEnrolmentFields();
        document.getElementById("cancelBtn").disabled = true;
        document.getElementById("display").textContent = '';

        var enrolSel = document.getElementById("enrolmentListbox");
        enrolSel.innerHTML = '<option value="">-- Loading... --</option>';
        enrolSel.disabled  = true;

        // Store client hidden fields
        var parts = sel.options[sel.selectedIndex].getAttribute("data-info");
        if (parts)
        {
            document.getElementById("clientIdHidden").value   = parts.split('|')[0];
            document.getElementById("clientNameHidden").value = parts.split('|')[1];
        }

        if (clientId === '')
        {
            enrolSel.innerHTML = '<option value="">-- Select a Client First --</option>';
            return;
        }

        // AJAX: fetch enrolments for this client
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "cancelEnrolmentListbox.php?clientId=" + encodeURIComponent(clientId), true);
        xhr.onload = function ()
        {
            if (xhr.status === 200)
            {
                enrolSel.innerHTML = xhr.responseText;
                enrolSel.disabled  = false;
            }
            else
            {
                enrolSel.innerHTML = '<option value="">-- Error loading enrolments --</option>';
            }
        };
        xhr.send();
    }

    function populateEnrolment()
    {
        var sel    = document.getElementById("enrolmentListbox");
        var result = sel.options[sel.selectedIndex].value;

        if (result === '')
        {
            clearEnrolmentFields();
            document.getElementById("cancelBtn").disabled = true;
            return;
        }

        var d = result.split('|');
        // d[0] enrolmentId, d[1] courseId, d[2] courseTitle, d[3] courseProvider,
        // d[4] venue, d[5] startDate, d[6] dateEnrolled, d[7] depositAmount

        document.getElementById("enrolmentId").value    = d[0];
        document.getElementById("courseTitle").value    = d[2];
        document.getElementById("courseProvider").value = d[3];
        document.getElementById("courseVenue").value    = d[4];
        document.getElementById("courseStartDate").value= d[5];
        document.getElementById("dateEnrolled").value   = d[6];
        document.getElementById("depositAmount").value  = '\u20ac' + d[7];

        // Populate hidden fields for POST
        document.getElementById("enrolmentIdHidden").value  = d[0];
        document.getElementById("courseIdHidden").value     = d[1];
        document.getElementById("courseTitleHidden").value  = d[2];

        document.getElementById("cancelBtn").disabled = false;
        document.getElementById("display").textContent = '';
    }

    function clearEnrolmentFields()
    {
        var fields = ["enrolmentId","courseTitle","courseProvider",
                      "courseVenue","courseStartDate","dateEnrolled","depositAmount"];
        fields.forEach(function(id){ document.getElementById(id).value = ''; });

        document.getElementById("enrolmentIdHidden").value = '';
        document.getElementById("courseIdHidden").value    = '';
        document.getElementById("courseTitleHidden").value = '';
    }

    function confirmCheck()
    {
        var response = confirm('Are you sure you want to cancel this enrolment? This action cannot be undone.');

        if (response)
        {
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
