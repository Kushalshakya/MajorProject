// Loader
const loaderEl = document.querySelector('#loader');
window.addEventListener('load', ()=>{
    loaderEl.style.display = "none";
})

const pageheader = document.querySelector('.page-header')
const hamburgerBtn = document.querySelector('.hambtn')
const contentheader = document.querySelector('#content-header')
const donationEl = document.querySelector('#donation-admin');

hamburgerBtn.addEventListener('click', ()=>{
    contentheader.classList.toggle('active')
    pageheader.classList.toggle('active')
    donationEl.classList.toggle('active')
})
  