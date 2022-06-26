function jsonCheckUsername(json) {
    if (!json.exists) {
        document.querySelector('.username').classList.remove('errori');
    } else {
        document.querySelector('.username span').textContent = "Username già in uso";
        document.querySelector('.username').classList.add('errori');
    }
}

function jsonCheckEmail(json) {
    if (!json.exists) {
        document.querySelector('.email').classList.remove('errori');
    } else {
        document.querySelector('.email span').textContent = "Email già in uso";
        document.querySelector('.email').classList.add('errori');
    }
}

function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function checkUsername(event) {
    if(!/^[a-zA-Z0-9_]{1,15}$/.test(username.value)) {
        username.parentNode.querySelector('span').textContent = "Sono ammesse lettere, numeri e underscore.";
        username.parentNode.classList.add('errori');
    } else {
        fetch(REGISTER_URL+"/username/"+encodeURIComponent(username.value)).then(fetchResponse).then(jsonCheckUsername);
    }    
}

function checkEmail(event) {
    const emailInput = document.querySelector('.email input');
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        document.querySelector('.email span').textContent = "Email non valida";
        document.querySelector('.email').classList.add('errori');
    } else {
        fetch(REGISTER_URL + "/email/"+encodeURIComponent(String(emailInput.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
    }
}

const email = document.querySelector('.email input')
email.addEventListener('blur', checkEmail);
const username = document.querySelector('.username input')
username.addEventListener('blur', checkUsername);