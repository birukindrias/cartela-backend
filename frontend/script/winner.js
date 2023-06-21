let turn_inter;
// alert('asdf')
let image = document.querySelector("img");
image.classList.add("img");

let rotationInterval = setInterval(function () {
    image.classList.add("img");
}, 3000);
rotationInterval
const h2Element = document.querySelector('h33');
// alert('asdf')
// alert(h2Element)
console.log(h2Element)

function generateRandomNumber() {
    const randomNumber = Math.floor(Math.random() * 100) + 1;
    h2Element.innerHTML = randomNumber
}
turn_inter = setInterval(generateRandomNumber, 1);

// setTimeout(function () {
   
// }, 10000);

setTimeout(function () {

    const w_name_number_ = document.querySelector("h33");
 
}, 10000);
setTimeout(function () {
    clearInterval(turn_inter);
    // const h2Element = document.querySelector('h33');

    //    const win = document.querySelector(".win").innerHTML;
    // let numbersArray = win.split(",");
    // let randomIndex = Math.floor(Math.random() * numbersArray.length);
    // let randomNum = numbersArray[randomIndex];
    // w_name_number_.innerHTML = win;
    image.classList.remove("img");

    clearInterval(rotationInterval);
    let win = document.querySelector(".winner").innerHTML;
    let h36 = document.querySelector(".winner_now").innerHTML;
    let h3 = document.querySelector("h36");
    let h33 = document.querySelector("h33");
    // let numbersArray = win.split(",");
    // let randomIndex = Math.floor(Math.random() * numbersArray.length);
    // let randomNum = numbersArray[randomIndex];
    h3.innerHTML = win;
    // const h2Element = document.querySelector('h33');
    h2Element.innerHTML = win
    console.log("The random winner is:", win);
    console.log('current_game_array');
    console.log(win);
}, 10000);



//  var image = document.getElementById("myImage");
//   var rotationInterval = setInterval(function () {
//     image.classList.toggle("rotate-image");
//   }, 3000);
//   // (() => {
//   //   const h2Element = document.querySelector("#w_number h1");

//   //   function generateRandomNumber() {
//   //     let randomNumber = Math.floor(Math.random() * 100) + 1;
//   //     console.log(randomNumber);
//   //     if (randomNumber) {

//   //       h2Element.innerHTML = randomNumber;
//   //     } 
//   //   }
//   //   generateRandomNumber();
//   //   // Update the number every 10 seconds
//   //   setInterval(generateRandomNumber, 1);
//   // })();
//   const randomNumberGenerator = (min, max) => {
//     return Math.floor(Math.random() * (max - min + 1)) + min;
//   };

//   let body = document.querySelector("#w_number h1");
//   let randomNumber = randomNumberGenerator(1, 100);
//   console.log(body);
//   console.log(randomNumber);
//   // Set the value of the h2 element to the random number
//   body.innerHTML = randomNumber;
//   const interval = setInterval(() => {
//     // Generate a random number between 1 and 100
//     const randomNumber = randomNumberGenerator(1, 100);

//     // Set the value of the h2 element to the random number
//     body.textContent = randomNumber;
//   }, 1000);
//   // document.querySelector('.w_number').innerHTML =
//   // current_game_array = game_array
//   setTimeout(function () {
//     clearInterval(generateRandomNumber);
//     //
//     //
//     //
//     //
//     //
//     clearInterval(rotationInterval);
//   }, 10000);
//   // document.getElementById("myImage_winner").classList.remove('rotate-image_winner');

//   setTimeout(function () {
//     const gridElement = document.getElementById("grid");
//     gridElement.innerHTML = "";
//     const trElement = document.createElement("tr");
//     const hide = document.querySelectorAll(".hide");
//     const w_name_number_ = document.querySelectorAll(".w_name_number_");
//     trElement.id = game_winner;
//     trElement.classList.add("cope");
//     hide.forEach((e) => {
//       e.classList.add("hiddens");
//     });
//     trElement.innerHTML = game_winner;
//     w_name_number_.innerHTML = game_winner;

//     console.log("The random winner is:", game_winner);
//     current_game_array = [];
//     console.log("current_game_array");
//     gridElement.appendChild(trElement);
//     console.log(game_winner);
//   }, 10000);
