const list = document.querySelector(".list")
const invoice = document.querySelector(".invoice")
const buttons = document.querySelectorAll(".plan-group")
const view = document.querySelector(".viewpicker")
const close = document.getElementById('close');

buttons.forEach(button =>{
	button.addEventListener("click", (e) => {
		list.style.display = "none"
		invoice.style.display = "block"
		view.style.display = "none"
	})
})

if(close){
	close.addEventListener('click', (e) => {
		list.style.display = "block"
		invoice.style.display = "none"
		view.style.display = "block"
	})
}

