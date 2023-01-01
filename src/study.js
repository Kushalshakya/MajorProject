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


    h = h < 10 ? "0" + h : h
    m = m < 10 ? "0" + m : m
    s = s < 10 ? "0" + s : s

    let ampm = "AM"
    
    if(ampm > 12){
        h = h - 12
        ampm = "PM"
    }

    
    hour.innerText = h + " : "
    minute.innerText = m + ":"
    second.innerText = s
    ampmEl.innerText = ampm

    setTimeout(() => {
        updateTime()
    }, 1000);
    
}
updateTime()