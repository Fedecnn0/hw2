
let boolean;
function agglike(event){
    
    const risp = event.currentTarget;
    const post_id = risp.dataset.id;

    let formdata = new FormData();
    formdata.append('_token', csrf_token);
    formdata.append('post_id', post_id);

    for(let value of formdata.values()){
        console.log(value);
    }
    fetch('more', {method:'post', body:formdata});
}

function remlike(event){

    event.currentTarget.removeEventListener('click', remlike);
    event.currentTarget.addEventListener('click', agglike);
    const risp = event.currentTarget;
    const cod = risp.dataset.id;
    fetch(BASE_URL + "remlike/"+cod);
}

function onJsonCod(json){
    console.log(json);
    boolean = json;
}

function onJson2(json){

    console.log(json);
    boxp.innerHTML= '' ;
  
    const list = document.querySelector('#posts');
    list.innerHTML= '';
  
    const div_posts = document.createElement('div');
    div_posts.textContent = 'Nuovi posts:';
    list.appendChild(div_posts);
    
    if (json == 0 ){
      const div_contenitore= document.createElement('div');
      const div= document.createElement('div');
      div.classList.add('prefvuoto');
      div.textContent='Non sono ancora stati pubblicati posts.';
      div_contenitore.appendChild(div);
      boxp.appendChild(div_contenitore);
    }
    else {
      for(let i=0; i<json.length; i++)
      {	
        console.log(json);
        const info=json[i];
        const cod=info.id;
        const un=info.username;
        const testo=info.scritta;
        const img_url=info.carica; 
        const nlove=info.n_like;
    
        const div_contenitore= document.createElement('div');
        const username= document.createElement('div');
        username.classList.add('username');
        username.textContent= un;
        const div_ft= document.createElement('div');
        div_ft.classList.add('ft');
        const div_titolo= document.createElement('p');
        div_titolo.textContent = testo;
        const img = document.createElement('img');
        img.src=img_url;
        /*
        const sotto = document.createElement('div');
        sotto.classList.add('sotto');

        const totlike = document.createElement('div');
        totlike.classList.add('totlike');
          
        const like = document.createElement('div');
        like.src = '../img/like_d.svg';
        like.classList.add('button');

        const nlike = document.createElement('div');
        nlike.classList.add('nlike');
        nlike.textContent=nlove;*/
        
        

        div_contenitore.appendChild(username);
        div_contenitore.appendChild(div_ft);
        //div_contenitore.appendChild(sotto);
        
        div_ft.appendChild(img);
        div_ft.appendChild(div_titolo);

        /*sotto.appendChild(totlike);

        totlike.appendChild(like);
        totlike.appendChild(nlike);*/

        boxp.appendChild(div_contenitore);
        div_contenitore.classList.add('post');
        //like.setAttribute('data-id', cod);

        //fetch(BASE_URL + "giamipiace/"+cod).then(onResponse).then(onJsonCod);
        //const mipiace = document.querySelector('.like');
        
      }
    }
  }

function onResponse(response){
    console.log(response);
    return response.json();
}

fetch(BASE_URL + 'getPost').then(onResponse).then(onJson2);
const boxp = document.querySelector('#box-posts');