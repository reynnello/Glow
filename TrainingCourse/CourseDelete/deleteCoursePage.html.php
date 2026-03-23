<!--Name: Dzheffriei Ihesinulo-->
<!--Student ID: C00311856-->
<!--Date: 17.02.26-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Course</title>
    <link rel="stylesheet" type="text/css" href="../../Main.css">
</head>

<body>

<header class="topbar">
    <a class="brand" href="../../mainPage.html" aria-label="Go to Main Page">
        <div class="logo">
            <img src="../../resources/img/logo.jpeg" alt="Glow Jobs Logo">
        </div>
        <div class="brand-text">
            <div class="brand-title">Glow Jobs</div>
            <div class="brand-subtitle">Delete Course</div>
        </div>
    </a>

    <nav class="tabs" aria-label="Primary navigation">
        <a class="tab" href="../../ClientPage/clientPage.html">Client</a>
        <a class="tab" href="../../JobPage/jobPage.html">Job</a>
        <a class="tab active" href="../coursePage.html">Training Course</a>
        <a class="tab" href="../../CompanyPage/companyPage.html">Company</a>
    </nav>
</header>

<main class="page">
    <section class="card">
        <h1>Delete Course</h1>
        <p class="hint">
            Please select a course and then click the delete button. Please make sure that you chose the correct course and double-check the information.
        </p>



        <form name="myForm" action="deleteCoursePagePost.php" onsubmit="return confirmCheck()" method="post">
            <div class="form-grid">
            <div class="field">
                <label for="deleteCourseListbox">Select Course</label>
                <?php include 'deleteCourseListbox.php'; ?>
            </div>
            <div class="field">
                <label for="delId">Course Id</label>
                <input type="number" name="delId" id="delId" readonly>
            </div>

            <div class="field">
                <label for="delTitle">Course Title</label>
                <input type="text" name="delTitle" id="delTitle" readonly>
            </div>

            <div class="field">
                <label for="delProvider">Course Provider</label>
                <input type="text" name="delProvider" id="delProvider" readonly>
            </div>

            <div class="field">
                <label for="delDescription">Course Description</label>
                <input type="text" name="delDescription" id="delDescription" readonly>
            </div>

            <div class="field">
                <label for="delFee">Course Fee</label>
                <input type="text" name="delFee" id="delFee" readonly>
            </div>

            <div class="field">
                <label for="delVenue">Course Venue</label>
                <input type="text" name="delVenue" id="delVenue" readonly>
            </div>

            <div class="field">
                <label for="delPlaces">Course Total Places</label>
                <input type="text" name="delPlaces" id="delPlaces" readonly>
            </div>

            <div class="field">
                <label for="delLeftPlaces">Course Places Left</label>
                <input type="text" name="delLeftPlaces" id="delLeftPlaces" readonly>
            </div>

            <div class="field">
                <label for="delStartDate">Start Date</label>
                <input type="text" name="delStartDate" id="delStartDate" readonly>
            </div>

            <div class="field">
                <label for="delNumberOfDays">Course Number Of Days</label>
                <input type="text" name="delNumberOfDays" id="delNumberOfDays" readonly>
            </div>

            <div class="field">
                <label for="delStartTime">Course Start Time</label>
                <input type="text" name="delStartTime" id="delStartTime" readonly>
            </div>

            <div class="field">
                <label for="delEndTime">Course End Time</label>
                <input type="text" name="delEndTime" id="delEndTime" readonly>
            </div>

            <div style="margin-top: 14px;">
                <input type="submit" value="Delete Course" class="btn primary">
                <a href="../coursePage.html" class="btn">Back</a>
            </div>
            </div>
        </form>

        <p id="display" style="margin-top: 12px;"></p>
    </section>

    <section class="info">
        <div class="info-card">
            <h2>How it works</h2>
            <p>
                Select a course from the list. Double-check the information. Click <b>Delete Course</b> to delete the record.
            </p>
        </div>

        <div class="info-card">
            <h2>Note</h2>
            <p>
                We use <b>|</b> as a separator in the listbox value to avoid issues with commas in text.
            </p>
        </div>
    </section>
</main>

<footer class="footer">
    <span>© 2026 Glow Jobs Agency - "We are the best at what we do!"</span>
    <span class="github-link">
        <a
            href="https://github.com/reynnello/Glow"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="View the project on GitHub"
        >
            <img src="../../resources/img/github.svg" alt="GitHub" />
        </a>
    </span>
</footer>

<script>
    function populate()
    {
        var sel = document.getElementById("deleteCourseListbox");
        var result = sel.options[sel.selectedIndex].value;
        var courseDetails = result.split('|');

        document.getElementById("delId").value = courseDetails[0];
        document.getElementById("delTitle").value = courseDetails[1];
        document.getElementById("delProvider").value = courseDetails[2];
        document.getElementById("delDescription").value = courseDetails[3];
        document.getElementById("delFee").value = courseDetails[4];
        document.getElementById("delVenue").value = courseDetails[5];
        document.getElementById("delPlaces").value = courseDetails[6];
        document.getElementById("delLeftPlaces").value = courseDetails[7];
        document.getElementById("delStartDate").value = courseDetails[8];
        document.getElementById("delNumberOfDays").value = courseDetails[9];
        document.getElementById("delStartTime").value = courseDetails[10];
        document.getElementById("delEndTime").value = courseDetails[11];
    }

    function confirmCheck()
    {
        var courseTitle = document.getElementById("delTitle").value;

        if (courseTitle === "") {
            alert("Please select a course first.");
            return false;
        }

        var response = confirm('Are you sure you want to delete "' + courseTitle + '" record from the list?');

        if (response)
        {
            document.getElementById("delId").disabled = false;
            document.getElementById("delTitle").disabled = false;
            document.getElementById("delProvider").disabled = false;
            document.getElementById("delDescription").disabled = false;
            document.getElementById("delFee").disabled = false;
            document.getElementById("delVenue").disabled = false;
            document.getElementById("delPlaces").disabled = false;
            document.getElementById("delLeftPlaces").disabled = false;
            document.getElementById("delStartDate").disabled = false;
            document.getElementById("delNumberOfDays").disabled = false;
            document.getElementById("delStartTime").disabled = false;
            document.getElementById("delEndTime").disabled = false;
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