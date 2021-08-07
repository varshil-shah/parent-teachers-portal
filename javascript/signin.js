const form = document.querySelector("form");
const loginButton = document.querySelector(".login");

form.onsubmit = (e) => {
  e.preventDefault();
};

loginButton.addEventListener("click", () => {
  let xhr = new XMLHttpRequest();
  displayLoading();
  xhr.open("POST", "http://localhost/ptp/php/sign-in.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        hideLoading();
        let data = xhr.response;
        if (data === "success") {
          location.href =
            "http://localhost/ptp/user/main.php?page=announcements";
        } else {
          swal({
            title: "SIGNIN MESSAGE",
            text: data,
            icon: "error",
          });
        }
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
});

let displayLoading = () => {
  loading.classList.add("display");
  setTimeout(() => {
    loading.classList.remove("display");
  }, 15000);
};

let hideLoading = () => {
  loading.classList.remove("display");
};
