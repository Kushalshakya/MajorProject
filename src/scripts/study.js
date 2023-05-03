// Date & Time Display StudyPage

const dateTimeEl = document.querySelector('.datetime')
const monthEl = document.querySelector('.month')
const yearEl = document.querySelector('.year')

const hour = document.querySelector('.datehour')
const minute = document.querySelector('.dateminute')
const second = document.querySelector('.datesecond')
const ampmEl = document.querySelector('.ampm')

dateTimeEl.innerText = new Date().getDate() + ","
yearEl.innerText = new Date().getFullYear()

const month = ["Jan","Feb","Mar","Apr","May","June","July","Aug","Sep","Oct","Nov","Dec"];

const d = new Date();
monthEl.innerText = month[d.getMonth()];


function updateTime(){
    let h = new Date().getHours()
    let m = new Date().getMinutes()
    let s = new Date().getSeconds()

    let ampm = "AM"

    if(h > 12){
        h = h - 12
        ampm = "PM"
    }
    
    h = h < 10 ? "0" + h : h
    m = m < 10 ? "0" + m : m
    s = s < 10 ? "0" + s : s

    hour.innerText = h + " : "
    minute.innerText = m + " : "
    second.innerText = s
    ampmEl.innerText = ampm
    ampmEl.style.marginLeft = "4px"

    setTimeout(() => {
        updateTime()
    }, 1000);
    
}
updateTime()



// Timer Js
let duration = 25;
let intervalId;
const timerEl = document.querySelector('.work-timer');

timerEl.textContent = duration + " : 00";

function startTimer(){
    let minutes = duration;
    let seconds = 0;

    clearInterval(intervalId);

    intervalId = setInterval(() => {
        seconds--;
        if(seconds < 0){
            minutes--;
            seconds = 59;
        }
        
        timerEl.textContent = minutes + " : " + (seconds < 10 ? "0" : '') + seconds;

        if(minutes === 0 && seconds === 0){
            clearInterval();
            alert("Time is up!");
        }

    }, 1000);

}

function resetTimer(){
    clearInterval(intervalId);
    timerEl.textContent = duration + " : 00";
}
function stopTimer(){
    clearInterval(intervalId);
}

const startEl = document.querySelector('.start');
startEl.addEventListener('click',()=>{
    startTimer();
    startEl.style.display = 'none';
});

const resetEl = document.querySelector('.reset');
const stopEl = document.querySelector('.stop');

resetEl.addEventListener('click',()=>{
    resetTimer();
    startEl.style.display = 'block';
})

stopEl.addEventListener('click', ()=>{
    stopTimer();
})

// ToDoList JS
const hideListEl = document.querySelector('.hidelist')
const listEl = document.querySelector('.list')
const addListEl = document.querySelector('.addlist')
const ulListEl = document.querySelector('.ullist')
const userInputEl = document.querySelector('.userinput')
const errorEl = document.querySelector('#todo-error')


addListEl.addEventListener('click',listAdd)

hideListEl.addEventListener('click',()=>{
    listEl.classList.toggle('active')
})
userInputEl.addEventListener('keyup',(key)=>{
    if(key.which === 13){
        listAdd()
    }
})

function listAdd(){
    if(userInputEl.value === ""){
        errorEl.style.display = "block"
        setTimeout(()=>{
            errorEl.style.display = "none"
        },2000)
    }
    else{
        const adder = document.createElement('li')
        adder.innerHTML = userInputEl.value
        ulListEl.appendChild(adder)
        userInputEl.value = ""
    }
}

// Mid-Screen NavBar 
const headerNavEl = document.querySelector('#header-nav')
const hamBurgerMidScreen = document.querySelector('.hamburger')

hamBurgerMidScreen.addEventListener('click',()=>{
    headerNavEl.classList.toggle('active')
})