<!--
Name: Oleksandr Storozhuk
ID: C00313344
Date: 22/02/2026
-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Amend/View Client</title>
    <link rel="stylesheet" type="text/css" href="../../Main.css">
    <script src="../../Main.js"></script>
</head>

<body>

<header class="topbar">
    <!--Logo-->
    <a class="brand" href="mainPage.html.php" aria-label="Go to Main Page">
        <div class="logo">
            <img src="../../resources/img/logo.jpeg" alt="Glow Jobs Logo">
        </div>
        <div class="brand-text">
            <div class="brand-title">Glow Jobs</div>
            <div class="brand-subtitle">Amend / View Client</div>
        </div>
    </a>

    <!-- Tabs placeholders -->
    <nav class="tabs" aria-label="Primary navigation">
        <a class="tab active" href="../clientPage.html">Client</a>
        <a class="tab" href="../JobPage/jobpage.html">Job</a>
        <a class="tab" href="../TrainingCoursePage/trainingcoursepage.html">Training Course</a>
        <a class="tab" href="../../CompanyPage/companyPage.html">Company</a>
    </nav>
</header>

<main class="page">
    <!-- Main card -->
    <section class="card">
        <h1>Amend/View Client</h1>
        <p class="hint">Please select a client and then click the amend button if you wish to update.</p>

        <!-- Listbox -->
        <div class="field">
            <?php include 'clientListbox.php'; ?>
        </div>

        <!-- Actions row -->
        <div style="display:flex; gap:10px; flex-wrap:wrap; margin-bottom: 12px;">
            <input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()" class="btn">
        </div>

        <!-- Form -->
        <form name="myForm" action="clientPagePost.php" onsubmit="return confirmCheck()" method="post">
            <div class="form-grid">
                <div class="field">
                    <label for="amendId">Client Id</label>
                    <input type="text" name="amendId" id="amendId" disabled>
                </div>

                <div class="field">
                    <label for="amendName">Client Name</label>
                    <input type="text" name="amendName" id="amendName" disabled>
                </div>

                <div class="field">
                    <label for="amendAddress">Client Address</label>
                    <input type="text" name="amendAddress" id="amendAddress" disabled>
                </div>

                <div class="field">
                    <label for="amendEircode">Eircode</label>
                    <input type="text" name="amendEircode" id="amendEircode" disabled>
                </div>

                <div class="field">
                    <label for="amendPhone">Phone Number</label>
                    <input type="tel" name="amendPhone" id="amendPhone" pattern="[+0-9 ]{7,20}" disabled>
                </div>

                <div class="field">
                    <label for="amendDob">Date of Birth</label>
                    <input type="text" name="amendDob" id="amendDob" disabled>
                </div>

                <div class="field">
                    <label for="amendDriverLicense">Driver License Type</label>
                    <input type="text" name="amendDriverLicense" id="amendDriverLicense" disabled>
                </div>

                <div class="field">
                    <label for="amendJobTitle">Job Title Interest</label>
                    <input type="text" name="amendJobTitle" id="amendJobTitle" disabled>
                </div>

                <div class="field">
                    <label for="amendQualifications">Qualifications</label>
                    <input type="text" name="amendQualifications" id="amendQualifications" disabled>
                </div>

                <div class="field">
                    <label for="amendMinAnnualSalary">Minimum Annual Salary</label>
                    <input type="text" name="amendMinAnnualSalary" id="amendMinAnnualSalary" disabled>
                </div>
            </div>

            <div style="margin-top: 14px;">
                <input type="submit" value="Save Changes" class="btn primary">
                <a href="../clientPage.html" class="btn">Back</a>
            </div>
        </form>

        <p id="display" style="margin-top: 12px;"></p>
    </section>

    <!-- Side info cards -->
    <section class="info">
        <div class="info-card">
            <h2>How it works</h2>
            <p>
                Select a client from the list. Click <b>Amend Details</b> to unlock fields. Click <b>Save Changes</b>
                to update the record.
            </p>
        </div>

        <div class="info-card">
            <h2>Note</h2>
            <p>
                We use <b>|</b> as a separator in the listbox value to avoid issues with commas in addresses.
            </p>
        </div>
    </section>
</main>

<footer class="footer">
    <span>© 2026 Glow Jobs Agency - "We are the best at what we do!"</span>
</footer>

<script>
    function populate() //populate function is used to fill the html fields with data
    {
        var sel = document.getElementById("clientListbox");
        var result;
        result = sel.options[sel.selectedIndex].value;
        var clientDetails = result.split('|');

        document.getElementById("amendId").value = clientDetails[0];
        document.getElementById("amendName").value = clientDetails[1];
        document.getElementById("amendAddress").value = clientDetails[2];
        document.getElementById("amendEircode").value = clientDetails[3];
        document.getElementById("amendPhone").value = clientDetails[4];
        document.getElementById("amendWebsite").value = clientDetails[5];
        document.getElementById("amendDescription").value = clientDetails[6];
        document.getElementById("amendJobTitle").value = clientDetails[7];
        document.getElementById("amendQualifications").value = clientDetails[8];
        document.getElementById("amendMinAnnualSalary").value = clientDetails[9];
    }

    function toggleLock()//function that unlock/locks the data and changes the button depending on the button state
    {
        if (document.getElementById("amendViewbutton").value == "Amend Details")
        {
            document.getElementById("amendName").disabled = false;
            document.getElementById("amendAddress").disabled = false;
            document.getElementById("amendEircode").disabled = false;
            document.getElementById("amendPhone").disabled = false;
            document.getElementById("amendDob").disabled = false;
            document.getElementById("amendDriverLicense").disabled = false;
            document.getElementById("amendJobTitle").disabled = false;
            document.getElementById("amendQualifications").disabled = false;
            document.getElementById("amendMinAnnualSalary").disabled = false;

            document.getElementById("amendViewbutton").value = "View Details";
        }
        else
        {
            document.getElementById("amendName").disabled = true;
            document.getElementById("amendAddress").disabled = true;
            document.getElementById("amendEircode").disabled = true;
            document.getElementById("amendPhone").disabled = true;
            document.getElementById("amendDob").disabled = true;
            document.getElementById("amendDriverLicense").disabled = true;
            document.getElementById("amendJobTitle").disabled = true;
            document.getElementById("amendQualifications").disabled = true;
            document.getElementById("amendMinAnnualSalary").disabled = true;

            document.getElementById("amendViewbutton").value = "Amend Details";
        }
    }

    function confirmCheck() //confirm check function that asks the user for confirmation
    {
        var response;
        response = confirm('Are you sure you want to save these changes?');
        if (response)
        {
            document.getElementById("amendId").disabled = false;
            document.getElementById("amendName").disabled = false;
            document.getElementById("amendAddress").disabled = false;
            document.getElementById("amendEircode").disabled = false;
            document.getElementById("amendPhone").disabled = false;
            document.getElementById("amendDob").disabled = false;
            document.getElementById("amendDriverLicense").disabled = false;
            document.getElementById("amendJobTitle").disabled = false;
            document.getElementById("amendQualifications").disabled = false;
            document.getElementById("amendMinAnnualSalary").disabled = false;
            return true;
        }
        else
        {
            populate();
            toggleLock();
            return false;
        }
    }
</script>

</body>
</html>
