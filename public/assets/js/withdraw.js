const overlay = document.querySelector('.overlay')
const overlayer = document.querySelector('.overlayer')
const withdrawalTable = document.querySelector('.withdrawal-confirmation')
const successImg = document.querySelector('.success-img')
const failedImg = document.querySelector('.failed-img')
const confirmBtn = document.querySelector('.confirm')
const submit = document.querySelector('.plans-submit')
const addBtn = document.querySelector('.btn__add')
const closeImg = document.querySelector('.close-img')


addBtn.addEventListener("click", (e) => {
	e.preventDefault()
    if(overlayer === null){
	    overlay.classList.add('show-form')    	
    }else{
    	overlayer.classList.add('show-form')
    }
})

submit.addEventListener("click", (e) => {
    e.preventDefault()
    if(overlayer === null){
	    overlay.classList.add('show-form')    	
    }else{
    	overlayer.classList.add('show-form')
    }
})

confirmBtn.addEventListener("click", () => {
    withdrawalTable.classList.add('hideConfirmation')
    successImg.classList.add('showSuccess')
    closeImg.classList.add('showSuccess')
})




