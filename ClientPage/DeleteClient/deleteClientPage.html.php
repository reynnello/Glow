<!--
Name: Oleksandr Storozhuk
ID: C00313344
Date: 22/02/2026
-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Client</title>
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
            <div class="brand-subtitle">Delete Client</div>
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
        <h1>Delete Client</h1>
        <p class="hint">Please select a client and then click the delete button. Please make sure that you chose the correct client and double-check the information.</p>

        <!-- Form posts to deleteClientPagePost.php; confirmCheck() asks for confirmation -->
        <form name="myForm" action="deleteClientPagePost.php" onsubmit="return confirmCheck()" method="post">
            <div class="form-grid">

                <!-- Listbox included from PHP; selecting a client fires populate() -->
                <div class="field field-big">
                    <label for="deleteClientListbox">Client</label>
                    <?php include 'deleteClientListbox.php'; ?>
                </div>

                <!-- All fields are read-only display; they get enabled in confirmCheck() before submit -->
                <div class="field">
                    <label for="deleteId">Client Id</label>
                    <input type="text" name="deleteId" id="deleteId" disabled>
                </div>

                <div class="field">
                    <label for="deleteName">Client Name</label>
                    <input type="text" name="deleteName" id="deleteName" disabled>
                </div>

                <div class="field">
                    <label for="deleteAddress">Client Address</label>
                    <input type="text" name="deleteAddress" id="deleteAddress" disabled>
                </div>

                <div class="field">
                    <label for="deleteEircode">Eircode</label>
                    <input type="text" name="deleteEircode" id="deleteEircode" disabled>
                </div>

                <div class="field">
                    <label for="deletePhone">Phone Number</label>
                    <input type="tel" name="deletePhone" id="deletePhone" pattern="[+0-9 ]{7,20}" disabled>
                </div>

                <div class="field">
                    <label for="deleteDob">Date of Birth</label>
                    <input type="text" name="deleteDob" id="deleteDob" disabled>
                </div>

                <div class="field">
                    <label for="deleteDriverLicense">Driver License Type</label>
                    <input type="text" name="deleteDriverLicense" id="deleteDriverLicense" disabled>
                </div>

                <div class="field">
                    <label for="deleteJobTitleInterest">Job Title Interest</label>
                    <input type="text" name="deleteJobTitleInterest" id="deleteJobTitleInterest" disabled>
                </div>

                <div class="field">
                    <label for="deleteQualifications">Qualifications</label>
                    <input type="text" name="deleteQualifications" id="deleteQualifications" disabled>
                </div>

                <div class="field">
                    <label for="deleteMinimumAnnualSalary">Minimum Annual Salary</label>
                    <input type="text" name="deleteMinimumAnnualSalary" id="deleteMinimumAnnualSalary" disabled>
                </div>

            </div>

            <div style="margin-top: 14px;">
                <input type="submit" value="Delete Client" class="btn primary">
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
                Select a client from the list. Double-check the information. Click <b>Delete Client</b> to delete the record.
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
    // Splits the selected listbox value on '|' and fills all display fields
    function populate() {
        var sel = document.getElementById("deleteClientListbox");
        var clientDetails = sel.options[sel.selectedIndex].value.split('|');

        document.getElementById("deleteId").value                  = clientDetails[0];
        document.getElementById("deleteName").value                = clientDetails[1];
        document.getElementById("deleteAddress").value             = clientDetails[2];
        document.getElementById("deleteEircode").value             = clientDetails[3];
        document.getElementById("deletePhone").value               = clientDetails[4];
        document.getElementById("deleteDob").value                 = clientDetails[5];
        document.getElementById("deleteDriverLicense").value       = clientDetails[6];
        document.getElementById("deleteJobTitleInterest").value    = clientDetails[7];
        document.getElementById("deleteQualifications").value      = clientDetails[8];
        document.getElementById("deleteMinimumAnnualSalary").value = clientDetails[9];
    }

    // Asks for confirmation; if confirmed, enables all fields so the POST data is submitted
    function confirmCheck() {
        var clientName = document.getElementById("deleteName").value;
        var response   = confirm('Are you sure you want to delete "' + clientName + '" record from the list?');

        if (response) {
            var fields = ["deleteId","deleteName","deleteAddress","deleteEircode",
                          "deletePhone","deleteDob","deleteDriverLicense",
                          "deleteJobTitleInterest","deleteQualifications","deleteMinimumAnnualSalary"];
            fields.forEach(function(id) {
                document.getElementById(id).disabled = false;
            });
            return true;
        }
        return false;
    }
</script>

</body>
</html>
