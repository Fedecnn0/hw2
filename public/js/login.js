function verifica(event){
    console.log("sono verifica");
    const errins = document.querySelector('#Errinserire');
    const errn = document.querySelector('#Errname');
    const errp = document.querySelector('#Errpassword');
    
    if(form.username.value.length === 0 && form.password.value.length === 0)
    {   
        errp.innerHTML='';
        errn.innerHTML='';
        errins.textContent='Compilare i campi';
        event.preventDefault();
    }
    else if(form.username.value.length === 0 && form.password.value.length !== 0){
        errins.innerHTML='';
        errp.innerHTML='';
        errn.textContent='Inserire il nome utente';
        event.preventDefault();
    }
    else if(form.username.value.length !== 0 && form.password.value.length === 0){
        errins.innerHTML='';
        errn.innerHTML='';
        errp.textContent='Inserire password';
        event.preventDefault();
    }
}

function onResponse(response){
    return response.json();
}

const form = document.forms['login'];
form.addEventListener('submit', verifica);
