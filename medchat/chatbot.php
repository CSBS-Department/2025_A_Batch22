<?php
session_start();
include_once 'includes/dbconn.php';
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        }

        /* create a outlined button */
        .btn {
            border: 2px solid #fff;
            background: transparent;
            padding: 10px 20px;
            border-radius: 30px;
            color: #fff;
            text-decoration: none;
            transition: 0.6s ease;
        }
    </style>
    <title>MedChat</title>
    <script>
        const chatbot = () => {
            const input = document.getElementById('chat-input').value;
            const chatMessages = document.getElementById('chat-messages');
            const userMessage = document.createElement('div');
            userMessage.className = 'flex justify-end mb-4';
            userMessage.innerHTML = `
            <div class="bg-blue-500 text-white p-2 rounded-lg max-w-xs">
                <p>${input}</p>
            </div>
            `;
            chatMessages.appendChild(userMessage);
            document.getElementById('chat-input').value = '';
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let response = JSON.parse(this.responseText);
                    response = response?.choices[0]?.text;

                    if (response === undefined || response === null || response === '') {
                        response = "Sorry, I don't understand.";
                    }
                    const chatMessages = document.getElementById('chat-messages');
                    const chatbotMessage = document.createElement('div');
                    chatbotMessage.className = 'flex justify-start mb-4';
                    chatbotMessage.innerHTML = `
                    <div class="bg-gray-200 text-gray-800 p-2 rounded-lg max-w-xs">
                        <p>${response}</p>
                    </div>
                    `;
                    chatMessages.appendChild(chatbotMessage);
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }
            };
            xhttp.open('GET', 'includes/chatbot.php?message=' + input, true);
            xhttp.send();
        }
        window.addEventListener('load', function() {
            document.getElementById('send-button').addEventListener('click', chatbot);
            document.getElementById('chat-input').addEventListener('keyup', (event) => {
                if (event.keyCode === 13) {
                    chatbot();
                }
            });
            document.getElementById('clear-button').addEventListener('click', () => {
                document.getElementById('chat-messages').innerHTML = `<div class="flex justify-end mb-4">
                    <div class="bg-blue-500 text-white p-2 rounded-lg max-w-xs">
                        <p>Hello, chatbot!</p>
                    </div>
                </div>
                <div class="flex justify-start mb-4">
                    <div class="bg-gray-200 text-gray-800 p-2 rounded-lg max-w-xs">
                        <p>Hi there! How can I assist you today?</p>
                    </div>
                </div>`;
            });
        });
    </script>
</head>

<body>
    <header class="text-white py-4 text-center">
        <h1 class="text-3xl font-bold">MedChat</h1>
        <!-- Add Logout Button -->
    </header>
    <!-- make the div center -->
    <div class="flex justify-center">
            <a href="auth/logout.php" class="btn btn-primary text-gray-100 hover:bg-purple-500 mt-2">Logout</a>
    </div>
    <br>
    <div class="container mx-auto p-4">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-4">
            <div class="p-2 overflow-y-auto" id="chat-messages" style="height: 400px;">
                <div class="flex justify-end mb-4">
                    <div class="bg-blue-500 text-white p-2 rounded-lg max-w-xs">
                        <p>Hello, MedChat!</p>
                    </div>
                </div>
                <div class="flex justify-start mb-4">
                    <div class="bg-gray-200 text-gray-800 p-2 rounded-lg max-w-xs">
                        <p>Hi there! How can I assist with your health today?</p>
                    </div>
                </div>
            </div>
            <div class="p-2 flex items-center">
                <input autofocus id="chat-input" type="text" class="flex-1 rounded-full px-6 mr-2 py-2 bg-gray-200 focus:outline-none" placeholder="Type a message..." />
                <button id="send-button" class="px-3 py-2 rounded-full bg-blue-500 text-white hover:bg-blue-600 focus:outline-none">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" data-name="Line Color" xmlns="http://www.w3.org/2000/svg" class="icon line-color">
                        <path style="fill:#fff;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:2" d="M7 12h4M5.44 4.15l14.65 7a1 1 0 0 1 0 1.8l-14.65 7a1 1 0 0 1-1.34-1.41l2.72-6.13a1.06 1.06 0 0 0 0-.82L4.1 5.46a1 1 0 0 1 1.34-1.31Z" />
                    </svg>
                </button>
                <button id="clear-button" class="px-3 py-2 mx-2 rounded-full bg-red-500 text-white hover:bg-red-600 focus:outline-none">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path style="fill:#fff" d="M7 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h4a1 1 0 1 1 0 2h-1.069l-.867 12.142A2 2 0 0 1 17.069 22H6.93a2 2 0 0 1-1.995-1.858L4.07 8H3a1 1 0 0 1 0-2h4V4zm2 2h6V4H9v2zM6.074 8l.857 12H17.07l.857-12H6.074zM10 10a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1z" fill="#0D0D0D" />
                    </svg>
                </button>
            </div>
        </div>
</body>

</html>