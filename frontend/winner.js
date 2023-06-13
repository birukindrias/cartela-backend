// alert('adsfsdaf')
// var image = document.getElementById('myImage_winner');
// document.getElementById('myImage').style.display = 'block';
// var rotationInterval = setInterval(function () {
    // image.classList.toggle('rotate-image');
// }, 3000);
let turn_inter ;
window.addEventListener('DOMContentLoaded', () => {
    const h2Element = document.querySelector('#w_number h1');

    function generateRandomNumber() {
        const randomNumber = Math.floor(Math.random() * 100) + 1;
        h2Element.innerText = randomNumber;
    }
    // generateRandomNumber()
    // Update the number every 10 seconds
     turn_inter = setInterval(generateRandomNumber, 1);
});
// current_game_array = game_array
// setTimeout(function () {
//     clearInterval(rotationInterval);
// }, 10000);
setTimeout(function () {
    clearInterval(turn_inter);
}, 10000);
setTimeout(function () {
    // const gridElement = document.getElementById("grid");
    // gridElement.innerHTML = '';
    // const trElement = document.createElement("tr");
    // const hide = document.querySelectorAll(".hide");
    const w_name_number_ = document.querySelector(".w_name_number_");
    const win = document.querySelector(".win").innerHTML;
    let numbersArray = win.split(",");
    // console.log(numbersString);
    

    let randomIndex = Math.floor(Math.random() * numbersArray.length);

    // Retrieve the random number from the array
    let randomNum = numbersArray[randomIndex];
   
    w_name_number_.innerHTML = win;
    const h2Element = document.querySelector('#w_number h1');
    h2Element.innerHTML = randomNum
    console.log("The random winner is:", win);
    console.log('current_game_array');
    console.log(win);
}, 10000);