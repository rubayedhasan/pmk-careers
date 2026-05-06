// common functions
const showElement = (element) => element.classList.remove("hidden-field");
const hideElement = (element) => element.classList.add("hidden-field");
const setError = (element) => element.classList.add("error");
const clearError = (element) => element.classList.remove("error");
const isEmpty = (value) => !value.trim();

// validation
const validateInputField = (inputField, inputValue) => {
  if (!inputValue) {
    inputField.style.border = "1px solid red";
    return;
  }
};
const resetInputField = (inputField) => {
  inputField.value = "";
};

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

const validateRequired = (element) => {
  const valid = !isEmpty(element.value);
  valid ? clearError(element) : setError(element);
  return valid;
};

// get elements all that needed
// personal information
const profileImage = document.querySelector("#profile-image");
const userProfileImage = document.querySelector(".user-profile-image");
const userProfileImgTag = document.querySelector(".user-profile-img");
const userProfileImageIcon = document.querySelector(".user-profile-image-icon");
const fieldSuggest = document.querySelector(".field-suggest");
const dateOfBirth = document.querySelector("#candidate-birth-date");
const candidateName = document.querySelector("#candidate-name");
const candidateFathersName = document.querySelector("#candidate-Father-name");
const candidateMothersName = document.querySelector("#candidate-mother-name");
const contactNumber = document.querySelector("#candidate-contact-number");
const nidNumber = document.querySelector("#candidate-nid-number");
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
const candidateResume = document.querySelector("#candidate-resume");

// educational information
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

// form elements
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
const submitApplyButton = document.querySelector(
  "button[name='submit-apply-btn']",
);

const applicationEducationForm = document.querySelector(
  "#application-education-form",
);

// set all select element color
const selects = document.querySelectorAll("select");
selects.forEach((select) =>
  select.addEventListener(
    "change",
    () => (select.style.color = "var(--pmk-dark"),
  ),
);

// personal
// profile picture size limit
profileImage.addEventListener("change", () => {
  const file = profileImage.files[0];
  const maxSize = 3 * 1024 * 1024;
  const fileExtension = file.name.split(".").pop().toLowerCase();

  // validate image formate
  if (
    fileExtension !== ".png" ||
    fileExtension !== "jpg" ||
    fileExtension !== ".jpeg"
  ) {
    setError(userProfileImage);
    profileImage.value = "";
    return;
  }

  // validate image size
  if (!file || file.size > maxSize) {
    fieldSuggest.style.color = "#ff0000";
    setError(userProfileImage);
    showElement(userProfileImageIcon);
    hideElement(userProfileImgTag);
    profileImage.value = "";
    return;
  }

  fieldSuggest.style.color = "#707074";
  clearError(userProfileImage);
  showElement(userProfileImgTag);
  hideElement(userProfileImageIcon);
  // userProfileImgTag.src = profileImage.files[0].name;
});

// show calender on filed click
dateOfBirth.addEventListener(
  "click",
  () => dateOfBirth.showPicker && dateOfBirth.showPicker(),
);

// max date is today no future date
dateOfBirth.max = new Date().toISOString().split("T")[0];

// validate names
[candidateName, candidateFathersName, candidateMothersName].forEach((perName) =>
  perName.addEventListener("input", () => validateName(perName)),
);

// validate phone and nid number
contactNumber.addEventListener("input", () =>
  validatePhoneNumber(contactNumber),
);
nidNumber.addEventListener("input", () => validateNidNumber(nidNumber));

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
    [
      presentAddress,
      presentDivision,
      presentDistrict,
      presentThana,
      presentPostcode,
    ].forEach((field) => (field.value = ""));
  }
});

candidateResume.addEventListener("change", () => {
  const file = candidateResume.files[0];
  const fileExtension = file.name.split(".").pop().toLowerCase();

  if (!file || fileExtension !== "pdf") {
    setError(candidateResume);
    candidateResume.value = null;
    return;
  }

  clearError(candidateResume);
});

// education
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
applicationPersonalForm.addEventListener("submit", (e) => {
  e.preventDefault();

  const isValid =
    validateName(candidateName) &&
    validateName(candidateFathersName) &&
    validateName(candidateMothersName) &&
    validatePhone(contactNumber) &&
    validateNID(nidNumber);

  if (!isValid) {
    alert("Invalid Input Values");
    return;
  }

  hideElement(personalInformationContainer);
  showElement(educationalInformationContainer);
});

// after submit the form re-located to index
applicationEducationForm.addEventListener("submit", (e) => {
  e.preventDefault();
  window.location.href = "../index.php";
});
