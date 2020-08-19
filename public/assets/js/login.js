document.querySelector('.password-div button').addEventListener('click', () => {
    const passwordInput = document.querySelector('.password-div input');
    passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password'
})