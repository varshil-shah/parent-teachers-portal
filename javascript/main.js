const toggleButton = document.querySelector("#header-toggle");
const navbar = document.querySelector(".nav");
const linkColor = document.querySelectorAll(".nav__link");

// Modal
const openModalIcon = document.querySelector("#addIcon");
const closeModalIcon = document.querySelector("#closeButton");
const overlay = document.querySelector(".overlay");
const modal = document.querySelector(".modal__form");

// Send Mail
const sendMail = document.querySelector(".send__mail");
const overlay2 = document.querySelector(".overlay2");
const messageLink = document.querySelector("#messageLink");
const closeSendEmailButton = document.querySelector("#closeSendEmailButton");
const displayUser = document.querySelector(".parents__name");

// Sub menu
const timeTableLink = document.querySelector("#time-table");
const subMenu = document.querySelector(".sub-menu");
const subIcon = document.querySelector(".sub-icon");

const refreshUsers = () => {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "php/find-users.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        displayUser.innerHTML = data;
      }
    }
  };
  xhr.send();
};

toggleButton.addEventListener("click", () => {
  navbar.classList.toggle("show-menu");
});

function colorLink() {
  linkColor.forEach((l) => l.classList.remove("active"));
  this.classList.add("active");
}

linkColor.forEach((l) => l.addEventListener("click", colorLink));

// Modal

const showModal = (modalVariable, overlayVariable) => {
  modalVariable.classList.remove("hidden");
  overlayVariable.classList.remove("hidden");
};

const closeModal = (modalVariable, overlayVariable) => {
  modalVariable.classList.add("hidden");
  overlayVariable.classList.add("hidden");
};

navbar.onmouseleave = () => {
  if (subIcon.classList.contains("active")) {
    subIcon.classList.remove("active");
    subMenu.classList.remove("active");
  }
};

try {
  timeTableLink.addEventListener("click", (e) => {
    e.preventDefault();
    subIcon.classList.toggle("active");
    subMenu.classList.toggle("active");
  });
} catch (error) {
  console.log(`Element not found: ${error}`);
}

try {
  openModalIcon.addEventListener("click", () => showModal(modal, overlay));
  messageLink.addEventListener("click", () => {
    refreshUsers();
    showModal(sendMail, overlay2);
  });
  closeSendEmailButton.addEventListener("click", () => {
    closeModal(sendMail, overlay2);
  });
  closeModalIcon.addEventListener("click", () => closeModal(modal, overlay));
} catch (error) {
  console.log(error.message);
}
