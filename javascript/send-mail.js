const sendEmailButton = document.querySelector("#sendEmailButton");
const checkBoxes = document.getElementsByName("users[]");
const emailFormData = document.querySelector("#sendEmailForm");
const sendMailTitle = document.querySelector("#sendMailsendMailTitle");
const message = document.querySelector("#sendMailMessage");

sendEmailButton.addEventListener("click", (e) => {
  e.preventDefault();
  const emailList = [...checkBoxes]
    .filter((checkBox) => checkBox.checked)
    .map((checkBox) => checkBox.value)
    .join(",");
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/ptp/php/send-mail.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        const data = xhr.response;
        sendMailTitle.value = "";
        message.value = "";
        swal({
          title: "SEND MAIL",
          text: data,
          icon: data === "Mail send successfully" ? "success" : "error",
        });
      }
    }
  };
  let formData = new FormData(emailFormData);
  formData.append("emailList", emailList);
  xhr.send(formData);
});
