const form = document.querySelector("form");
const postButton = document.querySelector(".post__button");
const modalForm = document.querySelector(".modal__form");
const overlayForm = document.querySelector(".overlay");
const cardContainer = document.querySelector(".card__container");
const deleteIcon = document.querySelector("#deleteIcon");

document.querySelector("body").onchange = (e) => {
  e.preventDefault();
};

form.onsubmit = (e) => {
  e.preventDefault();
};

postButton.addEventListener("click", () => {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/ptp/php/pop-up-insert.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        modalForm.classList.add("hidden");
        overlayForm.classList.add("hidden");
        swal({
          title: "NOTICE MESSAGE",
          text: data,
          icon: data === "Notice added successfully" ? "success" : "error",
        });
      }
    }
  };

  let formData = new FormData(form);
  xhr.send(formData);
});

setInterval(() => {
  const xhr = new XMLHttpRequest();
  let currentUrl = window.location.href;
  let url = new URL(currentUrl);
  let page = url.searchParams.get("page");
  xhr.open("POST", "http://localhost/ptp/php/get-notices.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        cardContainer.innerHTML = data;
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("page=" + page);
}, 500);

deleteIcon.addEventListener("click", () => {
  const xhr = new XMLHttpRequest();
  let currentUrl = window.location.href;
  console.log(currentUrl);
  xhr.open("POST", "http://localhost/ptp/php/delete-notice.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        swal({
          title: "NOTICE MESSAGE",
          text: data,
          icon: data === "Notice deleted successfully" ? "success" : "error",
        });
      }
    }
  };

  xhr.send();
});
