const form = document.querySelector("form");
const signupButton = document.querySelector(".signUpButton");
let loading = document.getElementById("loading");

form.onsubmit = (e) => {
  e.preventDefault();
};

signupButton.addEventListener("click", () => {
  const xhr = new XMLHttpRequest();
  displayLoading();
  xhr.open("POST", "http://localhost/ptp/php/insert-data.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        hideLoading();
        if (data === "success") {
          location.href = "http://localhost/ptp/otp.php";
        } else {
          swal({
            title: "SIGNUP MESSAGE",
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
