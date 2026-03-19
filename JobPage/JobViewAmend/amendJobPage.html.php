<!--
Name: Anton Opria
ID: C00309433
Date: 15/03/2026
-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Amend/View Job</title>
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
            <div class="brand-subtitle">Amend / View Job</div>
        </div>
    </a>

    <nav class="tabs" aria-label="Primary navigation">
        <a class="tab" href="../../ClientPage/clientPage.html">Client</a>
        <a class="tab active" href="../../JobPage/jobPage.html">Job</a>
        <a class="tab" href="../../TrainingCourse/coursePage.html">Training Course</a>
        <a class="tab" href="../../CompanyPage/companyPage.html">Company</a>
    </nav>
</header>

<main class="page">
    <section class="card">
        <h1>Amend/View Job</h1>
        <p class="hint">Please select a job and then click the amend button if you wish to update.</p>

        
        <div style="display:flex; gap:10px; flex-wrap:wrap; margin-bottom: 12px;">
            <input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()" class="btn">
        </div>
        
        <form name="myForm" action="amendJobPost.php" onsubmit="return confirmCheck()" method="post">
            <div class="form-grid">
                <div class="field field-big">
                    <label for="amendJobListbox">Job</label>
                    <?php include 'amendJobListbox.php'; ?>
                </div>
                <div class="field">
                    <label for="amendId">Job Id</label>
                    <input type="text" name="amendId" id="amendId" disabled>
                </div>

                <div class="field">
                    <label for="amendCompanyId">Company Id</label>
                    <input type="text" name="amendCompanyId" id="amendCompanyId" disabled>
                </div>

                <div class="field">
                    <label for="amendCompanyName">Company Name</label>
                    <input type="text" name="amendCompanyName" id="amendCompanyName" disabled>
                </div>

                <div class="field">
                    <label for="amendTitle">Job Title</label>
                    <input type="text" name="amendTitle" id="amendTitle" disabled placeholder="Cool Job">
                </div>

                <div class="field field-big">
                    <label for="amendDescription">Brief Description</label>
                    <input type="text" name="amendDescription" id="amendDescription" disabled placeholder="Description">
                </div>

                <div class="field">
                    <label for="amendQual">Qualification Required</label>
                    <input type="text" name="amendQual" id="amendQual" disabled placeholder="Junior Web Developer">
                </div>

                <div class="field">
                    <label for="amendType">Type of Work</label>
                    <input type="text" name="amendType" id="amendType" disabled placeholder="Full-time">
                </div>

                <div class="field">
                    <label for="amendAnnualSalary">Annual Salary</label>
                    <input type="number" name="amendAnnualSalary" id="amendAnnualSalary" disabled placeholder="50000">
                </div>

                <div class="radio-group" role="group" aria-labelledby="driverLicLabel">
                    <span class="radio-label" id="driverLicLabel">Drivers License Required</span>

                    <div class="radio-row">
                        <label class="radio-option" for="amendDriverLicYes">
                            <input type="radio" name="amendDriverLic" id="amendDriverLicYes" value="Yes" required disabled />
                            <span>Yes</span>
                        </label>

                        <label class="radio-option" for="amendDriverLicNo">
                            <input type="radio" name="amendDriverLic" id="amendDriverLicNo" value="No" required disabled />
                            <span>No</span>
                        </label>
                    </div>
                </div>

                <div class="field">
                    <label for="amendLocation">Location</label>
                    <input type="text" name="amendLocation" id="amendLocation" disabled placeholder="Location">
                </div>

            </div>

            <div style="margin-top: 14px;">
                <input type="submit" value="Save Changes" class="btn primary">
                <a href="../jobPage.html" class="btn">Back</a>
            </div>
        </form>

        <p id="display" style="margin-top: 12px;"></p>
    </section>

    <section class="info">
        <div class="info-card">
            <h2>How it works</h2>
            <p>
                Select a job from the list. Click <b>Amend Details</b> to unlock fields. Click <b>Save Changes</b>
                to update the record.
            </p>
        </div>

        <div class="info-card">
            <h2>Note</h2>
            <p>
                We use <b>|</b> as a separator in the listbox value.
            </p>
        </div>
    </section>
</main>

<footer class="footer">
    <span>© 2026 Glow Jobs Agency - "We are the best at what we do!"</span>
</footer>

<script>
    function populate()
    {
        var sel = document.getElementById("amendJobListbox");
        var result;
        result = sel.options[sel.selectedIndex].value;
        var jobDetails = result.split('|');

        document.getElementById("amendId").value = jobDetails[0];
        document.getElementById("amendCompanyId").value = jobDetails[1];
        document.getElementById("amendCompanyName").value = jobDetails[2];
        document.getElementById("amendTitle").value = jobDetails[3];
        document.getElementById("amendDescription").value = jobDetails[4];
        document.getElementById("amendQual").value = jobDetails[5];
        document.getElementById("amendType").value = jobDetails[6];
        document.getElementById("amendAnnualSalary").value = jobDetails[7];

        if (jobDetails[8] === 'Yes') {
            document.getElementById("amendDriverLicYes").checked = true;
        } else {
            document.getElementById("amendDriverLicNo").checked = true;
        }

        document.getElementById("amendLocation").value = jobDetails[9];
    }

    function toggleLock()
    {
        if (document.getElementById("amendViewbutton").value == "Amend Details")
        {
            document.getElementById("amendTitle").disabled = false;
            document.getElementById("amendDescription").disabled = false;
            document.getElementById("amendQual").disabled = false;
            document.getElementById("amendType").disabled = false;
            document.getElementById("amendAnnualSalary").disabled = false;
            document.getElementById("amendDriverLicYes").disabled = false;
            document.getElementById("amendDriverLicNo").disabled = false;
            document.getElementById("amendLocation").disabled = false;

            document.getElementById("amendViewbutton").value = "View Details";
        }
        else
        {
            document.getElementById("amendTitle").disabled = true;
            document.getElementById("amendDescription").disabled = true;
            document.getElementById("amendQual").disabled = true;
            document.getElementById("amendType").disabled = true;
            document.getElementById("amendAnnualSalary").disabled = true;
            document.getElementById("amendDriverLicYes").disabled = true;
            document.getElementById("amendDriverLicNo").disabled = true;
            document.getElementById("amendLocation").disabled = true;

            document.getElementById("amendViewbutton").value = "Amend Details";
        }
    }

    function confirmCheck()
    {
        var response;
        response = confirm('Are you sure you want to save these changes?');
        if (response)
        {
            document.getElementById("amendId").disabled = false;
            document.getElementById("amendCompanyId").disabled = false;
            document.getElementById("amendCompanyName").disabled = false;
            document.getElementById("amendTitle").disabled = false;
            document.getElementById("amendDescription").disabled = false;
            document.getElementById("amendQual").disabled = false;
            document.getElementById("amendType").disabled = false;
            document.getElementById("amendAnnualSalary").disabled = false;
            document.getElementById("amendDriverLicYes").disabled = false;
            document.getElementById("amendDriverLicNo").disabled = false;
            document.getElementById("amendLocation").disabled = false;
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
