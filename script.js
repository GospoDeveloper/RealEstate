"use strict";
// tentativa sticky navbar
// window.onscroll = function () {
//   myFunction();
// };

// // Get the navbar
// var navbar = document.getElementById("navbar");

// // Get the offset position of the navbar
// var sticky = navbar.offsetTop;

// // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
// function myFunction() {
//   if (window.pageYOffset >= sticky) {
//     navbar.classList.add("sticky");
//   } else {
//     navbar.classList.remove("sticky");
//   }
// }

let loginContainer = document.querySelector(".login");
let topContainer = document.querySelector(".top-container");
let btnRegister = document.getElementById("btn-register");
let btnLogin = document.querySelector(".btn-login");
let registerContainer = document.querySelector(".register");
let inapoiLaLogare = document.getElementById("redirectionare");
let formRegister = document.querySelector(".register-form");
let counter = 0;
// eventul de click pe butonul de login ca sa afiseze login container
btnLogin.addEventListener("click", function () {
  counter++;
  if (counter % 2 != 0) {
    topContainer.classList.add("displayNone");
    loginContainer.style.display = "flex";
    registerContainer.classList.add("displayNone");
  } else {
    topContainer.classList.remove("displayNone");
    loginContainer.style.display = "none";
    registerContainer.classList.add("displayNone");
  }
});

console.log(btnRegister);
console.log(counter);

// eventul de click pe butonul de inregistrare care afiseaza inregistrarea
btnRegister.addEventListener("click", function (event) {
  event.preventDefault();
  registerContainer.classList.remove("displayNone");
  loginContainer.style.display = "none";
});

inapoiLaLogare.addEventListener("click", function (event) {
  event.preventDefault();
  loginContainer.style.display = "flex";
  registerContainer.classList.add("displayNone");
});
// geolocation
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(
    function (pozitie) {
      const { latitude } = pozitie.coords;
      const { longitude } = pozitie.coords;
      console.log(pozitie);
      console.log(latitude, longitude);
    },
    function () {
      alert("Nu se poate gasi locatia");
    }
  );
}

formRegister.addEventListener("reload", function (e) {
  e.preventDefault();
});
