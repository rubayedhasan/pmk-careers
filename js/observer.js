// all section's section container(tag, title, subtitle, description) observer api
const sectionContainers = document.querySelectorAll(".section-container");

const observeSectionContainer = new IntersectionObserver(
  (observedItems) => {
    observedItems.forEach((observedItem) => {
      if (observedItem.isIntersecting) {
        observedItem.target.classList.add("visible-section-head");
      }
      //  else {
      //   observedItem.target.classList.remove("visible-section-head");
      // }
    });
  },
  {
    threshold: [0.3],
  },
);

// all section's heading container
sectionContainers.forEach((sectionContainer) =>
  observeSectionContainer.observe(sectionContainer),
);

// button container's observer api
const buttonContainers = document.querySelectorAll(".button-container");

const observedButtonContainer = new IntersectionObserver(
  (observedItems) => {
    observedItems.forEach((observedItem) => {
      if (observedItem.isIntersecting) {
        observedItem.target.classList.add("visible-button");
      }
      //  else {
      //   observedItem.target.classList.remove("visible-button");
      // }
    });
  },
  {
    threshold: [0.3],
  },
);

buttonContainers.forEach((buttonContainer) =>
  observedButtonContainer.observe(buttonContainer),
);

// observer api for all section
const observedSections = new IntersectionObserver(
  (observedItems) => {
    observedItems.forEach((observedItem) => {
      if (observedItem.isIntersecting) {
        observedItem.target.classList.add("section-visible");
      }

      // else {
      //   observedItem.target.classList.remove("section-visible");
      // }
    });
  },
  {
    threshold: [0.2],
  },
);

// pmk-circular-hero section's observed api
// const pmkCircularHero = document.querySelector("#pmk-circular-hero");
// observedSections.observe(pmkCircularHero);

// benefit-cards section's observed api
// const benefitCards = document.querySelector(".benefit-cards");
// observedSections.observe(benefitCards);

// pmk circular body section's observer api
const circularBodyHeading = document.querySelector(".circular-body-heading");
observedSections.observe(circularBodyHeading);

// jobs list  section's observe api
const jobListContainer = document.querySelector(".jobs");
observedSections.observe(jobListContainer);
