/*const create = document.querySelector('#pubblica');
like.addEventListener('click', create);

function create(event){
    let formdata = new FormData();
    formdata.append('_token', csrf_token);
    formdata.append('carica', carica);
    formdata.append('scritta', scritta);
    for(let value of formdata.values()){
        console.log(value);
    }
    fetch('createPost', {method:'post', body:formdata});
}*/
let path;
var file = new Array();

function checkF(event) {
    const input = event.currentTarget;
    if(input.value = "Scrivi una didascalia..."){
        input.value = "";
    }else preventEventdefault();
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function Foto(){
    const div_image = document.querySelector('.immagine');
    div_image.innerHTML = '';
    const image = document.createElement('img');
  
    image.src = "images/"+path;
    console.log(image.src);
  
    div_image.appendChild(image);
}

function clickSelectFile(event) {
    upload_original.click();
}

function checkUpload(event) {
    
    const upload_original = document.getElementById('upload_original');
    document.querySelector('#upload .file_name').textContent = upload_original.files[0].name;
    file_car = upload_original.files[0];
    path = upload_original.files[0].name;
    const o_size = upload_original.files[0].size;
    const mb_size = o_size / 1000000;
    document.querySelector('#upload .file_size').textContent = mb_size.toFixed(2)+" MB";
    const ext = upload_original.files[0].name.split('.').pop();
    
    let formdata = new FormData();
    formdata.append('_token', csrf_token);
    formdata.append('carica', file_car);
    formdata.append('path', path);
    for(let value of formdata.values()){
        console.log(value);
    }

    fetch('createFoto', {method:'post', body:formdata});
  
    sleep(55).then(() => {     
        Foto();
    });
   
    
}

function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}



let carica;
let scritta;
const frase = document.querySelector('.didascalia');
frase.addEventListener('click', checkF);
const clickselectfile = document.getElementById('upload')
clickselectfile.addEventListener('click', clickSelectFile);
const upload = document.getElementById('upload_original')
upload.addEventListener('change', checkUpload);
