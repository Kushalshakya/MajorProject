// Mid-Screen
const headerNavEl = document.querySelector('#header-nav')
const hamBurgerMidScreen = document.querySelector('.hamburger')

hamBurgerMidScreen.addEventListener('click',()=>{
    headerNavEl.classList.toggle('active')
})

const donateEl = document.querySelector('#donate-popup')
const helpEl = document.querySelector('#help')
const closeEl = document.querySelector('#donate-popup .fa-close')

helpEl.addEventListener('click', ()=>{
    donateEl.classList.toggle('active')
})

closeEl.addEventListener('click', ()=>{
    donateEl.classList.toggle('active')
})