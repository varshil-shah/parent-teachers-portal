const updatePassword = document.querySelector(".updatePassword");
const forgotPasswordForm = document.querySelector("#forgotPasswordForm");

forgotPasswordForm.onsubmit = (e) => {
  e.preventDefault();
};

updatePassword.addEventListener("click", () => {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "php/update-new-password.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        const data = xhr.response;
        if (data === "Password has been updated successfully") {
          Swal.fire({
            icon: "success",
            title: data,
            showConfirmButton: false,
            timer: 2000,
          }).then(() => (location.href = "sign-in.php"));
        } else {
          Swal.fire({
            icon: "error",
            title: "UPDATE PASSWORD",
            text: data,
          });
        }
      }
    }
  };
  const formData = new FormData(forgotPasswordForm);
  xhr.send(formData);
});
