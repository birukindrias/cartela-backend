const express = require('express');
const app = express();
const server = require('http').createServer(app);
const cors = require('cors');





// click send to back and saved 
// buttons destroyed after cickes  
// on 20 winner announced 
// game refreshed 
// to desable 






















let outerArray = [];

for (let i = 1; i <= 100; i += 5) {
    let innerArray = [];
    for (let j = i; j < i + 5; j++) {
        innerArray.push(j);
    }
    outerArray.push(innerArray);
}


console.log(outerArray);

const io = require('socket.io')(server, {
    cors: { origin: "*" }
});
app.use(express.static('public'));

io.on('connection', (socket) => {
    io.emit('array', {
        array:outerArray,
    });
    console.log('User connected:', socket.id);

    socket.on('join', (room) => {
        socket.join(room);
        console.log('User', socket.id, 'joined room:', room);
    });

    socket.on('winner', (winner) => {
        // socket.join(room);
        console.log('User', 'joined room:', winner);
    });

    socket.on('message', ({ room, message }) => {
        io.to(room).emit('message', {
            user: socket.id,
            message: message,
        });
        console.log('Message from', socket.id, 'in room', room, ':', message);
    });

    socket.on('disconnect', () => {
        console.log('User disconnected:', socket.id);
    });
});

const PORT = process.env.PORT || 3000;
server.listen(PORT, () => console.log(`Server listening on port ${PORT}`));