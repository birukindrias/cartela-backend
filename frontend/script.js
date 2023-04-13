const socket = io('ws://localhost:3000');

function joinRoom() {
    const room = document.getElementById('room').value;
    socket.emit('join', room);
}

function sendMessage() {
    console.log('www');

    const room = document.getElementById('room').value;
    const message = document.getElementById('message').value;
    socket.emit('message', { room, message });
}

socket.on('message', ({ user, message }) => {
    const messagesDiv = document.getElementById('messages');
    const newMessage = document.createElement('div');
    newMessage.textContent = `[${user}]:${message}`;
    messagesDiv.appendChild(newMessage);
});