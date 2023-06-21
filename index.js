const express = require('express');
const app = express();
const server = require('http').createServer(app);
const cors = require('cors');

let url = 'http://localhost:8086/api';
const axios = require('axios');

let arries = {}
let total_user = {}


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
    let total_room_array = {}
    socket.on('join', ({ room, user_id }) => {
        console.log('User', socket.id, 'joined room:', room);

        if (!total_user.hasOwnProperty(room)) {
            // console.log('asdfsdaf');
            // total_room_array.push(arraies[room])
            arries[room] = []
            total_user[room] = []
            if (!total_user[room].hasOwnProperty(user_id)) {
                total_user[room].push(user_id)

            }
            // total_user.room.push(socket.id)

        } else {
            if (!total_user[room].hasOwnProperty(user_id)) {
                total_user[room].push(user_id)

            }
        }
        // console.log(total_user);
        // console.log('total_user');
        // console.log(total_user[room]);
        // if (total_room_array.length <= 20) {
        //     total_user[room].push(socket.id)
        // }
        // total_user[room].push(socket.id)
        io.to(room).emit('total_users', {
            total_users: total_user[room].length ?? 0,
        });
        socket.join(room);

    });

    socket.on('winner', ({ room, winner, user_uid }) => {
        // socket.join(room);
        arries[room] = []
        
        console.log('User', 'joined room:', winner);
    });

    socket.on('message', ({ room, message, user_uid }) => {
        console.log(total_user);
        io.to(room).emit('message', {
            user: socket.id,
            message: message,
            total_users: total_user[room].length ?? 0,
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
            // total_user[room][socket.id]=[]
            // total_user[room][socket.id].push(message)
            // console.log(total_user[room]);

        }
        if (room_array.length == 20) {
            const randomRowIndex = Math.floor(Math.random() * outerArray.length);
            let game_winner = arries[room][randomRowIndex];
            console.log(game_winner);  
            let game_number_new = game_winner.split(",");

            let randomIndex = Math.floor(Math.random() * game_number_new.length);
            let randomNum = game_number_new[randomIndex];
          
            console.log(randomNum);

            axios.post(url + '/save_winner', {
                win: randomNum,
                room: room,
                user_uid: user_uid,
            })
                .then(response => {
                    // Handle the response data
                    console.log(response.data.pr_win);
                    io.to(room).emit('winner', {
                        // user: socket.id,
                        game_winner: randomNum,
                        pr_win: response.data.pr_win,

                        winn_winner: user_uid,

                    });
                
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