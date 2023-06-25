var buttons = document.querySelectorAll(".btn");
var homeResetBtn = document.querySelectorAll(".home-reset");


const clickedBtn = buttons.forEach((btn) => {
  btn.addEventListener("click", function () {
    btn.classList.toggle("active");
  });
});

// const btnArray = [buttons, homeResetBtn];

// for (let i = 0; i < btnArray.length; i++) {
//   btnArray[i].addEventListener("click", function () {
//     buttons.classList.toggle("active");
//     homeResetBtn.classList.toggle("active");
//   });
// }

