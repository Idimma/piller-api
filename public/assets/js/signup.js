document.querySelectorAll('.password-div').forEach(e => {
    e.querySelector('button').addEventListener('click', () => {
        const passwordInput = e.querySelector('input');
        passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password'
    })
});

[...document.querySelectorAll('.select-option')].forEach(e => {
    e.addEventListener('click', () => {
        const parent = e.parentElement;
        const target = parent.dataset.target;
        document.getElementById(target).value = e.innerText;
        parent.classList.remove('active')
    })
});