const passwordField = document.querySelector("form input[type='password']");
const icon = document.querySelector(".eye");
const dropDown = document.querySelector(".drop-down");
const selectMenu = document.querySelector("select");

icon.onclick = () => {
  if (passwordField.type === "password") {
    passwordField.type = "text";
    icon.classList.add("active");
  } else {
    passwordField.type = "password";
    icon.classList.remove("active");
  }
};

const dropDownIcon = () => {
  if (dropDown.classList.contains("active")) {
    dropDown.classList.remove("active");
  } else {
    dropDown.classList.add("active");
  }
};

try {
  selectMenu.addEventListener("click", dropDownIcon);
} catch (error) {
  console.log(error.message);
}
