// button container's observer api
const buttonContainers = document.querySelectorAll(".button-container");

const observedButtonContainer = new IntersectionObserver(
  (observedItems) => {
    observedItems.forEach((observedItem) => {
      if (observedItem.isIntersecting) {
        observedItem.target.classList.add("visible-button");
      } else {
        observedItem.target.classList.remove("visible-button");
      }
    });
  },
  {
    threshold: [0.3],
  },
);
buttonContainers.forEach((buttonContainer) =>
  observedButtonContainer.observe(buttonContainer),
);
