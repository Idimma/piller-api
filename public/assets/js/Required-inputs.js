const arrInputs = document.querySelectorAll('input')

arrInputs.forEach(input => {
	input.required = true
})


// select the button with submit attributes
const button = document.querySelector("[type='submit']")
const inputArray = document.querySelectorAll('input')

button.addEventListener("click", (e) => {
	for(let i = 0; i < inputArray.length; i++){
		if(inputArray[i].value === ''){
			inputArray[i].style.border = "0.5px solid #EF1D36"
			
			// the adde p tag

			// const p = document.createElement("p")
			// p.textContent = "please fill this field"
			// p.style.color = "#EF1D36"
			// p.style.fontSize = '9px';
			// p.style.margin = '5px'


			inputArray[i].after(p)
		}
		else{
			inputArray[i].style.border = '1px solid rgba(155, 155, 155, 0.3)'	
		}	
	}
})



