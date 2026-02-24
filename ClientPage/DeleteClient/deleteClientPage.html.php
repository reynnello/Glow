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
    <script src="../../Main.js"></script>
</head>

<body>

<header class="topbar">
    <a class="brand" href="mainPage.html.php" aria-label="Go to Main Page">
        <div class="logo">
            <img src="../../resources/img/logo.jpeg" alt="Glow Jobs Logo">
        </div>
        <div class="brand-text">
            <div class="brand-title">Glow Jobs</div>
            <div class="brand-subtitle">Delete Client</div>
        </div>
    </a>

    <!-- Tabs placeholders -->
    <nav class="tabs" aria-label="Primary navigation">
        <a class="tab active" href="../clientpage.html">Client</a>
        <a class="tab" href="../JobPage/jobpage.html">Job</a>
        <a class="tab" href="../TrainingCoursePage/trainingcoursepage.html">Training Course</a>
        <a class="tab" href="../CompanyPage/companyPage.html">Company</a>
        <a class="tab" href="../MainPage/mainpage.html">Main Page</a>
    </nav>
</header>

<main class="page">
    <!-- Main card -->
    <section class="card">
        <h1>Delete Client</h1>
        <p class="hint">Please select a client and then click the delete button. Please make sure that you chose the correct client and double-check the information</p>

        <!-- Listbox -->
        <div class="field">
            <?php include 'deleteClientListbox.php'; ?>
        </div>

        <!-- Form -->
        <form name="myForm" action="deleteClientPagePost.php" onsubmit="return confirmCheck()" method="post">
            <div class="form-grid">
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
                Select a client from the list. Double-check the information. Click <b>Delete Client</b> to delete the records.
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
</body>
</html>
