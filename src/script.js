// Loader
const loaderEl = document.querySelector('#loader');
window.addEventListener('load', ()=>{
    loaderEl.style.display = "none";
})

// Navigation Arrow
const arrow = document.getElementById('arrow')
arrow.style.display="none";
window.addEventListener('scroll',()=>{
    if(window.scrollY < 100){
        arrow.style.display="none";
    }
    else{
        arrow.style.display="block";
    }
})

// Login & Signup
const btn = document.querySelector('.btnlg')
const login = document.querySelector('.lg')
const close = document.querySelector('.close')

const login_side = document.querySelector('.login_side')
const signup_side = document.querySelector('.ss')
const back_side = document.querySelector('.back_side')

function clickable(){
    login.classList.toggle('active')
}
function registration(){
    signup_side.classList.toggle('active')
    login.classList.toggle('active')
}

btn.addEventListener("click", clickable)
close.addEventListener('click', clickable)

login_side.addEventListener('click',registration)
back_side.addEventListener('click',registration)

const close_register = document.querySelector('.close_register')
function closeone(){
    signup_side.classList.toggle('active')
}
close_register.addEventListener('click', closeone)

const generateSecurePass = document.querySelector('.generate')
const pass = document.querySelector('.cypertext')
let store = ''
generateSecurePass.addEventListener('click',()=>{
    pass.innerText = generate()
})

function generate(){
    let store = ''
    const num = "0z3X1N8c2@67R#9aBdE5HnfGhi4j"
    for(let a=0;a<8;a++){
        const random = Math.floor(Math.random()*num.length)
        store += num.substring(random,random + 1)
    }
    return store
}

const headerNavEl = document.querySelector('#header-nav')
const hamBurgerMidScreen = document.querySelector('.hamburger')

hamBurgerMidScreen.addEventListener('click',()=>{
    headerNavEl.classList.toggle('active')
})



// Header
const header = document.querySelector("#header")
window.onscroll = function(){   
    if(window.scrollY >= 400){
        header.style.height = 45 + "px"
    }
    else{
        header.style.height = 50 + "px"
    }
}

// Image Slider
const nextEl = document.querySelector('.main-next');
const prevEl = document.querySelector('.main-prev');
const imageSliderEl = document.querySelector('.image-slider-cover')
const imagesEl = document.querySelectorAll('.images-sld')

let imgNum = 1
let timeout

nextEl.addEventListener('click',()=>{
    imgNum++
    clearTimeout(timeout)
    imageSliderUpdate()
})
prevEl.addEventListener('click',()=>{
    imgNum--
    clearTimeout(timeout)
    imageSliderUpdate()
})
imageSliderUpdate()
function imageSliderUpdate(){
    if(imgNum > imagesEl.length){
        imgNum = 1
    }
    else if(imgNum < 1){
        imgNum = imagesEl.length
    }
    imageSliderEl.style.transform = `translateX(${(imgNum -1) * -1250}px)`

    timeout = setTimeout(()=>{
        imgNum++
        imageSliderUpdate()
    },3000)
}


// Reveling
window.addEventListener('scroll', reveal);

function reveal(){
    var reveals = document.querySelectorAll('.reveal');
    for(var i=0;i<reveals.length;i++){
        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 150;

        if(revealtop < windowheight - revealpoint){
            reveals[i].classList.add('active');
        }
        else{
            reveals[i].classList.remove('active');
        }
    }
}