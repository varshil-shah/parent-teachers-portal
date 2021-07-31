const modal = document.querySelector(".modal");
const overlay = document.querySelector(".overlay");
const closeButton = document.querySelector(".close-modal");
const body = document.querySelector("body");

const closeModal = () => {
  modal.classList.add("hidden");
  overlay.classList.add("hidden");
};

closeButton.addEventListener("click", closeModal);

body.addEventListener("click", closeModal);
