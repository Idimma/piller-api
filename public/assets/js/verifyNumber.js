const verifyButton = document.querySelector('.Verification-submit')
const failedImage = document.querySelector('.failed-img')
const successImage = document.querySelector('.success-image')
const imgCont = document.querySelector('.notify-image-container')
const closeImage = document.querySelector('.close-img')
const overlay = document.querySelector('.overlay')
const input = document.querySelector('.Verification-input')


verifyButton.addEventListener('click', (e) => {
	if(input.value !== ''){
		e.preventDefault()
    overlay.classList.add('backgroundBlend')
    successImage.classList.add('showSuccess')
    closeImage.classList.add("showSuccess")	
    imgCont.classList.add('showSuccess')
	}  
})