const toggleButton = document.querySelector("#header-toggle");
const navbar = document.querySelector(".nav");
const linkColor = document.querySelectorAll(".nav__link");

// Modal
const openModalIcon = document.querySelector("#addIcon");
const closeModalIcon = document.querySelector("#closeButton");
const overlay = document.querySelector(".overlay");
const modal = document.querySelector(".modal__form");

toggleButton.addEventListener("click", () => {
  navbar.classList.toggle("show-menu");
});

function colorLink() {
  linkColor.forEach((l) => l.classList.remove("active"));
  this.classList.add("active");
}

linkColor.forEach((l) => l.addEventListener("click", colorLink));

// Modal

const showModal = () => {
  modal.classList.remove("hidden");
  overlay.classList.remove("hidden");
};

const closeModal = () => {
  modal.classList.add("hidden");
  overlay.classList.add("hidden");
};

try {
  openModalIcon.addEventListener("click", showModal);
  closeModalIcon.addEventListener("click", closeModal);
} catch (error) {
  console.log(error.message);
}
