// get element
const addEducationButton = document.querySelector(".add-education-button");
const educationFormModal = document.querySelector(".education-form-modal");
const eduModalCloseBtn = document.querySelector(".edu-modal-close-btn");
const modalUploadButton = document.querySelector(".modal-upload-button");
const summeryNotice = document.querySelector(".summery-notice");
const educationSummeryLists = document.querySelector(
  "#education-summery-lists",
);

// show modal
addEducationButton.addEventListener("click", () => {
  educationFormModal.classList.remove("hidden-field");
});

// hide modal
eduModalCloseBtn.addEventListener("click", () => {
  educationFormModal.classList.add("hidden-field");
});

modalUploadButton.addEventListener("click", () => {});

// show and hide summer notice
if (educationSummeryLists.children.length === 0) {
  summeryNotice.classList.remove("hidden-field");
} else {
  summeryNotice.classList.add("hidden-field");
}
