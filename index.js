const express = require('express');
const app = express();
const server = require('http').createServer(app);
const cors = require('cors');

let url = 'http://localhost:8084/api';
const axios = require('axios');



let arries = {}
let total_user ={}


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
        array: outerArray,
    });
    console.log('User connected:', socket.id);

    socket.on('join', (room) => {
        if (!total_user.hasOwnProperty(room)) {
            // console.log('asdfsdaf');
            arries[room] = []
        }else{
        let total_room_array = arries[room];

        }
        if (total_room_array.length <= 20) {
            total_user[room].push(socket.id)
        }
        total_user[room].push(socket.id)
        io.to(room).emit('total_users', {
            total_users:total_user.length,
        });
        socket.join(room);
        console.log('User', socket.id, 'joined room:', room);

    });

    socket.on('winner', ({ room, winner }) => {
        // socket.join(room);
        arries[room] = []
        console.log('User', 'joined room:', winner);
    });

    socket.on('message', ({ room, message }) => {

        io.to(room).emit('message', {
            user: socket.id,
            message: message,
            total_users: total_user.length,
        });
        // console.log('Message from', socket.id, 'in room', room, ':', message);
        // room = []
        if (!arries.hasOwnProperty(room)) {
            // console.log('asdfsdaf');
            arries[room] = []
        }
        let room_array = arries[room];
        if (room_array.length <= 20) {
            arries[room].push(message)
        }
        if (room_array.length == 20) {
            const randomRowIndex = Math.floor(Math.random() * outerArray.length);
            let game_winner = arries[room][randomRowIndex];
            io.to(room).emit('winner', {
                // user: socket.id,
                game_winner: game_winner,

            });

            axios.post(url+'/save_winner', {
                win: game_winner,
                room: room,
            })
                .then(response => {
                    // Handle the response data
                    console.log(response.data);
                })
                .catch(error => {
                    // Handle any errors that occurred during the request
                    console.error(error);
                });
            console.log(game_winner);
            arries[room] = []
        }
        io.to(room).emit('game_array', {
            game_array: arries[room],
        });


        // console.log(arries[room]);
        console.log('arries');
        console.log(arries);

    });
    socket.on('game_array', (room) => {
        if (arries[room]) {
            io.to(room).emit('game_array', {
                game_array: arries[room],
            });
        }
    });


    socket.on('disconnect', () => {
        console.log('User disconnected:', socket.id);
    });
});

const PORT = process.env.PORT || 3000;
server.listen(PORT, () => console.log(`Server listening on port ${PORT}`));