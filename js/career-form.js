// password peak functionality
const passwordField = document.querySelector("#user-password-key");
const peakElement = document.querySelector("#peak-password");

peakElement.addEventListener("click", function () {
  console.log(passwordField);
  // validation:: toggle password peak
  if (passwordField.type === "password") {
    peakElement.innerHTML = `<i class="fa-solid fa-eye-slash"></i>`;
    passwordField.type = "text";
  } else {
    peakElement.innerHTML = `<i class="fa-solid fa-eye"></i>`;
    passwordField.type = "password";
  }
});
