<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Realtime</title>
</head>

<body>
    <h1>Realtime Chat</h1>
    <div id="chat-box" style="border: 1px solid #000; height: 300px; overflow-y: scroll; padding: 10px;"></div>
    <input type="text" id="message" placeholder="Type a message" />
    <button id="send">Send</button>

    <script>
        const conn = new WebSocket('ws://127.0.0.1:8080');

        conn.onopen = () => {
            console.log("Connection established!");
        };

        conn.onmessage = (e) => {
            const chatBox = document.getElementById('chat-box');
            chatBox.innerHTML += `<div>${e.data}</div>`;
            chatBox.scrollTop = chatBox.scrollHeight;
        };

        document.getElementById('send').addEventListener('click', () => {
            const message = document.getElementById('message').value;
            conn.send(message);
            document.getElementById('message').value = '';
        });
    </script>
</body>

</html>