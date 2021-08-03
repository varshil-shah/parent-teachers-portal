const form = document.querySelector("form");
const otpButton = document.querySelector(".otpButton");

form.onsubmit = (e) => {
  e.preventDefault();
};

otpButton.addEventListener("click", () => {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/ptp/php/verify-otp.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data === "Valid OTP") {
          location.href =
            "http://localhost/ptp/user/main.php?page=announcements";
        } else {
          swal({
            title: "OTP Verification",
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
