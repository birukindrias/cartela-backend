const socket = io("ws://localhost:3000");
let game_winner = 0;
let numbers_array = [];
let foundElement = null;
let current_game_array = [];
const rooms = document.querySelector(".room").innerHTML;
const type = document.querySelector(".type").innerHTML;
let room = (rooms.trim() +'|'+ type.trim()).trim();
let user_id = sessionStorage.getItem('id');
console.log(user_id);
// numbers_array
for (let i = 1; i <= 100; i += 5) {
  let innerArray = [];
  for (let j = i; j < i + 5; j++) {
    innerArray.push(j);
  }
  numbers_array.push(innerArray);
}

// join socket
console.log(room);
(() => {

  socket.emit("join", { room, user_id });
  socket.emit("game_array", room);
  socket.on("game_array", ({ game_array }) => {
    current_game_array = game_array;
    // console.log(game_array);
  });
  // display array numbers

  const grid = document.querySelector(".btn-div");
  let new_array = [];
  for (let i = 0; i < numbers_array.length; i++) {
    const row = document.createElement("button");
    const span = document.createElement("span");
    for (let j = 0; j < numbers_array[i].length; j++) {
      span.textContent += numbers_array[i][j] + ",";
      new_array.push(numbers_array[i][j]);
    }

    row.setAttribute("id", new_array);
    row.setAttribute("style", "transform: rotate(20deg)");
    row.setAttribute("class", "cope  btn");
    // row.setAttribute('class', '')

    new_array = [];
    row.appendChild(span);
    grid.appendChild(row);
  }
})();
socket.on("winner", ({ game_winner, pr_win, winn_winner }) => {
  location.href = "/game/winner.php?type=" + type + "&winn_winner" + winn_winner +"&win=" + game_winner + "&pr_win=" + pr_win;

  let image = document.getElementById("myImage_winner");
  
  let rotationInterval = setInterval(function () {
    image.classList.add("rotate-image");
  }, 3000);
  rotationInterval
  // const h2Element = document.querySelector("h33");

  // function generateRandomNumber() {
  //   let randomNumber = Math.floor(Math.random() * 100) + 1;
  //   console.log(randomNumber);
  //   if (randomNumber) {

  //     h2Element.innerHTML = randomNumber;
  //   }
  // }
  // generateRandomNumber();
  // // Update the number every 10 seconds
  // setInterval(generateRandomNumber, 1);
  // setTimeout(function () {
  //   clearInterval(generateRandomNumber);
  //   image.classList.remove("rotate-image");
  // }, 10000);
});

socket.on("game_winner", ({ game_winner }) => {
  // current_game_array = game_array
  console.log(game_winner);
});
setInterval(() => {
  if (current_game_array.length == numbers_array.length) {
    current_game_array = [];
    // sessionStorage.setItem(`${room}room`, JSON.stringify([]));
    return;
  }
  if (current_game_array.length != numbers_array.length) {
    numbers_array.forEach((innerArray, rowIndex) => {
      innerArray.forEach((elemeent, columnIndex) => {
        // console.log(JSON.parse(sessionStorage.getItem(`${r/oom}room`)));
        if (current_game_array.includes(innerArray.join(",") + ",")) {
          const element = innerArray.join(",");
          document.getElementById(`${element}`).style.color = "brown";
          document.getElementById(`${element}`).style.backgroundColor = "blue";
          foundElement = { element, rowIndex, columnIndex };
        }
      });
    });

    if (foundElement) {
      const { element, rowIndex, columnIndex } = foundElement;

      const cell = document.getElementById(`${element}`);
      cell.style.color = "yellow";
      // console.log(`Found element ${element} at [${rowIndex}, ${columnIndex}].`);
    } else {
      // console.log('No element from numbers_array is found in current_game_Array.');
    }
  }
}, 200);

// display in class
document.querySelectorAll(".cope").forEach((el) => {
  if (current_game_array.length != numbers_array.length) {
    el.addEventListener("click", (e) => {
      if (!current_game_array.includes(e.target.querySelector("span").innerHTML)) {
        current_game_array.push(e.target.querySelector("span").innerHTML);
        // sessionStorage.setItem(`${room}room`, JSON.stringify(current_game_array));
        sendMessage(e.target.querySelector("span").innerHTML);
        const number = e.target.querySelector("span").innerHTML;
        e.target.style.color = "brown";
        e.target.style.backgroundColor = "blue";
        e.target.style.padding = "1rem";
        e.target.style.fontWeight = "light";
        e.target.setAttribute("disabled", "");
        // console.log(current_game_array.length);
        // console.log(numbers_array.length);
        return;
      }
    });
  }
});

// send winner
function winner() {
  if (current_game_array.length == numbers_array.length) {
    console.log("current_game_array");

    const randomRowIndex = Math.floor(
      Math.random() * current_game_array.length
    );
    game_winner = current_game_array[randomRowIndex];
    const gridElement = document.getElementById("grid");
    gridElement.innerHTML = "";
    const trElement = document.createElement("tr");
    const hide = document.querySelectorAll(".hide");
    trElement.id = game_winner;
    trElement.classList.add("cope");
    hide.forEach((e) => {
      e.classList.add("hiddens");
    });
    trElement.innerHTML = game_winner;

    console.log("The random winner is:", game_winner);
    current_game_array = [];
    console.log("current_game_array");
    // console.log(current_game_array);

    // sessionStorage.setItem(`${room}room`, JSON.stringify(current_game_array));
    gridElement.appendChild(trElement);
    socket.emit("winner", { room, winner: game_winner,user_uid: user_id });

    // location.href = '/listgames.php'
    // console.log('winner', game_winner)
    return;
  }
  console.log("current_game_array");
  // console.log(current_game_array);
  // console.log(numbers_array);
}
setInterval(() => {
  // console.log('ya');
  // const lengtho = current_game_array.reduce((prev, curr) => {
  //     const values = curr.split(",");
  //     return prev + values.length;
  // }, 0);
  // console.log(lengtho);
  // console.log('lengtho');
  // console.log(current_game_array.length);
  // console.log(numbers_array.length);
  if (current_game_array.length == numbers_array.length) {
    console.log(current_game_array.length);
    console.log(numbers_array.length);
    console.log("yaaa");

    winner();

    return;
  }
}, 200);

// function clickElementsWithClass(className) {
//     let elements = document.querySelectorAll(`className`);
//     for (let i = 0; i < elements.length; i++) {
//         let element = elements[i];
//         element.click();
//     }
// }

// setTimeout(() => {
//   let elements = document.querySelectorAll(`.cope`);
//   for (let i = 0; i < elements.length; i++) {
//     let element = elements[i];
//     //    setInterval(() => {
//     // console.log(element);
//     element.click();
//     //    }, 2000);
//   }
// }, 3000);

//send and recive
function sendMessage(links) {
  // const room = document.getElementById('room').value;
  const message = links;
  socket.emit("message", { room, message, user_uid: user_id });
}
// sendMessage();
socket.on("message", ({ user, message, total_users }) => {
  document.querySelector(".total_user").innerHTML = total_users;
  // console.log(mflessage, user);
  //     const messagesDiv = document.getElementById('messages');
  //     const newMessage = document.createElement('div');
  //     newMessage.textContent = `[${user}]:${message}`;
  //     messagesDiv.appendChild(newMessage);
});
socket.on("total_user", ({ total_users }) => {
  // document.querySelector(".total_user").innerHTML = total_users;
  console.log(total_users);
  //     const messagesDiv = document.getElementById('messages');
  //     const newMessage = document.createElement('div');
  //     newMessage.textContent = `[${user}]:${message}`;
  //     messagesDiv.appendChild(newMessage);
});

// check if the user is in the store and signuin

// winner
// Choose a random row
// setInterval(winner, 1000);
