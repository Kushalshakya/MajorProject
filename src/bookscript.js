const loaderEl = document.querySelector('#loader');
window.addEventListener('load', ()=>{
    loaderEl.style.display = "none";
})

const courseActiveEl = document.querySelector('.course-active')
const childActiveEl = document.querySelector('.child-active')

courseActiveEl.addEventListener('click',()=>{
    childActiveEl.classList.toggle('active')
})