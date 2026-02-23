<!--Name: Dzheffriei Ihesinulo-->
<!--Student ID: C00311856-->
<!--Date: 17.02.26-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Company</title>
    <link rel="stylesheet" type="text/css" href="../Main.css">
</head>

<body>

<header class="topbar">
    <a class="brand" href="mainPage.html.php" aria-label="Go to Main Page">
        <div class="logo">
            <img src="../resources/img/logo.jpeg" alt="Glow Jobs Logo">
        </div>
        <div class="brand-text">
            <div class="brand-title">Glow Jobs</div>
            <div class="brand-subtitle">Delete Company</div>
        </div>
    </a>

    <!-- Tabs placeholders -->
    <nav class="tabs" aria-label="Primary navigation">
        <a class="tab" href="../ClientPage/clientpage.html" onclick="return false;">Client</a>
        <a class="tab" href="../JobPage/jobpage.html" onclick="return false;">Job</a>
        <a class="tab" href="../TrainingCoursePage/trainingcoursepage.html" onclick="return false;">Training Course</a>
        <a class="tab active" href="../companyPage.html">Company</a>
        <a class="tab" href="../MainPage/mainpage.html" onclick="return false;">Main Page</a>
    </nav>
</header>

<main class="page">
    <!-- Main card -->
    <section class="card">
        <h1>Delete Company</h1>
        <p class="hint">Please select a company and then click the delete button. Please make sure that you chose the correct company and double-check the information</p>

        <!-- Listbox -->
        <div class="field">
            <?php include 'deleteCompanyListbox.php'; ?>
        </div>

        <!-- Form -->
        <form name="myForm" action="deleteCompanyPagePost.php" onsubmit="return confirmCheck()" method="post">
            <div class="form-grid">
                <div class="field">
                    <label for="deleteId">Company Id</label>
                    <input type="text" name="deleteId" id="deleteId" disabled>
                </div>

                <div class="field">
                    <label for="deleteName">Company Name</label>
                    <input type="text" name="deleteName" id="deleteName" disabled>
                </div>

                <div class="field">
                    <label for="deleteAddress">Company Address</label>
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
                    <label for="deleteWebsite">Company Website</label>
                    <input type="text" name="deleteWebsite" id="deleteWebsite" disabled>
                </div>

                <div class="field">
                    <label for="deleteDescription">Business Description</label>
                    <input type="text" name="deleteDescription" id="deleteDescription" disabled>
                </div>

                <div class="field">
                    <label for="deleteContactName">Contact Name</label>
                    <input type="text" name="deleteContactName" id="deleteContactName" disabled>
                </div>

                <div class="field">
                    <label for="deleteContactPhone">Contact Phone</label>
                    <input type="tel" name="deleteContactPhone" id="deleteContactPhone" pattern="[+0-9 ]{7,20}" disabled>
                </div>

                <div class="field">
                    <label for="deleteContactEmail">Contact Email</label>
                    <input type="email" name="deleteContactEmail" id="deleteContactEmail" disabled>
                </div>
            </div>

            <div style="margin-top: 14px;">
                <input type="submit" value="Delete Company" class="btn primary">
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
                Select a company from the list. Double-check the information. Click <b>Delete Company</b> to delete the records.
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
    function populate() //populate function for fields of data to be visable
    {
        var sel = document.getElementById("deleteCompanyListbox");
        var result;
        result = sel.options[sel.selectedIndex].value;
        var companyDetails = result.split('|');

        document.getElementById("deleteId").value = companyDetails[0];
        document.getElementById("deleteName").value = companyDetails[1];
        document.getElementById("deleteAddress").value = companyDetails[2];
        document.getElementById("deleteEircode").value = companyDetails[3];
        document.getElementById("deletePhone").value = companyDetails[4];
        document.getElementById("deleteWebsite").value = companyDetails[5];
        document.getElementById("deleteDescription").value = companyDetails[6];
        document.getElementById("deleteContactName").value = companyDetails[7];
        document.getElementById("deleteContactPhone").value = companyDetails[8];
        document.getElementById("deleteContactEmail").value = companyDetails[9];
    }


    function confirmCheck() //checking the conformation from user
    {
        var companyName = document.getElementById("deleteName").value;
        var response;
        response = confirm('Are you sure you want to delete "'+ companyName+'" record from the list?');
        if (response)
        {
            document.getElementById("deleteId").disabled = false;
            document.getElementById("deleteName").disabled = false;
            document.getElementById("deleteAddress").disabled = false;
            document.getElementById("deleteEircode").disabled = false;
            document.getElementById("deletePhone").disabled = false;
            document.getElementById("deleteWebsite").disabled = false;
            document.getElementById("deleteDescription").disabled = false;
            document.getElementById("deleteContactName").disabled = false;
            document.getElementById("deleteContactPhone").disabled = false;
            document.getElementById("deleteContactEmail").disabled = false;
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
