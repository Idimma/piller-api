let hamburger = document.querySelector(".sidenav-btn")
let sliderClose = document.querySelector(".sidenav-close")
let menuContainer = document.querySelector(".sidenav__container")
let menu = document.querySelector(".sidenav")
let overlayNew = document.querySelector(".cover-overlay")


const openSlider = () => {
    overlayNew.style.display = "block"
    menuContainer.classList.add("active")        
    setTimeout(() => {
        menu.classList.add("active")
    }, 100)    
}

const closeSlider = () => {
    menu.classList.remove("active")
    setTimeout(() => {
        menuContainer.classList.remove("active")
        overlayNew.style.display = "none"
    }, 400)
}


hamburger.addEventListener("click", openSlider)
// sliderClose.addEventListener("click", closeSlider)
overlayNew.addEventListener("click", closeSlider)