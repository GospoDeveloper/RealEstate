"use strict";
let primaImagine = document.querySelector(".prima-imagine");
let containerApartamente = document.querySelector(".apartamente");
let containerCase = document.querySelector(".case");
let containerSpatii = document.querySelector(".spatii");
let containerVideo = document.querySelector(".video-inchirieri");
primaImagine.addEventListener("click", function () {
  containerApartamente.classList.add("displayNone");
  containerCase.classList.add("displayNone");
  containerSpatii.classList.add("displayNone");
  containerVideo.style.display = "flex";
});
