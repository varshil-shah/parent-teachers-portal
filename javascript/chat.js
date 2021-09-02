const chatButton = document.querySelector("#chatButton");
const inputField = document.querySelector(".input__field");
const form = document.querySelector(".typing__area");
const incoming_id = document.querySelector(".incoming_id").value;
const chatBox = document.querySelector(".user__chat");

chatButton.addEventListener("click", (e) => {
  e.preventDefault();
  if (inputField.value.trim()) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "php/chat.php", true);
    xhr.onload = () => {
      if (xhr.readyState === xhr.DONE && xhr.status === 200) {
        inputField.value = "";
        scrollToBottom();
      }
    };
    let formData = new FormData(form);
    xhr.send(formData);
  }
});

const getChatData = () => {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "php/get-chat-data.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        const data = xhr.response;
        chatBox.innerHTML = data;
        if (!chatBox.classList.contains("active")) {
          scrollToBottom();
        }
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("incoming_id=" + incoming_id);
};

setInterval(getChatData, 500);

chatBox.onmouseenter = () => {
  chatBox.classList.add("active");
};

chatBox.onmouseleave = () => {
  chatBox.classList.remove("active");
};

function scrollToBottom() {
  chatBox.scrollTop = chatBox.scrollHeight;
}
