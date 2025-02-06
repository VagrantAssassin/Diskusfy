const csrfToken = document.head.querySelector(
    'meta[name="csrf-token"]'
).content;

const chatbotButton = document.getElementById("chatbotButton");
const chatbotPopup = document.getElementById("chatbotPopup");
const closeChatbot = document.getElementById("closeChatbot");
const chatbox = document.getElementById("chatbox");
const chatInput = document.getElementById("chatInput");
const sendChat = document.getElementById("sendChat");

chatbotButton.addEventListener("click", (event) => {
    event.preventDefault();
    chatbotPopup.classList.toggle("hidden");
});

closeChatbot.addEventListener("click", () => {
    chatbotPopup.classList.add("hidden");
});

sendChat.addEventListener("click", async () => {
    const message = chatInput.value.trim();
    if (!message) return;

    displayMessage(message, "user");
    chatInput.value = "";

    try {
        const response = await fetch("/chat", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify({ message }),
        });

        if (response.ok) {
            const data = await response.json();
            const reply = data.reply || "Maaf, saya tidak mengerti.";
            displayMessage(reply, "bot");
        } else {
            const errorText = await response.text();
            displayMessage(`Error: ${response.status} - ${errorText}`, "error");
        }
    } catch (error) {
        displayMessage(`Error: ${error.message}`, "error");
    }
});

function displayMessage(message, sender) {
    const messageDiv = document.createElement("div");
    messageDiv.classList.add("p-2", "my-1", "rounded-lg");
    if (sender === "user") {
        messageDiv.classList.add("bg-gray-200", "self-end");
    } else if (sender === "bot") {
        messageDiv.classList.add("bg-blue-100", "self-start");
    } else if (sender === "error") {
        messageDiv.classList.add("text-red-500");
    }
    messageDiv.textContent = message;
    chatbox.appendChild(messageDiv);
    chatbox.scrollTop = chatbox.scrollHeight;
}
