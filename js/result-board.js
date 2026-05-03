// get elements
const resultViewButtons = document.querySelectorAll(".result-view-btn");
const resultModal = document.querySelector(".result-view-modal");

// vie result modal functionality
resultViewButtons.forEach((viewButton) =>
  viewButton.addEventListener("click", function () {
    resultModal.classList.add("show-result-modal");
  }),
);

// close result modal functionality
document.querySelector(".close-result-modal").addEventListener("click", () => {
  resultModal.classList.remove("show-result-modal");
});
