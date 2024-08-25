const form = document.querySelector(".chat-input");
const inputField = form.querySelector(".input-field");
const sendBtn = form.querySelector("button");
const chatBox = document.querySelector(".chat-box");

form.addEventListener("submit", (e) => {
    e.preventDefault();
});

sendBtn.addEventListener("click", () => {
    const formData = new FormData(form);

    fetch("/chat/inser_chat.php", {
        method: "POST",
        body: formData,
    })
    .then((response) => {
        if (response.status === 200) {
            inputField.value = "";
            scrollToBottom();
        }
    })
    .catch((error) => {
        console.error("Error:", error);
    });
});

chatBox.addEventListener("mouseenter", () => {
    chatBox.classList.add("active");
});

chatBox.addEventListener("mouseleave", () => {
    chatBox.classList.remove("active");
});

setInterval(() => {
    const formData = new FormData(form);

    fetch("/chat/get_message.php", {
        method: "POST",
        body: formData,
    })
    .then((response) => {
        if (response.status === 200) {
            return response.text();
        }
    })
    .then((data) => {
        chatBox.innerHTML = data;
        if (!chatBox.classList.contains("active")) {
            scrollToBottom();
        }
    })
    .catch((error) => {
        console.error("Error:", error);
    });
}, 500);

function scrollToBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
}
