const updatePassword = document.querySelector(".updatePassword");
const forgotPasswordForm = document.querySelector("#forgotPasswordForm");

forgotPasswordForm.onsubmit = (e) => {
  e.preventDefault();
};

updatePassword.addEventListener("click", () => {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/ptp/php/update-new-password.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        const data = xhr.response;
        swal({
          title: "UPDATE PASSWORD",
          text: data,
          icon:
            data === "Password has been updated successfully"
              ? "success"
              : "error",
        });
      }
    }
  };
  const formData = new FormData(forgotPasswordForm);
  xhr.send(formData);
});
