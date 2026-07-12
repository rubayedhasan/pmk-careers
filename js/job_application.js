let currentStep = 1;
const totalSteps = 6;

function goTo(n) {
  const steps = document.querySelectorAll(".step-panel");
  const navBtns = document.querySelectorAll(".step-btn");

  // hide current
  document.getElementById("step-" + currentStep).classList.remove("active");

  // mark old step nav state
  const oldNav = document.querySelector('[data-step="' + currentStep + '"]');
  oldNav.classList.remove("active");
  if (n > currentStep) oldNav.classList.add("completed");

  currentStep = n;

  // show new
  document.getElementById("step-" + currentStep).classList.add("active");
  const newNav = document.querySelector('[data-step="' + currentStep + '"]');
  newNav.classList.add("active");
  newNav.classList.remove("completed");

  // update footer
  document.getElementById("progressTxt").textContent =
    "Step " + currentStep + " of " + totalSteps;

  document.getElementById("prevBtn").style.display =
    currentStep > 1 ? "" : "none";

  const nextBtn = document.getElementById("nextBtn");
  if (currentStep === totalSteps) {
    nextBtn.style.display = "none";
  } else {
    nextBtn.style.display = "";
    nextBtn.innerHTML = 'Next <i class="bi bi-arrow-right ms-1"></i>';
  }

  // scroll to top of page
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
}

function nextStep() {
  if (currentStep < totalSteps) goTo(currentStep + 1);
}

function prevStep() {
  if (currentStep > 1) goTo(currentStep - 1);
}

function handleCancel() {
  if (confirm("Cancel Application? All unsaved data will be lost.")) {
    history.back();
  }
}

/* For Save and post Data to Backend */
async function handleSave() {
  // create form tag container
  const formData = new FormData();

  //   appending the form data
  // ── Step 1 ──
  formData.append(
    "application_id",
    document.querySelector('[name="application_id"]').value,
  );
  formData.append(
    "circular_id",
    document.querySelector('[name="circular_id"]').value,
  );
  formData.append(
    "candidate_name",
    document.querySelector('[name="candidate_name"]').value,
  );
  formData.append(
    "fathers_name",
    document.querySelector('[name="fathers_name"]').value,
  );
  formData.append(
    "mothers_name",
    document.querySelector('[name="mothers_name"]').value,
  );
  formData.append(
    "religion",
    document.querySelector('[name="religion"]').value,
  );
  formData.append(
    "gender",
    document.querySelector('#step-1 [name="gender"]').value,
  );
  formData.append(
    "merital_status",
    document.querySelector('[name="merital_status"]').value,
  );
  formData.append(
    "blood_group",
    document.querySelector('[name="blood_group"]').value,
  );

  // // Employee picture
  const pic = document.getElementById("picUpload").files[0];
  if (pic) formData.append("empl_picture", pic);

  // ── Step 2 ──
  formData.append(
    "national_id",
    document.querySelector('[name="national_id"]').value,
  );
  formData.append(
    "birth_id",
    document.querySelector('[name="birth_id"]').value,
  );
  formData.append(
    "passport_no",
    document.querySelector('[name="passport_no"]').value,
  );
  formData.append(
    "driving_license",
    document.querySelector('[name="driving_license"]').value,
  );
  formData.append("tin_no", document.querySelector('[name="tin_no"]').value);
  formData.append(
    "mobile_no",
    document.querySelector('[name="mobile_no"]').value,
  );
  formData.append(
    "email_id",
    document.querySelector('[name="email_id"]').value,
  );
  formData.append(
    "nationality",
    document.querySelector('[name="nationality"]').value,
  );
  formData.append(
    "date_of_birth",
    document.querySelector('[name="date_of_birth"]').value,
  );

  // ── Step 3 ──
  formData.append("per_house", document.getElementById("perm-house").value);
  formData.append("per_division", document.getElementById("perm-div").value);
  formData.append("per_district", document.getElementById("perm-dist").value);
  formData.append("per_upazilla", document.getElementById("perm-upa").value);
  formData.append("per_post", document.getElementById("perm-post").value);
  formData.append(
    "per_post_code",
    document.getElementById("perm-post-code").value,
  );
  formData.append("pre_house", document.getElementById("pres-house").value);
  formData.append("pre_division", document.getElementById("pres-div").value);
  formData.append("pre_district", document.getElementById("pres-dist").value);
  formData.append("pre_upazilla", document.getElementById("pres-upa").value);
  formData.append("pre_post", document.getElementById("pres-post").value);
  formData.append(
    "pre_post_code",
    document.getElementById("pres-post-code").value,
  );

  // ── Step 4: Education rows ──
  document.querySelectorAll("#eduBody tr").forEach((row, i) => {
    const cols = row.querySelectorAll("input, select");
    formData.append(`education[${i}][examination]`, cols[0]?.value || "");
    formData.append(`education[${i}][institution]`, cols[1]?.value || "");
    formData.append(`education[${i}][major_subject]`, cols[2]?.value || "");
    formData.append(`education[${i}][board_university]`, cols[3]?.value || "");
    formData.append(`education[${i}][academic_year]`, cols[4]?.value || "");
    formData.append(`education[${i}][result]`, cols[5]?.value || "");
  });

  // ── Step 5: Training rows ──
  document.querySelectorAll("#trainBody tr").forEach((row, i) => {
    const cols = row.querySelectorAll("input");
    formData.append(`training[${i}][course_name]`, cols[0]?.value || "");
    formData.append(`training[${i}][course_stard_date]`, cols[1]?.value || "");
    formData.append(`training[${i}][course_end_date]`, cols[2]?.value || "");
    formData.append(`training[${i}][course_duration]`, cols[3]?.value || "");
    formData.append(`training[${i}][institution_name]`, cols[4]?.value || "");
    formData.append(
      `training[${i}][institution_address]`,
      cols[5]?.value || "",
    );
    formData.append(`training[${i}][result]`, cols[6]?.value || "");
  });

  // ── Step 6: Experience rows ──
  document.querySelectorAll("#jobBody tr").forEach((row, i) => {
    const cols = row.querySelectorAll("input");
    formData.append(`experience[${i}][org_name]`, cols[0]?.value || "");
    formData.append(`experience[${i}][project_name]`, cols[1]?.value || "");
    formData.append(`experience[${i}][company_location]`, cols[2]?.value || "");
    formData.append(`experience[${i}][from_date]`, cols[3]?.value || "");
    formData.append(`experience[${i}][to_date]`, cols[4]?.value || "");
    formData.append(`experience[${i}][job_respons]`, cols[5]?.value || "");
  });

  // ── Send to backend ──
  try {
    const btn = document.querySelector('.btn-brand[onclick="handleSave()"]');
    if (btn) {
      btn.disabled = true;
      btn.innerHTML = '<i class="bi bi-hourglass-split me-1"></i>Submitting...';
    }

    const response = await fetch("../server/application.php", {
      method: "POST",
      body: formData,
    });

    const result = await response.json();

    if (result.success) {
      alert("Success" + result.message);
      window.location.href = "../index.php";
    } else {
      alert("Error: " + result.message);
      if (btn) {
        btn.disabled = false;
        btn.innerHTML =
          '<i class="bi bi-floppy-fill me-1"></i>Save &amp; Close';
      }
    }
  } catch (err) {
    alert("Network error: " + err.message);
    const btn = document.querySelector('.btn-brand[onclick="handleSave()"]');
    if (btn) {
      btn.disabled = false;
      btn.innerHTML = '<i class="bi bi-floppy-fill me-1"></i>Apply Now';
    }
  }
}

/* ── File upload ── */
const UploadPictureContainer = document.querySelector(
  ".upload-picture-container",
);
const seeUploadPicture = document.querySelector("#candidate-upload-picture");

function showFile(input, labelId) {
  const label = document.getElementById(labelId);

  // validation:: file size 2MB
  const fileSize = 2 * 1024 * 1024;
  if (!input.files[0] || input.files[0].size > fileSize) {
    label.textContent = "✗ Maximum file size is 2 MB.";
    label.style.display = "block";
    label.style.color = "#ff0000";
    return;
  }

  //   success label
  if (input.files && input.files[0]) {
    label.textContent = "✓ " + input.files[0].name;
    label.style.display = "block";
    label.style.color = "#128e69";
  }

  seeUploadPicture.src = URL.createObjectURL(input.files[0]);
  UploadPictureContainer.style.display = "block";
}

// date of birth validation with age limit
const inputDateOfBirth = document.querySelector("[name='date_of_birth']");
// const minAge = 18;
// const maxAge = 42;
// const ageDeadline = "2026-06-30";

// the ages are coming from database in includes/job_application.php file
function calculateAgeDateRange(minAge, maxAge, ageDeadline) {
  const ageDeadlineDate = new Date(ageDeadline);

  // old age limit date
  const minAgeDate = new Date(ageDeadlineDate);
  minAgeDate.setFullYear(minAgeDate.getFullYear() - maxAge);

  // 18 year age limit date
  const maxAgeDate = new Date(ageDeadlineDate);
  maxAgeDate.setFullYear(maxAgeDate.getFullYear() - minAge);

  const dateFormat = (date) => {
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, "0");
    const day = String(date.getDate()).padStart(2, "0");

    return `${year}-${month}-${day}`;
  };

  return {
    min: dateFormat(minAgeDate),
    max: dateFormat(maxAgeDate),
  };
}

const dateRange = calculateAgeDateRange(minAge, maxAge, ageDeadline);
inputDateOfBirth.min = dateRange.min;
inputDateOfBirth.max = dateRange.max;

/* ── Address sync ── */
function toggleSame() {
  const checked = document.getElementById("sameAddr").checked;
  const presFields = [
    "pres-house",
    "pres-div",
    "pres-dist",
    "pres-upa",
    "pres-post",
    "pres-post-code",
  ];
  if (checked) {
    document.getElementById("pres-house").value =
      document.getElementById("perm-house").value;
    document.getElementById("pres-div").value =
      document.getElementById("perm-div").value;
    document.getElementById("pres-dist").value =
      document.getElementById("perm-dist").value;
    document.getElementById("pres-upa").value =
      document.getElementById("perm-upa").value;
    document.getElementById("pres-post").value =
      document.getElementById("perm-post").value;
    document.getElementById("pres-post-code").value =
      document.getElementById("perm-post-code").value;
    presFields.forEach((id) => {
      const el = document.getElementById(id);
      el.disabled = true;
      el.style.opacity = "0.6";
      el.style.background = "#f8f9fa";
    });
  } else {
    presFields.forEach((id) => {
      const el = document.getElementById(id);
      el.disabled = false;
      el.style.opacity = "1";
      el.style.background = "";
    });
  }
}

function syncAddr() {
  if (document.getElementById("sameAddr").checked) toggleSame();
}

/* ── Education table ── */
function addEduRow() {
  const tbody = document.getElementById("eduBody");
  const tr = document.createElement("tr");
  tr.innerHTML = `
      <td>
        <select>
            <option value="">Select</option>
            <option value="">Select</option>
            <option value="ssc">SSC</option>
            <option value="hsc">HSC</option>
            <option value="diploma">Diploma</option>
            <option value="bachelors">Bachelor's</option>
            <option value="masters">Master's</option>
            <option value="phd">PhD</option>
            <option value="other">Other</option>
        </select>
      </td>
      <td><input type="text" placeholder="Institution" /></td>
      <td><input type="text" placeholder="Subject" /></td>
      <td><input type="text" placeholder="Board / University" /></td>
      <td><input type="text" placeholder="e.g. 2018–2019" /></td>
      <td><input type="text" placeholder="GPA / Grade" /></td>
      <td>
        <button class="del-row-btn" onclick="deleteRow(this)" title="Remove row">
          <i class="bi bi-trash3"></i>
        </button>
      </td>
    `;
  tbody.appendChild(tr);
}

function deleteRow(btn) {
  const rows = document.getElementById("eduBody").querySelectorAll("tr");
  if (rows.length > 1) {
    btn.closest("tr").remove();
  } else {
    alert("At least one education record is required.");
  }
}

/* ── Training Experience ── */
function addTrainRow() {
  const tbody = document.getElementById("trainBody");
  const tr = document.createElement("tr");
  tr.innerHTML = `
                        <td><input type="text" name="course_name" placeholder="Course Name" /></td>
                        <td><input type="date" name="course_stard_date" placeholder="Course Start Date" /></td>
                        <td><input type="date" name="course_end_date" placeholder="Course End Date" /></td>
                        <td><input type="text" name="course_duration" placeholder="Course Duration" /></td>
                        <td><input type="text" name="institution_name" placeholder="Institution Name" /></td>
                        <td><input type="text" name="institution_address" placeholder="Institution Address" /></td>
                        <td><input type="text" name="result" placeholder="Result" /></td>
                        <td>
                          <button class=" del-row-btn" onclick="deleteRow(this)" title="Remove row">
                            <i class="bi bi-trash3"></i>
                          </button>
                        </td>
    `;
  tbody.appendChild(tr);
}

function deleteRow(btn) {
  const rows = document.getElementById("trainBody").querySelectorAll("tr");
  btn.closest("tr").remove();
}

/* ── Job Experience ── */
function addJobRow() {
  const tbody = document.getElementById("jobBody");
  const tr = document.createElement("tr");
  tr.innerHTML = `
                        <td><input type="text" placeholder="Organization Name" /></td>
                        <td><input type="text" placeholder="Designation/Project Name" /></td>
                        <td><input type="text" placeholder="Company Location" /></td>
                        <td><input type="date" placeholder="From Date" /></td>
                        <td><input type="date" placeholder="To Date" /></td>
                        <td><input type="text" placeholder="Job Responsibility" /></td>
      <td>
        <button class="del-row-btn" onclick="deleteRow(this)" title="Remove row">
          <i class="bi bi-trash3"></i>
        </button>
      </td>
    `;
  tbody.appendChild(tr);
}

function deleteRow(btn) {
  const rows = document.getElementById("jobBody").querySelectorAll("tr");
  btn.closest("tr").remove();
}

/*================ Required Conditions =======================*/
function nextStep() {
  if (!validateStep(currentStep)) return; // stop if validation fails
  if (currentStep < totalSteps) goTo(currentStep + 1);
}

function validateStep(step) {
  // Get all required fields in the current step
  const panel = document.getElementById("step-" + step);
  const requiredFields = panel.querySelectorAll("[required]");

  let isValid = true;
  let firstInvalid = null;

  requiredFields.forEach((field) => {
    // Remove old error style
    field.classList.remove("is-invalid");

    if (!field.value.trim()) {
      field.classList.add("is-invalid");
      isValid = false;
      if (!firstInvalid) firstInvalid = field; // track first empty field
    }
  });

  if (!isValid) {
    firstInvalid.focus(); // scroll to first empty field
    showValidationAlert(panel);
  }

  return isValid;
}

function showValidationAlert(panel) {
  // Remove old alert if exists
  const old = panel.querySelector(".validation-alert");
  if (old) old.remove();

  const alert = document.createElement("div");
  alert.className = "alert alert-danger validation-alert mt-3";
  alert.innerHTML =
    '<i class="bi bi-exclamation-circle me-2"></i>Please fill in all required fields before proceeding.';
  panel.prepend(alert);

  // Auto remove after 3 seconds
  setTimeout(() => alert.remove(), 3000);
}

/*================ Nid Passport Conditions ==================*/
function validateNidPassport(input) {
  const value = input.value.trim();

  const nid10 = /^\d{10}$/; // exactly 10 digits
  const nid17 = /^\d{17}$/; // exactly 17 digits
  const passport = /^[A-Za-z]{2}\d{7}$/; // exactly 2 letters + 7 digits = 9 chars

  const isValid =
    nid10.test(value) || nid17.test(value) || passport.test(value);

  if (!isValid && value.length > 0) {
    input.classList.add("is-invalid");
    input.classList.remove("is-valid");

    // Show specific message based on what they typed
    const msg = document.getElementById("nid_passport_msg");
    if (/^\d+$/.test(value)) {
      // user is typing digits — must be NID
      msg.textContent =
        value.length < 10
          ? `NID must be 10 or 17 digits. You entered ${value.length} digit(s).`
          : value.length > 10 && value.length < 17
            ? `NID must be exactly 10 or 17 digits. You entered ${value.length}.`
            : value.length > 17
              ? "NID cannot be more than 17 digits."
              : "Invalid NID number.";
    } else {
      // user is typing letters — must be passport
      msg.textContent =
        "Passport must be 2 letters followed by 7 digits (e.g. AB1234567).";
    }
  } else if (isValid) {
    input.classList.remove("is-invalid");
    input.classList.add("is-valid");
  } else {
    input.classList.remove("is-invalid");
    input.classList.remove("is-valid");
  }
}

// input validation: nid, phone number
const setError = (element) => element.classList.add("error");
const clearError = (element) => element.classList.remove("error");
const validateName = (element) => {
  const valid = /^[A-Za-z\s]+$/.test(element.value.trim());
  valid ? clearError(element) : setError(element);
  return valid;
};

const validatePhoneNumber = (element) => {
  element.value = element.value.replace(/\D/g, "");
  const valid = /^\d{11}$/.test(element.value);
  valid ? clearError(element) : setError(element);
  return valid;
};

const validateNidNumber = (element) => {
  element.value = element.value.replace(/\D/g, "");
  const valid = /^(\d{10}|\d{17})$/.test(element.value);
  valid ? clearError(element) : setError(element);
  return valid;
};

// validate names
[
  document.querySelector('[name="candidate_name"]'),
  document.querySelector('[name="fathers_name"]'),
  document.querySelector('[name="mothers_name"]'),
].forEach((perName) =>
  perName.addEventListener("input", () => validateName(perName)),
);

// validate phone and nid number
document
  .querySelector('[name="mobile_no"]')
  .addEventListener("input", () =>
    validatePhoneNumber(document.querySelector('[name="mobile_no"]')),
  );
document
  .querySelector('[name="national_id"]')
  .addEventListener("input", () =>
    validateNidNumber(document.querySelector('[name="national_id"]')),
  );
