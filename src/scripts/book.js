const advanceEl = document.querySelector('.advance_btn')
const advanceCloseEl = document.querySelector('.advance-close')
const advanceSearchEl = document.querySelector('#advanced-search')

advanceEl.addEventListener('click',()=>{
    advanceSearchEl.classList.toggle('active')
})
advanceCloseEl.addEventListener('click',()=>{
    advanceSearchEl.classList.toggle('active')
})
