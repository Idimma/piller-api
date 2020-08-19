const list = document.querySelector(".list")
const invoice = document.querySelector(".invoice")
const buttons = document.querySelectorAll(".plan-group")
const view = document.querySelector(".viewpicker")

buttons.forEach(button =>{
	button.addEventListener("click", (e) => {
		list.style.display = "none"
		invoice.style.display = "block"  
		view.style.display = "none"
	})
}) 


