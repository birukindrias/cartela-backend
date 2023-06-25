const profilePicture = document.getElementById("profilePicture");
const userName = document.getElementById("userName");
const displayBalance = document.getElementById("displayBalance");
// const reloadBtn = document.getElementById("reloadBtn");
// console.log(reloadBtn);

const URL = "google.com";

fetch(URL)
  .then((res) => {
    if (res.status >= 200 && res.status <= 299) {
      res.json();
    } else {
      throw new Error(res.statusText);
    }
  })
  .then((data) => {
    const { image, name, balance } = data;
    const img = new image();

    img.onload = () => {
      userName.textContent = name;
      displayBalance.textContent = balance;

      // append the img in to the html component
      profilePicture.appendChild(img);
    };
    img.onerror = () => {
      console.log("Failed to load the image");
    };
  })
  .catch((Error) => console.log("Can not fetch the data"));
