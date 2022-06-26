const like = document.querySelector('#preferiti');
like.addEventListener('click', aggpreferito);
let boolean;

function aggpreferito(event){
    let agg = event.currentTarget.querySelector('.cuore');
    agg.src = '../img/like_d.svg';
    event.currentTarget.removeEventListener('click', aggpreferito);
    event.currentTarget.addEventListener('click', rempreferito);
    let formdata = new FormData();
    formdata.append('_token', csrf_token);
    formdata.append('breed', breed);
    formdata.append('img', img);
    formdata.append('un', un);
    for(let value of formdata.values()){
        console.log(value);
    }
    fetch('add', {method:'post', body:formdata});
}

function rempreferito(event){
    let agg = event.currentTarget.querySelector('.cuore');
    agg.src = '../img/like.svg';
    event.currentTarget.removeEventListener('click', rempreferito);
    event.currentTarget.addEventListener('click', aggpreferito);
    fetch(BASE_URL + "remove/"+breed);
    console.log(breed);
}

function onJsonBreed2(json){
    console.log(json);
    boolean = json;
}

function onJsonBreed(json){
    const cuor = document.querySelector('.cuore');
    if(boolean){
        cuor.src = '../img/like_d.svg';
    } else{
        cuor.src = '../img/like.svg';
    }
    const nome = document.querySelector("#name");
    nome.textContent = json[breed].name;
    un = nome.textContent;
    image.src = json[breed].image.url;
    img = image.src;
    const weight =document.querySelector("#weight");
    weight.textContent = json[breed].weight.metric;
    const height =document.querySelector("#height");
    height.textContent = json[breed].height.metric;
    const bred_for =document.querySelector("#bred_for");
    bred_for.textContent = json[breed].bred_for;
    const breed_group =document.querySelector("#breed_group");
    breed_group.textContent = json[breed].breed_group;
    const lifeSpan =document.querySelector("#life_span");
    lifeSpan.textContent = json[breed].life_span;
    const temperament =document.querySelector("#temperament");
    temperament.textContent = json[breed].temperament;
    const origin =document.querySelector("#origin");
    origin.textContent = json[breed].origin;    
}

function onRespBreed(response){
    console.log(response);
    return response.json();
}

function searchForBreed(event){
    if(event.currentTarget.textContent==="seleziona razza"){
        breedData.classList.add("invisibile");
    }
    else{
        breedData.classList.remove("invisibile");
    }
    breed = event.currentTarget.value;
    fetch(BASE_URL + "controllo/"+breed).then(onRespBreed).then(onJsonBreed2);
    fetch(BASE_URL+ 'api').then(onRespBreed).then(onJsonBreed);
}

function onJson(json){
    console.log(json);
    console.log("lunghezza file: "+json.length);
    for(let i = 0; i<json.length;i++){
        const opt = document.createElement("option");
        opt.textContent=json[i].name;
        opt.value = i;
        opt.addEventListener("change",searchForBreed);
        select.appendChild(opt);
    }
}

function onResponse(response){
    return response.json();
}

let breed;
let img;
let un;
fetch(BASE_URL+ 'api').then(onResponse).then(onJson);
const select = document.querySelector("#selector");
select.addEventListener("change",searchForBreed);
const image = document.querySelector("#breed_image");
const table = document.querySelector("#breed_data_table");
const breedData = document.querySelector("#breed_data");