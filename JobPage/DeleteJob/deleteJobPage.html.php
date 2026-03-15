<!--
Name: Anton Opria
ID: C00309433
Date: 15/03/2026
-->
<!doctype html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Delete Job</title>
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
      <div class="brand-subtitle">Delete Job</div>
    </div>
  </a>
  <nav class="tabs" aria-label="Primary navigation">
    <a class="tab" href="../../ClientPage/clientPage.html">Client</a>
    <a class="tab active" href="../../JobPage/jobPage.html">Job</a>
    <a class="tab" href="../../TrainingCoursePage/trainingcoursepage.html">Training Course</a>
    <a class="tab" href="../../CompanyPage/companyPage.html">Company</a>
  </nav>
</header>

<main class="page">
  <section class="card">
    <h1>Delete Job</h1>
    <p class="hint">Please select a job and then click the delete button. Please make sure that you chose the correct job and double-check the information</p>

    <div class="field">
      <?php include 'deleteJobListbox.php'; ?>
    </div>

    <form name="myForm" action="deleteJobPagePost.php" onsubmit="return confirmCheck()" method="post">
      <div class="form-grid">
        <div class="field">
          <label for="deleteId">Job Id</label>
          <input type="text" name="deleteId" id="deleteId" disabled>
        </div>

        <div class="field">
          <label for="deleteCompanyId">Company Id</label>
          <input type="text" name="deleteCompanyId" id="deleteCompanyId" disabled>
        </div>

        <div class="field">
          <label for="deleteCompanyName">Company Name</label>
          <input type="text" name="deleteCompanyName" id="deleteCompanyName" disabled>
        </div>

        <div class="field">
          <label for="deleteTitle">Job Title</label>
          <input type="text" name="deleteTitle" id="deleteTitle" disabled>
        </div>

        <div class="field field-big">
          <label for="deleteDescription">Brief Description</label>
          <input type="text" name="deleteDescription" id="deleteDescription" disabled>
        </div>

        <div class="field">
          <label for="deleteQual">Qualification Required</label>
          <input type="text" name="deleteQual" id="deleteQual" disabled>
        </div>

        <div class="field">
          <label for="deleteType">Type of Work</label>
          <input type="text" name="deleteType" id="deleteType" disabled>
        </div>

        <div class="field">
          <label for="deleteAnnualSalary">Annual Salary</label>
          <input type="text" name="deleteAnnualSalary" id="deleteAnnualSalary" disabled>
        </div>

        <div class="field">
          <label for="deleteDriverLic">Drivers License Required</label>
          <input type="text" name="deleteDriverLic" id="deleteDriverLic" disabled>
        </div>

        <div class="field">
          <label for="deleteLocation">Location</label>
          <input type="text" name="deleteLocation" id="deleteLocation" disabled>
        </div>

        <div class="field">
          <label for="deleteStatus">Status</label>
          <input type="text" name="deleteStatus" id="deleteStatus" disabled>
        </div>
      </div>

      <div style="margin-top: 14px;">
        <input type="submit" value="Delete Job" class="btn primary">
        <a href="../jobPage.html" class="btn">Back</a>
      </div>
    </form>

    <p id="display" style="margin-top: 12px;"></p>
  </section>

  <section class="info">
    <div class="info-card">
      <h2>How it works</h2>
      <p>
        Select a job from the list. Double-check the information. Click <b>Delete Job</b> to delete the record.
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
  // Populate the form fields based on the selected job in the listbox
  function populate() {
    var sel = document.getElementById("deleteJobListbox");
    var result;
    result = sel.options[sel.selectedIndex].value;
    var jobDetails = result.split('|');

    document.getElementById("deleteId").value = jobDetails[0];
    document.getElementById("deleteCompanyId").value = jobDetails[1];
    document.getElementById("deleteCompanyName").value = jobDetails[2];
    document.getElementById("deleteTitle").value = jobDetails[3];
    document.getElementById("deleteDescription").value = jobDetails[4];
    document.getElementById("deleteQual").value = jobDetails[5];
    document.getElementById("deleteType").value = jobDetails[6];
    document.getElementById("deleteAnnualSalary").value = jobDetails[7];
    document.getElementById("deleteDriverLic").value = jobDetails[8];
    document.getElementById("deleteLocation").value = jobDetails[9];
    document.getElementById("deleteStatus").value = jobDetails[10];
  }

  // Confirmation check before deletion
  function confirmCheck() {
    var jobTitle = document.getElementById("deleteTitle").value;
    var response;
    response = confirm('Are you sure you want to delete "' + jobTitle + '" record from the list?');
    if (response) {
      document.getElementById("deleteId").disabled = false;
      document.getElementById("deleteCompanyId").disabled = false;
      document.getElementById("deleteCompanyName").disabled = false;
      document.getElementById("deleteTitle").disabled = false;
      document.getElementById("deleteDescription").disabled = false;
      document.getElementById("deleteQual").disabled = false;
      document.getElementById("deleteType").disabled = false;
      document.getElementById("deleteAnnualSalary").disabled = false;
      document.getElementById("deleteDriverLic").disabled = false;
      document.getElementById("deleteLocation").disabled = false;
      document.getElementById("deleteStatus").disabled = false;
      return true;
    } else {
      return false;
    }
  }
</script>
</body>
</html>
