function confirmCheck() {
  //function that ask for confirmation in case everything is empty or filled with spaces
  var name = document.getElementById("addName").value.trim();
  var address = document.getElementById("addAddress").value.trim();
  var eircode = document.getElementById("addEircode").value.trim();
  var phone = document.getElementById("addPhone").value.trim();
  var dob = document.getElementById("addDob").value.trim();
  var driverLicense = document.getElementById("addDriverLicense").value.trim();
  var jobTitle = document.getElementById("addJobTitle").value.trim();
  var qualifications = document
    .getElementById("addQualifications")
    .value.trim();
  var minAnnualSalary = document
    .getElementById("addMinAnnualSalary")
    .value.trim();

  if (
    name === "" ||
    address === "" ||
    eircode === "" ||
    phone === "" ||
    dob === "" ||
    driverLicense === "" ||
    jobTitle === "" ||
    qualifications === "" ||
    minAnnualSalary === ""
  ) {
    alert("Please fill out required information"); //if the information is incomplete or empty
    return false;
  } else {
    var response;
    response = confirm("Are you sure you want to save these changes?"); //asks for confirmation
    if (response) return response;
  }
}

function populate() {
  //populate function is used to fill the html fields with data
  var sel = document.getElementById("clientListbox");
  var result;
  result = sel.options[sel.selectedIndex].value;
  var clientDetails = result.split("|");

  document.getElementById("amendId").value = clientDetails[0];
  document.getElementById("amendName").value = clientDetails[1];
  document.getElementById("amendAddress").value = clientDetails[2];
  document.getElementById("amendEircode").value = clientDetails[3];
  document.getElementById("amendPhone").value = clientDetails[4];
  document.getElementById("amendWebsite").value = clientDetails[5];
  document.getElementById("amendDescription").value = clientDetails[6];
  document.getElementById("amendJobTitle").value = clientDetails[7];
  document.getElementById("amendQualifications").value = clientDetails[8];
  document.getElementById("amendMinAnnualSalary").value = clientDetails[9];
}

function toggleLock() {
  //function that unlock/locks the data and changes the button depending on the button state
  if (document.getElementById("amendViewbutton").value == "Amend Details") {
    document.getElementById("amendName").disabled = false;
    document.getElementById("amendAddress").disabled = false;
    document.getElementById("amendEircode").disabled = false;
    document.getElementById("amendPhone").disabled = false;
    document.getElementById("amendDob").disabled = false;
    document.getElementById("amendDriverLicense").disabled = false;
    document.getElementById("amendJobTitle").disabled = false;
    document.getElementById("amendQualifications").disabled = false;
    document.getElementById("amendMinAnnualSalary").disabled = false;

    document.getElementById("amendViewbutton").value = "View Details";
  } else {
    document.getElementById("amendName").disabled = true;
    document.getElementById("amendAddress").disabled = true;
    document.getElementById("amendEircode").disabled = true;
    document.getElementById("amendPhone").disabled = true;
    document.getElementById("amendDob").disabled = true;
    document.getElementById("amendDriverLicense").disabled = true;
    document.getElementById("amendJobTitle").disabled = true;
    document.getElementById("amendQualifications").disabled = true;
    document.getElementById("amendMinAnnualSalary").disabled = true;

    document.getElementById("amendViewbutton").value = "Amend Details";
  }
}

const dateInput = document.getElementById("date");
if (dateInput) {
  const today = new Date().toISOString().substr(0, 10); // [web:8]
  dateInput.value = today; // [web:8]
}
