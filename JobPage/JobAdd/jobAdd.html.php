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
      <a class="brand" href="mainPage.html.php" aria-label="Go to Main Page">
        <!--Logo-->
        <div class="logo">
          <img src="../../resources/img/logo.jpeg" alt="Glow Jobs Logo" />
        </div>
        <div class="brand-text">
          <div class="brand-title">Glow Jobs</div>
          <div class="brand-subtitle">Add Job</div>
        </div>
      </a>
      <!-- Tabs placeholders -->
      <nav class="tabs" aria-label="Primary navigation">
        <a class="tab" href="../../ClientPage/clientPage.html">Client</a>
        <a class="tab active" href="../JobPage/jobPage.html">Job</a>
        <a class="tab" href="../../TrainingCoursePage/trainingcoursepage.html"
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

              <!-- Listbox -->
        <div class="field">
          <?php include 'addJobListbox.php'; ?>
        </div>
        
          <!-- внутри формы -->
<div class="form-grid">

<!-- Company select (wide) -->
<div class="field field-big">
  <?php include 'addJobListbox.php'; ?>
</div>

<div class="field">
  <label for="addTitle">Job Title</label>
  <input type="text" name="addTitle" id="addTitle" required />
</div>

<div class="field field-big">
  <label for="addDescription">Brief Description</label>
  <input type="text" name="addDescription" id="addDescription" required />
</div>

<div class="field">
  <label for="addQual">Qualification Required</label>
  <input type="text" name="addQual" id="addQual" required />
</div>

<div class="field">
  <label for="addType">Type of Work</label>
  <input type="text" name="addType" id="addType" required placeholder="full-time, part-time, ..." />
</div>

<div class="field">
  <label for="addAnnualSalary">Annual Salary</label>
  <input type="number" name="addAnnualSalary" id="addAnnualSalary" required />
</div>

<!-- Drivers license radio (wide) -->
<div class="field field-big">
  <div class="radio-group" role="group" aria-labelledby="driverLicLabel">
    <span class="radio-label" id="driverLicLabel">Drivers License Required</span>

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
  <input type="text" name="addLocation" id="addLocation" required />
</div>

</div>
          <br /><br />
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
      <span>© 2026 Glow Jobs Agency - "We are the best at what we do!"</span>
    </footer>
  </body>
</html>
