const ArrayOfLists = document.querySelectorAll(".plans-body")
const ArrayOfOptions = document.querySelectorAll(".header--option")
TargetClass = null
ArrayOfOptions.forEach(Option => {
	Option.addEventListener("click", function(e) {
		ArrayOfOptions.forEach(miniOption => {
			miniOption.classList.remove("header--option-active")
		})

		Option.classList.add("header--option-active")
		TargetClass = this.dataset.type

		ArrayOfLists.forEach(list => {
			list.classList.remove("showList")
			if(list.dataset.type == TargetClass){
				list.classList.add("showList")
			}
		})

	})
})

