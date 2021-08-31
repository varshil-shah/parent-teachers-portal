const sendEmailButton = document.querySelector("#sendEmailButton");
const checkBoxes = document.getElementsByName("users[]");
const emailFormData = document.querySelector("#sendEmailForm");
const sendMailTitle = document.querySelector("#sendMailTitle");
const sendMailMessage = document.querySelector("#sendMailMessage");
const loading = document.getElementById("loading");

sendEmailButton.addEventListener("click", (e) => {
  e.preventDefault();
  const emailList = [...checkBoxes]
    .filter((checkBox) => checkBox.checked)
    .map((checkBox) => checkBox.value)
    .join(",");
  displayLoading();
  console.log(emailList);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "php/send-mail.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        hideLoading();
        const data = xhr.response;
        sendMailTitle.value = "";
        sendMailMessage.value = "";
        Swal.fire({
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

let displayLoading = () => {
  loading.classList.add("display");
  setTimeout(() => {
    loading.classList.remove("display");
  }, 15000);
};

let hideLoading = () => {
  loading.classList.remove("display");
};
