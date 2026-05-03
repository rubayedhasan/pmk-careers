/* circular head page count functionality */
let count = 0;
let target = 150;

let timer = setInterval(() => {
  count++;

  document.getElementById("counter").innerText = `${count}+`;

  if (count >= target) {
    clearInterval(timer);
  }
}, 15);

// circular body page view vacancy details page functionality
const viewVacancyDetails = () =>
  (window.location.href = "./includes/vacancyDetails.php");

const views = document.querySelectorAll(".view");
views.forEach((view) => {
  view.addEventListener("click", viewVacancyDetails);
});

const jobTitles = document.querySelectorAll(".job-title");
jobTitles.forEach((jobTitle) => {
  jobTitle.addEventListener("click", viewVacancyDetails);
});
