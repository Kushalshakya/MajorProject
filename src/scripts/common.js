// Loader
const loaderEl = document.querySelector('#loader');
window.addEventListener('load', ()=>{
    setTimeout(() => {
        loaderEl.style.display = "none";
    }, 2000);
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