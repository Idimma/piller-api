const slideBar = (e) => {

    // main js
    
    const AddPlan = document.querySelector(".add-plan-image");
    const depositOptions = document.querySelector(".choose-deposit-option")
    const AddcardTrigger = document.querySelectorAll(".Add-card-Trigger")
    const overlay = document.querySelector(".overlay")

    const EmptyDiv = document.querySelector(".empty-div")
    const listOfSpecialInputs = document.querySelectorAll(".special-dropdown")

    if (AddPlan !== null) {
        AddPlan.addEventListener("click", (e) => {
            AddPlan.style.display = "none"
            depositOptions.classList.add("show-form-flex")
        })    
    }


    AddcardTrigger.forEach(trigger => {
        trigger.addEventListener("click", (e) => {
            overlay.classList.add('show-form')
        })  
    })




    listOfSpecialInputs.forEach((input) => {
        input.addEventListener("click", (e) => {
            input.firstElementChild.firstElementChild.textContent =  e.target.textContent;
            input.lastElementChild.value = e.target.textContent
            console.log(input.lastElementChild)
        })
    })



    function listener(elm, listeners, cb) {
        let events = listeners.split(" ").filter(a => a).join("").split(",")
        events.forEach(event => {
            if(elm !== null){
            elm.addEventListener(event, cb)}
        })
    }

    // slider code

    const slider = document.querySelector(".slider")
    const currentPercent = document.querySelector(".current")
    const leftOver = document.querySelector(".negative")

    listener(slider, "mousemove,touchmove,change", (e) => {
        let sliderValue = slider.value
        updateSlider(sliderValue)
    })

   



    const updateSlider = (val) => {
        document.documentElement.style.setProperty("--colorMax", `${val}%`)
        currentPercent.textContent = `${val}%` 
        leftOver.textContent = `${100 - val}%`
    }
}

document.addEventListener("DOMContentLoaded", () => {
    // if(location.search.includes('new=true')){
    //     setTimeout(() => {
    //         document.querySelector(".add-plan-image").click()
    //     },20)
    // }
    slideBar()
})