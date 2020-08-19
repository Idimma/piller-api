const hamburger = document.querySelector(".hamburger");
const bars = document.querySelectorAll(".hamburger-child")
const menu = document.querySelector(".mobile-nav");
hamburger.addEventListener("click", function(e){
})
let showing = false
hamburger.addEventListener("click", (e) => {
    if(!showing){
        open()
    }else{
        close()
    }
    showing = !showing
})

menu.addEventListener("click", () => {
    close()
    showing = false
})
const open = (e) => {
         bars[0].classList.add("rotateRight")
         bars[1].classList.add("fadeAway")
         bars[2].classList.add("rotateLeft")
         menu.classList.add("show-mobile-nav")  
}
const close = (e) => {
    bars[0].classList.remove("rotateRight")
    bars[1].classList.remove("fadeAway")
    bars[2].classList.remove("rotateLeft")
    menu.classList.remove("show-mobile-nav")
    bars[0].classList.add("notrotateRight")
    bars[1].classList.add("notfadeAway")
    bars[2].classList.add("notrotateLeft")
    menu.classList.add("hide-mobile-nav")

    setTimeout(() => {
        bars[0].classList.remove("notrotateRight")
        bars[1].classList.remove("notfadeAway")
        bars[2].classList.remove("notrotateLeft")
        menu.classList.remove("hide-mobile-nav")
    }, 300)    
}

