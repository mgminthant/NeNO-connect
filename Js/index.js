const pre_loader = document.getElementsByClassName("pre-loader")[0];    
const main = document.getElementsByClassName('main')[0];

window.addEventListener("DOMContentLoaded", () => {
  setTimeout(() => {
    pre_loader.style.display = "none";
    main.classList.remove('main')
  }, 3000);
});

//text type effect
var typing = new Typed(".text", {
  strings: ["", "1👋", "2 🫶", "let's got😎"],
  typeSpeed: 100,
  backSpeed: 40,
  loop: true,
});
