const sendEmailButton = document.querySelector("#sendEmailButton");
const checkBoxes = document.getElementsByName("users[]");
const emailFromData = document.querySelector("#sendEmailForm");

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
        swal({
          title: "SEND MAIL",
          text: data,
          icon: data === "Mail send successfully" ? "success" : "error",
        });
      }
    }
  };
  let formData = new FormData(emailFromData);
  formData.append("emailList", emailList);
  xhr.send(formData);
});
