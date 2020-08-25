const closeImgbtn = document.querySelectorAll('.x-button')
const overlayImage = document.querySelector('.overlay')
const overlayerImage = document.querySelector(".overlayer")
const cfm = document.querySelector(".withdrawal-confirmation")
const shsucces = document.querySelectorAll(".notify-img")
const clImg = document.querySelector(".close-img");
const edit = document.querySelectorAll(".edit");

closeImgbtn.forEach(button => {
	button.addEventListener('click', (e) => {
		if(edit !== null){
			edit.forEach(input => {
				input.value = null
			})
		}

		if(overlayerImage !== null){
			overlayerImage.classList.remove("show-form");
			overlayerImage.classList.remove('backgroundBlend')
		}else{
			overlayImage.classList.remove("show-form");
			overlayImage.classList.remove("backgroundBlend")
		}
		if(cfm !== null){
			cfm.classList.remove("hideConfirmation")
		}
		if ( shsucces !== []){
			shsucces.forEach(img => {
				img.classList.remove("showSuccess")
			})
		}
		if(clImg !== null){
			clImg.classList.remove("showSuccess")
		}
	})

})
