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
  educationFormModal.classList.remove("hidden-field");
});

// hide modal
eduModalCloseBtn.addEventListener("click", () => {
  educationFormModal.classList.add("hidden-field");
});

// show and hide summer notice
if (educationSummeryLists.children.length === 0) {
  summeryNotice.classList.remove("hidden-field");
} else {
  summeryNotice.classList.add("hidden-field");
}

// show and display grade selection and typing
candidateResultType.addEventListener("change", () => {
  if (
    candidateResultType.querySelector("option[value='grade']").selected === true
  ) {
    candidateResultGrade.parentElement.classList.remove("hidden-field");
    candidateResultGradeScale.parentElement.classList.remove("hidden-field");
    candidateResultDivision.parentElement.classList.add("hidden-field");
    candidateResultDivision.value = "";
  } else {
    candidateResultGrade.parentElement.classList.add("hidden-field");
    candidateResultGradeScale.parentElement.classList.add("hidden-field");
    candidateResultDivision.parentElement.classList.remove("hidden-field");
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
  educationFormModal.classList.add("hidden-field");
});

// function validate the input field
function validateInputField(inputField, inputValue) {
  if (!inputValue) {
    inputField.style.border = "1px solid red";
    return;
  }
}

function resetInputField(inputField) {
  inputField.value = "";
}

// after submit personal data then show the educational form
const personalInformationContainer = document.querySelector(
  "#personal-information-container",
);
const educationalInformationContainer = document.querySelector(
  "#educational-information-container",
);
const applyNextPageButton = document.querySelector(
  "button[name='apply-next-page-btn']",
);

applyNextPageButton.addEventListener("click", () => {
  // hide
  personalInformationContainer.classList.add("hidden-field");

  //   show

  educationalInformationContainer.classList.remove("hidden-field");
});

// after submit the form re-located to index
const submitApplyButton = document.querySelector(
  "button[name='submit-apply-btn']",
);
submitApplyButton.addEventListener("click", () => {
  window.location.href = "../index.php";
});
