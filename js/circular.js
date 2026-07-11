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
