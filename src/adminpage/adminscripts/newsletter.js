// Loader
const loaderEl = document.querySelector('#loader');
window.addEventListener('load', ()=>{
    loaderEl.style.display = "none";
})

const pageheader = document.querySelector('.page-header')
const hamburgerBtn = document.querySelector('.hambtn')
const contentheader = document.querySelector('#content-header')
const newsletterEl = document.querySelector('#newsletter-admin')

hamburgerBtn.addEventListener('click', ()=>{
    contentheader.classList.toggle('active')
    pageheader.classList.toggle('active')
    newsletterEl.classList.toggle('active')
})

const previewEl = document.querySelector('.preview');
previewEl.addEventListener('click', ()=>{
    window.open("../../Newsletter/email.html", "_blank")
    //window.location.href = "../../Newsletter/email.html";   
})