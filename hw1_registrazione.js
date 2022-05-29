function checkName(event) {
    const input = event.currentTarget;
    
    if (input.value.length > 0) {
        input.parentNode.classList.remove('errorj');
    } else {
        input.parentNode.classList.add('errorj');
    }

}

function jsonCheckUsername(json) {

    if (!json.exists) {
        document.querySelector('.username').classList.remove('errorj');
    } else {
        document.querySelector('.username span').textContent = "Nome utente già utilizzato";
        document.querySelector('.username').classList.add('errorj');
    }

}

function jsonCheckEmail(json) {

    if (!json.exists) {
        document.querySelector('.email').classList.remove('errorj');
    } else {
        document.querySelector('.email span').textContent = "Email già utilizzata";
        document.querySelector('.email').classList.add('errorj');
    }

}

function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function checkUsername(event) {


    if(!/^[a-zA-Z0-9_]{1,15}$/.test(username.value)) {
        username.parentNode.querySelector('span').textContent = "Sono ammesse lettere, numeri e underscore. Max. 15";
        username.parentNode.classList.add('errorj');
    } else {
        fetch("check_username.php?q="+encodeURIComponent(username.value)).then(fetchResponse).then(jsonCheckUsername);
    }    
}

function checkEmail(event) {
    const emailInput = document.querySelector('.email input');
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        document.querySelector('.email span').textContent = "Email non valida";
        document.querySelector('.email').classList.add('errorj');
    } else {
        fetch("check_email.php?q="+encodeURIComponent(String(emailInput.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
    }
}

function checkPassword(event) {
    const passwordInput = document.querySelector('.password input');
    if ( passwordInput.value.length >= 8) {
        document.querySelector('.password').classList.remove('errorj');
    } else {
        document.querySelector('.password').classList.add('errorj');
    }

}

function checkConfirmPassword(event) {
    const confirmPasswordInput = document.querySelector('.verifica input');
    if (confirmPasswordInput.value === document.querySelector('.password input').value) {
        document.querySelector('.verifica').classList.remove('errorj');
    } else {
        document.querySelector('.verifica').classList.add('errorj');
    }

}


const namee = document.querySelector('.nome input');
namee.addEventListener('blur', checkName);
const suername = document.querySelector('.cognome input')
suername.addEventListener('blur', checkName);
const email = document.querySelector('.email input')
email.addEventListener('blur', checkEmail);
const username = document.querySelector('.username input')
username.addEventListener('blur', checkUsername);
const address = document.querySelector('.indirizzo input');
address.addEventListener('blur', checkName);
const password = document.querySelector('.password input')
password.addEventListener('blur', checkPassword);
const confirm_password = document.querySelector('.verifica input')
confirm_password.addEventListener('blur', checkConfirmPassword);

