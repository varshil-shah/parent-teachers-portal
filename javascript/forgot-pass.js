const sendForgotOtp = document.querySelector(".sendForgotOtp");
const forgotEmailForm = document.querySelector("#forgotEmailForm");

forgotEmailForm.onsubmit = (e) => {
  e.preventDefault();
};

sendForgotOtp.addEventListener("click", () => {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "php/find-email.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        const data = xhr.response;
        console.log(data);
        if (data === "success") {
          location.href = "new-password.php";
        } else {
          Swal.fire({
            title: "FORGOT PASSWORD",
            text: data,
            icon: "error",
          });
        }
      }
    }
  };
  let formData = new FormData(forgotEmailForm);
  xhr.send(formData);
});
