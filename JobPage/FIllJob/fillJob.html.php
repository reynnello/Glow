<!--
Name: Anton Opria
ID: C00309433
Date: 17/03/2026
-->
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fill Job</title>
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
			<div class="brand-subtitle">Fill Job</div>
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
		<h1>Fill a Job</h1>
		<p class="hint">Select a vacant job and an unemployed client, then enter the offer and start details.</p>

		<form action="fillJobPost.php" method="post" onsubmit="return confirmFill();">
			<div class="form-grid">
				<div class="field">
					<label for="jobId">Vacant Job</label>
					<?php include 'fillJobListbox.php'; ?>
				</div>

				<div class="field">
					<label for="clientId">Unemployed Client</label>
					<?php include 'fillClientListbox.php'; ?>
				</div>

				<div class="field">
					<label for="offerDate">Date of Job Offer</label>
					<input type="date" name="offerDate" id="offerDate" value="<?php echo date('Y-m-d'); ?>" required>
				</div>

				<div class="field">
					<label for="acceptedSalary">Accepted Salary</label>
					<input type="number" name="acceptedSalary" id="acceptedSalary" required>
				</div>

				<div class="field">
					<label for="startDate">Employment Start Date</label>
					<input type="date" name="startDate" id="startDate" min="<?php echo date('Y-m-d'); ?>" required>
				</div>
			</div>

			<div style="margin-top: 14px;">
				<input type="submit" value="Fill Job" class="btn primary">
				<a href="../jobPage.html" class="btn">Back</a>
			</div>
		</form>
	</section>

	<section class="info">
    <div class="info-card">
      <h2>How it works</h2>
      <p>
        Select a vacant job from the list. Then select an unemployed client. Click <b>Fill Job</b> to update the job and client statuses.
      </p>
    </div>

    <div class="info-card">
      <h2>Note</h2>
      <p>
        The Employment <b>Start Date</b> cannot be earlier than the <b>Date of Job Offer</b>. Please ensure the dates are correct before submitting.
      </p>
    </div>
  </section>
</main>

<footer class="footer">
	<span>© 2026 Glow Jobs Agency - "We are the best at what we do!"</span>
</footer>

<script>
    // start date cannot be before offer date
	function syncStartDateMin() {
		var offerDateEl = document.getElementById('offerDate');
		var startDateEl = document.getElementById('startDate');
		if (!offerDateEl || !startDateEl) return;
        // Set the minimum start date to the offer date
		startDateEl.min = offerDateEl.value;
		if (startDateEl.value && startDateEl.value < offerDateEl.value) {
			startDateEl.value = '';
		}
	}

    // Confirmation dialog before form submission
	function confirmFill() {
		var jobSel = document.getElementById('jobId');
		var clientSel = document.getElementById('clientId');
		if (!jobSel || !clientSel || jobSel.selectedIndex < 0 || clientSel.selectedIndex < 0) {
			return false;
		}

		var jobText = jobSel.options[jobSel.selectedIndex].text;
		var clientText = clientSel.options[clientSel.selectedIndex].text;
		var offerDate = document.getElementById('offerDate').value;
		var salary = document.getElementById('acceptedSalary').value;
		var startDate = document.getElementById('startDate').value;

        // Basic validation to ensure all fields are filled
		if (offerDate && startDate && startDate < offerDate) {
			alert('Employment Start Date cannot be earlier than Date of Job Offer.');
			return false;
		}

		return confirm('Are you sure you want to save these changes?');
	}

    // Sync start date minimum whenever offer date changes
	document.getElementById('offerDate').addEventListener('change', syncStartDateMin);
	syncStartDateMin();
</script>

</body>
</html>

