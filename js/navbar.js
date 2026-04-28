// navbar section logic
const navbar = document.getElementById("navigation");
const navLinks = document.querySelectorAll(".nav-link");

// active the nav links
navLinks.forEach((link) => {
  link.addEventListener("click", () => {
    navLinks.forEach((l) => l.classList.remove("active"));
    link.classList.add("active");
  });
});

// handler function::  for show dropdown menu
document.querySelectorAll(".navbar .dropdown > .nav-link").forEach((link) => {
  link.addEventListener("click", function (e) {
    // get the parent Element
    const parent = this.parentElement;

    // get the current menu
    const menu = parent.querySelector(".dropdown-menu");

    // close other menu
    document.querySelectorAll(".dropdown-menu").forEach((otherMenu) => {
      if (otherMenu !== menu) {
        otherMenu.style.height = 0;
        otherMenu.classList.remove("active");
      }
    });

    // toggle the menu
    if (menu.classList.contains("active")) {
      menu.style.height = menu.scrollHeight + "px";
      requestAnimationFrame(() => {
        menu.style.height = "0px";
      });

      menu.classList.remove("active");
    } else {
      menu.classList.add("active");
      menu.style.height = menu.scrollHeight + "px";
    }
  });
});
