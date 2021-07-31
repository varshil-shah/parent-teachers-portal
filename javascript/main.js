const toggleButton = document.querySelector("#header-toggle");
const navbar = document.querySelector(".nav");
const linkColor = document.querySelectorAll(".nav__link");

toggleButton.addEventListener("click", () => {
  navbar.classList.toggle("show-menu");
});

function colorLink() {
  linkColor.forEach((l) => l.classList.remove("active"));
  this.classList.add("active");
}

linkColor.forEach((l) => l.addEventListener("click", colorLink));
