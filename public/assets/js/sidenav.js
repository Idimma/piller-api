const sidenavContainer = document.querySelector('.sidenav__container')
document.querySelector('.sidenav-btn').addEventListener('click',() => {
    toggleClass(sidenavContainer,'active')
    setTimeout(() => {
        toggleClass(document.querySelector('.sidenav'),'active')
    },50)
})

const toggleClass = (elem,className) => {
    if(elem.classList.contains(className)){
        elem.classList.remove(className)
    }else{
        elem.classList.add(className)
    }
}

sidenavContainer.addEventListener('click', (e) => {
    if(e.path[0] === sidenavContainer){
        toggleClass(document.querySelector('.sidenav'),'active')
        setTimeout(() => {
            toggleClass(sidenavContainer,'active')
        },400) 
    }
})