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
function displayNewArrayInGridView(array) {
    const grid = document.getElementById("grid");
    for (let i = 0; i < array.length; i++) {
        const row = document.createElement("tr");
        for (let j = 0; j < array[i].length; j++) {
            const cell = document.createElement("td");
            cell.textContent = array[i][j];
            row.appendChild(cell);
        }
        grid.appendChild(row);
    }
}

socket.on('array', ({array }) => {
    displayNewArrayInGridView(array)
});
socket.on('message', ({ user, message }) => {
    const messagesDiv = document.getElementById('messages');
    const newMessage = document.createElement('div');
    newMessage.textContent = `[${user}]:${message}`;
    messagesDiv.appendChild(newMessage);
});
function ca(array) {
    const newArray = [];
    for (let i = 0; i < array.length; i += 5) {
        newArray.push(array.slice(i, i + 5));
    }
    return newArray;
}
console.log(ca(100));