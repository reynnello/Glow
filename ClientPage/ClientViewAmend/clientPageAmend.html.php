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
    <link rel="icon" type="image/png" href="../../resources/img/logo.png">
</head>

<body>

<!-- Top bar: logo links back to main page, tabs navigate between sections -->
<header class="topbar">
    <a class="brand" href="../../mainPage.html" aria-label="Go to Main Page">
        <div class="logo">
            <img src="../../resources/img/logo.png" alt="Glow Logo">
        </div>
        <div class="brand-text">
            <div class="brand-subtitle">Amend / View Client</div>
        </div>
    </a>

    <!-- Client tab is marked active since we are on this section -->
    <nav class="tabs" aria-label="Primary navigation">
        <a class="tab active" href="../clientPage.html">Client</a>
        <a class="tab" href="../../JobPage/jobPage.html">Job</a>
        <a class="tab" href="../../TrainingCourse/coursePage.html">Training Course</a>
        <a class="tab" href="../../CompanyPage/companyPage.html">Company</a>
    </nav>
</header>

<!-- Two-column layout: form on left, info cards on right -->
<main class="page">

    <section class="card">
        <h1>Amend/View Client</h1>
        <p class="hint">Please select a client and then click the amend button if you wish to update.</p>

        <!-- Toggles fields between locked (view) and unlocked (edit) -->
        <div style="display:flex; gap:10px; flex-wrap:wrap; margin-bottom: 12px;">
            <input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()" class="btn">
        </div>

        <!-- Form posts to clientPagePost.php; confirmCheck() asks for confirmation before submit -->
        <form name="myForm" action="clientPagePost.php" onsubmit="return confirmCheck()" method="post">
            <div class="form-grid">

                <!-- Listbox included from PHP; selecting a client fires populate() -->
                <div class="field field-big">
                    <label for="clientListbox">Client</label>
                    <?php include 'clientListbox.php'; ?>
                </div>

                <!-- All fields start disabled; toggleLock() enables them for editing -->
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
                    <select name="amendDriverLicense" id="amendDriverLicense" disabled>
						<option hidden>Select</option>
						<option value="Full">Full</option>
						<option value="Provisional">Provisional</option>
						<option value="None">None</option>
					</select>
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
    <span>© 2026 - "We are the best at what we do!"</span>
    <span class="github-link">
        <a href="https://github.com/reynnello/Glow" target="_blank" rel="noopener noreferrer" aria-label="View the project on GitHub">
            <img src="../../resources/img/github.svg" alt="GitHub" />
        </a>
    </span>
</footer>

<script>
    // Splits the selected listbox value on '|' and fills all form fields
    function populate() {
        var sel = document.getElementById("clientListbox");
        var clientDetails = sel.options[sel.selectedIndex].value.split('|');

        document.getElementById("amendId").value             = clientDetails[0];
        document.getElementById("amendName").value           = clientDetails[1];
        document.getElementById("amendAddress").value        = clientDetails[2];
        document.getElementById("amendEircode").value        = clientDetails[3];
        document.getElementById("amendPhone").value          = clientDetails[4];
        document.getElementById("amendDob").value            = clientDetails[5];
        document.getElementById("amendDriverLicense").value  = clientDetails[6];
        document.getElementById("amendJobTitle").value       = clientDetails[7];
        document.getElementById("amendQualifications").value = clientDetails[8];
        document.getElementById("amendMinAnnualSalary").value = clientDetails[9];
    }

    // Toggles all editable fields between disabled and enabled,
    // and swaps the button label between "Amend Details" / "View Details"
    function toggleLock() {
        var btn     = document.getElementById("amendViewbutton");
        var locking = btn.value === "Amend Details"; // true = unlocking fields

        var fields = ["amendName","amendAddress","amendEircode","amendPhone",
                      "amendDob","amendDriverLicense","amendJobTitle",
                      "amendQualifications","amendMinAnnualSalary"];

        fields.forEach(function(id) {
            document.getElementById(id).disabled = !locking;
        });

        btn.value = locking ? "View Details" : "Amend Details";
    }

    // Asks for confirmation; if confirmed, re-enables all fields so they submit
    function confirmCheck() {
        var response = confirm('Are you sure you want to save these changes?');
        if (response) {
            var fields = ["amendId","amendName","amendAddress","amendEircode","amendPhone",
                          "amendDob","amendDriverLicense","amendJobTitle",
                          "amendQualifications","amendMinAnnualSalary"];
            fields.forEach(function(id) {
                document.getElementById(id).disabled = false;
            });
            return true;
        } else {
            // Reset fields and re-lock on cancel
            populate();
            toggleLock();
            return false;
        }
    }
</script>

</body>
</html>
