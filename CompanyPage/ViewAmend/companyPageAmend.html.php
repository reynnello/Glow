<!--Name: Dzheffriei Ihesinulo-->
<!--Student ID: C00311856-->
<!--Date: 12.02.26-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Amend/View Company</title>
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
            <div class="brand-subtitle">Amend / View Company</div>
        </div>
    </a>

    <!-- Tabs placeholders -->
    <nav class="tabs" aria-label="Primary navigation">
        <a class="tab" href="../ClientPage/clientpage.html">Client</a>
        <a class="tab" href="../JobPage/jobpage.html">Job</a>
        <a class="tab" href="../TrainingCoursePage/trainingcoursepage.html">Training Course</a>
        <a class="tab active" href="../companyPage.html">Company</a>
    </nav>
</header>

<main class="page page--center">
    <!-- Main card -->
    <section class="card">
        <h1>Amend/View Company</h1>
        <p class="hint">Please select a company and then click the amend button if you wish to update.</p>

        <!-- Listbox -->
        <div class="field">
            <?php include 'companyListbox.php'; ?>
        </div>

        <!-- Actions row -->
        <div style="display:flex; gap:10px; flex-wrap:wrap; margin-bottom: 12px;">
            <input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()" class="btn">
        </div>

        <!-- Form -->
        <form name="myForm" action="companyPagePost.php" onsubmit="return confirmCheck()" method="post">
            <div class="form-grid">
                <div class="field">
                    <label for="amendId">Company Id</label>
                    <input type="text" name="amendId" id="amendId" disabled>
                </div>

                <div class="field">
                    <label for="amendName">Company Name</label>
                    <input type="text" name="amendName" id="amendName" disabled>
                </div>

                <div class="field">
                    <label for="amendAddress">Company Address</label>
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
                    <label for="amendWebsite">Company Website</label>
                    <input type="text" name="amendWebsite" id="amendWebsite" disabled>
                </div>

                <div class="field">
                    <label for="amendDescription">Business Description</label>
                    <input type="text" name="amendDescription" id="amendDescription" disabled>
                </div>

                <div class="field">
                    <label for="amendContactName">Contact Name</label>
                    <input type="text" name="amendContactName" id="amendContactName" disabled>
                </div>

                <div class="field">
                    <label for="amendContactPhone">Contact Phone</label>
                    <input type="tel" name="amendContactPhone" id="amendContactPhone" pattern="[+0-9 ]{7,20}" disabled>
                </div>

                <div class="field">
                    <label for="amendContactEmail">Contact Email</label>
                    <input type="email" name="amendContactEmail" id="amendContactEmail" disabled>
                </div>
            </div>

            <div style="margin-top: 14px;">
                <input type="submit" value="Save Changes" class="btn primary">
                <a href="../companyPage.html" class="btn">Back</a>
            </div>
        </form>

        <p id="display" style="margin-top: 12px;"></p>
    </section>

    <!-- Side info cards -->
    <section class="info">
        <div class="info-card">
            <h2>How it works</h2>
            <p>
                Select a company from the list. Click <b>Amend Details</b> to unlock fields. Click <b>Save Changes</b>
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
</body>
</html>
