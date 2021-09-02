const chatLink = document.querySelector("#chat");
const chatUsers = document.querySelector(".available__user");
const searchBar = document.querySelector(".search");

const refreshChatUsers = () => {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "php/chat-users.php", true);
  xhr.onload = () => {
    if (xhr.readyState === xhr.DONE && xhr.status === 200) {
      let data = xhr.response;
      chatUsers.innerHTML = data;
    }
  };
  xhr.send();
};

window.onload = (e) => {
  e.preventDefault();
  refreshChatUsers();
};

searchBar.onkeyup = (e) => {
  e.preventDefault();
  const searchValue = e.target.value.trim();
  if (searchValue) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search-chat-users.php", true);
    xhr.onload = () => {
      if (xhr.readyState === xhr.DONE && xhr.status === 200) {
        const data = xhr.response;
        chatUsers.innerHTML = data;
      }
    };

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchValue=" + searchValue);
  }
};
