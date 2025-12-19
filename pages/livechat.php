<?php

// filepath: c:\xampp_odd\htdocs\nehaprograms\chat.php

?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>Foodogram Live Chat</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>

  <style>

    body {

      font-family: 'Segoe UI', sans-serif;

      background: #fff8f0;

      margin: 0;

      padding: 0;

    }

    .chat-container {

      max-width: 500px;

      margin: 40px auto;

      background: #fff;

      border-radius: 12px;

      box-shadow: 0 0 20px rgba(0,0,0,0.1);

      overflow: hidden;

    }

    header {

      background: #ff914d;

      color: white;

      padding: 20px;

      text-align: center;

    }

    .tagline {

      font-size: 0.9em;

      margin-top: 5px;

    }

    .chat-box {

      padding: 20px;

      height: 300px;

      overflow-y: auto;

      background: #fffdf9;

    }

    .message {

      margin-bottom: 15px;

      display: flex;

      flex-direction: column;

    }

    .user {

      align-items: flex-end;

    }

    .bot {

      align-items: flex-start;

    }

    .bubble {

      padding: 10px 15px;

      border-radius: 20px;

      max-width: 80%;

      font-size: 0.95em;

    }

    .user .bubble {

      background: #ff914d;

      color: white;

      align-self: flex-end;

    }

    .bot .bubble {

      background: #eee;

      color: #333;

      align-self: flex-start;

    }

    .typing-indicator {

      font-size: 0.85em;

      color: #999;

      padding: 0 20px;

      display: none;

    }

    form {

      display: flex;

      border-top: 1px solid #eee;

    }

    input {

      flex: 1;

      padding: 15px;

      border: none;

      font-size: 1em;

    }

    button {

      background: #ff914d;

      color: white;

      border: none;

      padding: 15px 20px;

      cursor: pointer;

    }

  </style>

</head>

<body>

  <div class="chat-container">

    <header>

      <h2>🍜 Chat with Foodogram</h2>

      <p class="tagline">Got cravings? We’re all ears (and taste buds).</p>

    </header>

    

    <div class="chat-box" id="chat-box">

      <!-- Messages will appear here -->

    </div>



    <div class="typing-indicator" id="typing-indicator">Foodobot is typing...</div>



    <form id="chat-form">

      <input type="text" id="user-input" placeholder="Type your hunger here..." autocomplete="off" required />

      <button type="submit">Send</button>

    </form>

  </div>



  <script>

    const chatBox = document.getElementById('chat-box');

    const chatForm = document.getElementById('chat-form');

    const userInput = document.getElementById('user-input');

    const typingIndicator = document.getElementById('typing-indicator');



    chatForm.addEventListener('submit', (e) => {

      e.preventDefault();

      const message = userInput.value.trim();

      if (!message) return;



      addMessage('user', message);

      userInput.value = '';

      showTyping();



      setTimeout(() => {

        hideTyping();

        botReply(message);

      }, 1000);

    });



    function addMessage(sender, text) {

      const msg = document.createElement('div');

      msg.classList.add('message', sender);



      const bubble = document.createElement('div');

      bubble.classList.add('bubble');

      bubble.textContent = text;



      msg.appendChild(bubble);

      chatBox.appendChild(msg);

      chatBox.scrollTop = chatBox.scrollHeight;

    }



    function showTyping() {

      typingIndicator.style.display = 'block';

    }



    function hideTyping() {

      typingIndicator.style.display = 'none';

    }



    function botReply(userMsg) {

      let reply = "Yum! Tell me more.";

      if (userMsg.toLowerCase().includes("menu")) {

        reply = "Our chef’s specials today: 🌮 Tofu Tikka Taco, 🥗 Rainbow Quinoa Salad, 🍰 Vegan Choco Lava!";

      } else if (userMsg.toLowerCase().includes("order")) {

        reply = "Just tap your favorites and we’ll whisk them to your doorstep!";

      } else if (userMsg.toLowerCase().includes("hello")) {

             reply = "Hey there, hungry soul! 🍽 What can I serve you today?";

      }



      addMessage('bot', reply);

    }

  </script>

</body>

</html>