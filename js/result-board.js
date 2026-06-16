// get elements
const resultViewButtons = document.querySelectorAll(".result-view-btn");
const resultModal = document.querySelector(".result-view-modal");
const modalResultImage = document.querySelector(".modal-result-image");

// vie result modal functionality
resultViewButtons.forEach((viewButton) =>
  viewButton.addEventListener("click", function () {
    // get the targeted image
    const buttonParent = viewButton.parentElement;
    const targetImg = buttonParent.querySelector("img");

    // set the image to the modal
    modalResultImage.querySelector("img").src = targetImg.getAttribute("src");

    // open the modal
    resultModal.classList.add("show-result-modal");
  }),
);

// close result modal functionality
document.querySelector(".close-result-modal").addEventListener("click", () => {
  resultModal.classList.remove("show-result-modal");
});
