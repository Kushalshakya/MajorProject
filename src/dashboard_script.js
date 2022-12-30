// Loader
const loaderEl = document.querySelector('#loader');
window.addEventListener('load', ()=>{
    loaderEl.style.display = "none";
})

const html = document.documentElement;
const body = document.body;
const menuLinks = document.querySelectorAll(".admin-menu a");
const switchInput = document.querySelector(".switch input");
const switchLabel = document.querySelector(".switch label");

const pageheader = document.querySelector('.page-header')
const hamburgerBtn = document.querySelector('.hambtn')
const contentheader = document.querySelector('#content-header')
const dashboard = document.querySelector('#dashboard')
const setting = document.getElementById('setting')

hamburgerBtn.addEventListener('click', ()=>{
  pageheader.classList.toggle('active')
  contentheader.classList.toggle('active')
  dashboard.classList.toggle('active')
  setting.classList.toggle('active')
  updateLocalStorageNav()
})

let dynamicNumEl = document.querySelectorAll('.dynamicnum')
let interval = 3000;

dynamicNumEl.forEach((dynamicNum) => {
  let startValue = 0;
  let endValue = parseInt(dynamicNum.getAttribute("data-num"))
  let duration = Math.floor(interval / endValue)
  let counter = setInterval(function(){
    startValue += 1
    dynamicNum.textContent = startValue
  if(startValue == endValue){
    clearInterval(counter)
  }
  },duration)
});

let side = JSON.parse(localStorage.getItem('side'))
if(side == null){
  side = 1
}
function updateLocalStorageNav(){
  localStorage.setItem("side", JSON.stringify(side))
  side++
}