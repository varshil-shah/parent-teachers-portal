const form = document.querySelector("form");
const loginButton = document.querySelector(".login");

form.onsubmit = (e) => {
  e.preventDefault();
};

loginButton.addEventListener("click", () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/Chat%20App/php/sign-in.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data === "success") {
          location.href = "http://localhost/Chat%20App/user/main.html";
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