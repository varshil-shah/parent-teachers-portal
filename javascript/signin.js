const form = document.querySelector("form");
const loginButton = document.querySelector(".login");

form.onsubmit = (e) => {
  e.preventDefault();
};

loginButton.addEventListener("click", () => {
  let xhr = new XMLHttpRequest();
  displayLoading();
  xhr.open("POST", "php/sign-in.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        hideLoading();
        let data = xhr.response;
        if (data === "success") {
          location.href = "main.php?page=announcements";
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

//WORKING:
// loginButton.addEventListener("click", () => {
//   fetch("php/sign-in.php", {
//     body: new FormData(form),
//     method: "POST",
//   })
//     .then((response) => response.text())
//     .then((data) => {
//       if (data === "success") {
//         location.replace("user/main.php?page=announcements");
//       } else {
//         swal({
//           title: "SIGNIN MESSAGE",
//           text: data,
//           icon: "error",
//         });
//       }
//     })
//     .catch((error) => console.log(error));
// });

let displayLoading = () => {
  loading.classList.add("display");
  setTimeout(() => {
    loading.classList.remove("display");
  }, 15000);
};

let hideLoading = () => {
  loading.classList.remove("display");
};
