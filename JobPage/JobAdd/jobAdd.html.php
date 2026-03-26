<!--
Name: Anton Opria
ID: C00309433
Date: 25/02/2026
-->
<!DOCTYPE html>
<html lang="en">
  <link rel="stylesheet" type="text/css" href="../../Main.css" />
  <body>
    <!--topbar start-->
    <header class="topbar">
      <!--Anchor for main page also classifies brand-->
      <a class="brand" href="../../mainPage.html" aria-label="Go to Main Page">
        <!--Logo-->
        <div class="logo">
          <img src="../../resources/img/logo.png" alt="Glow Logo" />
        </div>
        <div class="brand-text">
          <div class="brand-subtitle">Add Job</div>
        </div>
      </a>
      <!-- Tabs placeholders -->
      <nav class="tabs" aria-label="Primary navigation">
        <a class="tab" href="../../ClientPage/clientPage.html">Client</a>
        <a class="tab active" href="../JobPage/jobPage.html">Job</a>
        <a class="tab" href="../../TrainingCourse/coursePage.html"
          >Training Course</a
        >
        <a class="tab" href="../../CompanyPage/companyPage.html">Company</a>
      </nav>
    </header>
    <!--Main page-->
    <main class="page page--center">
      <section class="card">
        <h1>Add Job</h1>
        <p class="hint">Please fill the information and add a Job</p>
        <!--fields for data-->
        <form
          name="addJobForm"
          action="AddJobPost.php"
          onsubmit="return confirmCheck()"
          method="post"
        >
          <!--Form submitting-->
        
<div class="form-grid">
<!-- Company select (wide) -->
<div class="field">
  <label for="companyListbox">Company</label>
  <?php include 'addJobListbox.php'; ?>

  <input type="hidden" name="companyId" id="companyId" />
</div>

<div class="field">
  <label for="addTitle">Job Title</label>
  <input type="text" name="addTitle" id="addTitle" required placeholder="Cool Job Title"/>
</div>

<div class="field field-big">
  <label for="addDescription">Brief Description</label>
  <input type="text" name="addDescription" id="addDescription" required placeholder="Description"/>
</div>

<div class="field">
  <label for="addQual">Qualification Required</label>
  <input type="text" name="addQual" id="addQual" required placeholder="Junior Web Developer"/>
</div>

<div class="field">
  <label for="addType">Type of Work</label>
  <input type="text" name="addType" id="addType" required placeholder="full-time, part-time, ..." />
</div>

<div class="field">
  <label for="addAnnualSalary">Annual Salary</label>
  <input type="number" name="addAnnualSalary" id="addAnnualSalary" required placeholder="50000"/>
</div>

<!-- Drivers license radio (wide) -->
  <div class="radio-group" role="group" aria-labelledby="driverLicLabel">
    <span class="radio-label" id="driverLicLabel">Drivers License Required</span>

    <div class="radio-row">
      <label class="radio-option" for="addDriverLicYes">
        <input type="radio" name="addDriverLic" id="addDriverLicYes" value="Yes" required />
        <span>Yes</span>
      </label>

      <label class="radio-option" for="addDriverLicNo">
        <input type="radio" name="addDriverLic" id="addDriverLicNo" value="No" required />
        <span>No</span>
      </label>
    </div>
  </div>

<div class="field">
  <label for="addLocation">Location</label>
  <input type="text" name="addLocation" id="addLocation" required placeholder="SETU Carlow"/>
</div>

</div>
          <!--Submit and return buttons -->
          <div style="margin-top: 14px">
            <input type="submit" value="Add Job" class="btn primary" />
            <a href="../jobPage.html" class="btn">Back</a>
          </div>
        </form>
      </section>
    </main>
    <!--footer-->
    <footer class="footer">
      <span>© 2026 - "We are the best at what we do!"</span>
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
  function populate() { // populate function is used to fill the hidden companyId field with the selected company's id from the listbox
    var sel = document.getElementById("JobListbox");
    var result = sel.options[sel.selectedIndex].value;

    if (!result) return;

    var parts = result.split("|");
    document.getElementById("companyId").value = parts[0]; // company_id
  }
  function confirmCheck() { //function that ask for confirmation in case everything is empty or filled with spaces
          var title = document.getElementById("addTitle").value.trim();
          var location = document.getElementById("addLocation").value.trim();
          var desc = document.getElementById("addDescription").value.trim();
          var qual = document.getElementById("addQual").value.trim();
          var type = document.getElementById("addType").value.trim();
          var salary = document.getElementById("addAnnualSalary").value.trim();
          var driverLicChecked = document.querySelector('input[name="addDriverLic"]:checked'); // radio buttons need querySelector

          // Check if any required field is empty or if no radio option is selected
          if (
              title === "" ||
              location === "" ||
              desc === "" ||
              qual === "" ||
              type === "" ||
              salary === "" ||
              driverLicChecked === null
          )
          {
              alert("Please fill out required information"); //if the information is incomplete or empty
              return false;
          }
          else {
              return confirm('Are you sure you want to save these changes?'); //if the information is complete, ask for confirmation before submitting
          }
      }
  </script>
  </body>
</html>
