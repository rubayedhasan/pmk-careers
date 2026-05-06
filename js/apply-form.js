// common functions
function showElement(element) {
  element.classList.remove("hidden-field");
}
function hideElement(element) {
  element.classList.add("hidden-field");
}

function validateInputField(inputField, inputValue) {
  if (!inputValue) {
    inputField.style.border = "1px solid red";
    return;
  }
}
function resetInputField(inputField) {
  inputField.value = "";
}

// personal information
const profileImage = document.querySelector("#profile-image");
const userProfileImage = document.querySelector(".user-profile-image");
const userProfileImgTag = document.querySelector(".user-profile-img");
const userProfileImageIcon = document.querySelector(".user-profile-image-icon");
const fieldSuggest = document.querySelector(".field-suggest");
const dateOfBirth = document.querySelector("#candidate-birth-date");
const permanentAddress = document.querySelector("#candidate-permanent-address");
const permanentDivision = document.querySelector(
  "#candidate-permanent-division",
);
const permanentDistrict = document.querySelector(
  "#candidate-permanent-district",
);
const permanentThana = document.querySelector("#candidate-permanent-thana");
const permanentPostcode = document.querySelector(
  "#candidate-permanent-postCode",
);
const presentAddress = document.querySelector("#candidate-present-address");
const presentDivision = document.querySelector("#candidate-present-division");
const presentDistrict = document.querySelector("#candidate-present-district");
const presentThana = document.querySelector("#candidate-present-thana");
const presentPostcode = document.querySelector("#candidate-present-postCode");
const presentAddressInputContainer = document.querySelector(
  ".present-address-input-container",
);
const sameAsCheckbox = document.querySelector("#same-as-checkmark");

// profile picture size limit
profileImage.addEventListener("change", () => {
  const maxSize = 3 * 1024 * 1024;
  if (profileImage.files[0].size > maxSize) {
    fieldSuggest.style.color = "#ff0000";
    userProfileImage.style.border = "1px solid #ff0000";
    showElement(userProfileImageIcon);
    hideElement(userProfileImgTag);
    profileImage.value = "";
  } else {
    fieldSuggest.style.color = "#707074";
    userProfileImage.style.border = "1px solid hsla(145, 35%, 80%, 0.6)";
    showElement(userProfileImgTag);
    hideElement(userProfileImageIcon);
    // userProfileImgTag.src = profileImage.files[0].name;
  }
});

// show calender on filed click
dateOfBirth.addEventListener(
  "click",
  () => dateOfBirth.showPicker && dateOfBirth.showPicker(),
);

// max date is today no future date
const today = new Date().toISOString().split("T")[0];
dateOfBirth.setAttribute("max", today);

const candidateName = document.querySelector("#candidate-name");
const candidateFathersName = document.querySelector("#candidate-Father-name");
const candidateMothersName = document.querySelector("#candidate-mother-name");
const contactNumber = document.querySelector("#candidate-contact-number");
const nidNumber = document.querySelector("#candidate-nid-number");

// 🔹 Name validation (only letters and spaces)
const validNameField = (element) => {
  const value = element.value;

  const isValid = /^[A-Za-z\s]+$/.test(value);

  if (!isValid) {
    element.style.borderColor = "#e63946";
  } else {
    element.style.borderColor = "#d1d5db";
  }
};

candidateName.addEventListener("input", () => validNameField(candidateName));
candidateFathersName.addEventListener("input", () =>
  validNameField(candidateFathersName),
);
candidateMothersName.addEventListener("input", () =>
  validNameField(candidateMothersName),
);

// 🔹 Phone validation (exactly 11 digits)
contactNumber.addEventListener("input", () => {
  // Remove non-numeric characters
  contactNumber.value = contactNumber.value.replace(/\D/g, "");

  const isValid = /^\d{11}$/.test(contactNumber.value);

  if (!isValid) {
    contactNumber.style.borderColor = "#e63946";
  } else {
    contactNumber.style.borderColor = "#d0d5dd";
  }
});

// 🔹 NID validation (10 or 17 digits)
nidNumber.addEventListener("input", () => {
  // Remove non-numeric characters
  nidNumber.value = nidNumber.value.replace(/\D/g, "");

  const isValid = /^(\d{10}|\d{17})$/.test(nidNumber.value);

  if (!isValid) {
    nidNumber.style.borderColor = "#e63946";
  } else {
    nidNumber.style.borderColor = "#d0d5dd";
  }
});

// same as permanent address
sameAsCheckbox.addEventListener("change", () => {
  if (sameAsCheckbox.checked) {
    hideElement(presentAddressInputContainer);
    presentAddress.value = permanentAddress.value;
    presentDivision.value = permanentDivision.value;
    presentDistrict.value = permanentDistrict.value;
    presentThana.value = permanentThana.value;
    presentPostcode.value = permanentPostcode.value;
  } else {
    showElement(presentAddressInputContainer);
    presentAddress.value = "";
    presentDivision.value = "";
    presentDistrict.value = "";
    presentThana.value = "";
    presentPostcode.value = "";
  }
});

// educational information
// get element
const addEducationButton = document.querySelector(".add-education-button");
const educationFormModal = document.querySelector(".education-form-modal");
const eduModalCloseBtn = document.querySelector(".edu-modal-close-btn");
const modalUploadButton = document.querySelector(".modal-upload-button");
const summeryNotice = document.querySelector(".summery-notice");
const educationSummeryLists = document.querySelector(
  "#education-summery-lists",
);
const candidateEducationLevel = document.querySelector(
  "#candidate-education-level",
);
const candidateEducationDegree = document.querySelector(
  "#candidate-education-degree",
);
const candidateResultType = document.querySelector("#candidate-result-type");
const candidateResultDivision = document.querySelector(
  "#candidate-result-division",
);
const candidateResultGrade = document.querySelector("#candidate-result-grade");
const candidateResultGradeScale = document.querySelector(
  "#candidate-result-grade-scale",
);
const candidatePassingYear = document.querySelector("#candidate-passing-year");
const candidateInstitute = document.querySelector("#candidate-institute");

// show modal
addEducationButton.addEventListener("click", () => {
  showElement(educationFormModal);
});

// hide modal
eduModalCloseBtn.addEventListener("click", () => {
  hideElement(educationFormModal);
});

// show and hide summer notice
if (educationSummeryLists.children.length === 0) {
  showElement(summeryNotice);
} else {
  hideElement(summeryNotice);
}

// show and display grade selection and typing
candidateResultType.addEventListener("change", () => {
  if (
    candidateResultType.querySelector("option[value='grade']").selected === true
  ) {
    showElement(candidateResultGrade);
    showElement(candidateResultGradeScale);
    hideElement(candidateResultDivision);
    candidateResultDivision.value = "";
  } else {
    hideElement(candidateResultGrade);
    hideElement(candidateResultGradeScale);
    showElement(candidateResultDivision);
  }
});

// display the education summery after selecting
modalUploadButton.addEventListener("click", function () {
  const educationLevel = candidateEducationLevel.value;
  const educationDegree = candidateEducationDegree.value;
  const resultType = candidateResultType.value;
  const resultDivision = candidateResultDivision.value;
  const resultGrade = candidateResultGrade.value;
  const resultGradeScale = candidateResultGradeScale.value;
  const passingYear = candidatePassingYear.value;
  const instituteName = candidateInstitute.value;

  //   validate all input value
  validateInputField(candidateEducationLevel, educationLevel);
  validateInputField(candidateEducationDegree, educationDegree);
  validateInputField(candidateResultType, resultType);
  validateInputField(candidatePassingYear, passingYear);
  validateInputField(candidateInstitute, instituteName);

  //   if select result type  grade
  if (
    candidateResultType.querySelector("option[value='grade']").selected === true
  ) {
    validateInputField(candidateResultGrade, resultGrade);
    validateInputField(candidateResultGradeScale, resultGradeScale);
  } else {
    validateInputField(candidateResultDivision, resultDivision);
  }

  //   create and display the education summer
  const educationSummeryContainer = document.createElement("div");
  educationSummeryContainer.classList.add("education-summery");

  educationSummeryContainer.innerHTML = `
                            <div class="institute-container">
                                    <h3 class="edu-col-name">
                                    ${instituteName}
                                    </h3>
                                    <p class="edu-con">
                                        <span id="edu-level">
                                        ${educationLevel}
                                        </span>
                                        /
                                        <span id="edu-degree">
                                        ${educationDegree}
                                        </span>
                                    </p>
                            </div>
                            <div class="result-container">
                                    <h3 class="edu-col-name">Result</h3>
                                    <p class="edu-con">
                                        <span class="edu-icon">
                                            <i class="fa-solid fa-square-poll-horizontal"></i>
                                        </span>
                                        <span id="edu-result">
                                        ${resultDivision ? resultDivision : `${resultGrade}/${resultGradeScale}`}
                                        </span>
                                    </p>
                            </div>
                            <div class="passing-year-container">
                                    <h3 class="edu-col-name">Passing Year</h3>
                                    <p class="edu-con">
                                        <span class="edu-icon">
                                            <i class="fa-regular fa-calendar"></i>
                                        </span>
                                        <span id="edu-passing-year">
                                        ${passingYear}
                                        </span>
                                    </p>
                            </div>
                            <div class="edit-container">
                                    <button type="button" class="edit">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                    <button type="button" class="delete">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                            </div>
  `;

  educationSummeryLists.appendChild(educationSummeryContainer);

  //   reset the field
  resetInputField(candidateEducationLevel);
  resetInputField(candidateEducationDegree);
  resetInputField(candidateResultType);
  resetInputField(candidateResultDivision);
  resetInputField(candidateResultGrade);
  resetInputField(candidatePassingYear);
  resetInputField(candidatePassingYear);
  resetInputField(candidateInstitute);

  //   hide the modal form
  hideElement(educationFormModal);
});

// after submit personal data then show the educational form
const personalInformationContainer = document.querySelector(
  "#personal-information-container",
);

const applicationPersonalForm = document.querySelector(
  "#application-personal-form",
);
const educationalInformationContainer = document.querySelector(
  "#educational-information-container",
);
const applyNextPageButton = document.querySelector(
  "button[name='apply-next-page-btn']",
);

applicationPersonalForm.addEventListener("submit", (e) => {
  e.preventDefault();

  hideElement(personalInformationContainer);
  showElement(educationalInformationContainer);
});

// after submit the form re-located to index
const submitApplyButton = document.querySelector(
  "button[name='submit-apply-btn']",
);

const applicationEducationForm = document.querySelector(
  "#application-education-form",
);
applicationEducationForm.addEventListener("submit", (e) => {
  e.preventDefault();
  window.location.href = "../index.php";
});
