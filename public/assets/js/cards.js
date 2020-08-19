[...document.querySelectorAll('.remove-card')].forEach(e => {
    e.addEventListener('click', () => {
        e.nextElementSibling.style.display = 'block';
        setTimeout(() => {
            e.nextElementSibling.classList.add('active')
        },50)
    })
});

[...document.querySelectorAll('.remove-card__button')].forEach(e => {
    e.addEventListener('click', () => {
        e.parentElement.parentElement.classList.remove('active')
        setTimeout(() => {
            e.parentElement.parentElement.style.display = 'none'
        },300)
    })
})