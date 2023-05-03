// Loader
const loaderEl = document.querySelector('#loader');
window.addEventListener('load', ()=>{
    loaderEl.style.display = "none";
})

const pageheader = document.querySelector('.page-header')
const hamburgerBtn = document.querySelector('.hambtn')
const contentheader = document.querySelector('#content-header')
const dashboard = document.querySelector('#dashboard')
const userEl = document.querySelector('#user')

hamburgerBtn.addEventListener('click', ()=>{
    userEl.classList.toggle('active')
    pageheader.classList.toggle('active')
    contentheader.classList.toggle('active')
})
  