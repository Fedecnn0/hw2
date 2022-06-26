function onJson1(json){
  console.log(json);
  box.innerHTML= '' ;

  const list = document.querySelector('#lista');
  list.innerHTML= '';

  const div_lista = document.createElement('div');
  div_lista.textContent = 'Lista razze preferiti:';
  list.appendChild(div_lista);
  
  if (json == 0 ){
    const div_contenitore= document.createElement('div');
    const div= document.createElement('div');
    div.classList.add('prefvuoto');
    div.textContent='Non hai ancora aggiunto cani alla tua lista';
    div_contenitore.appendChild(div);
    box.appendChild(div_contenitore);
  }
  else {
    for(let i=0; i<json.length;i++)
    {	
      console.log(json);
      const info=json[i];
      const cod=info.razza;
      const titolo=info.name;
      const img_url=info.carica; 
  
      const div_contenitore= document.createElement('div');
      const div_titolo= document.createElement('h1');
      div_titolo.textContent= titolo;
      const img = document.createElement('img');
      img.src=img_url;
      const pref = document.createElement('div');
      pref.classList.add('pref');
      pref.classList.add('button');
      
      div_contenitore.appendChild(img);
      div_contenitore.appendChild(div_titolo);
      div_contenitore.appendChild(pref);
       
      box.appendChild(div_contenitore);
      div_contenitore.classList.add('cont');
      pref.setAttribute('data-id', cod);
    }
      
    const like = document.querySelectorAll('.cont div');
    for (let lk of like){
      lk.addEventListener('click', rempreferito);
    }
    function rempreferito(event){
      const risp = event.currentTarget;
      const cod = risp.dataset.id;
      console.log(cod);
      fetch(BASE_URL + "remove/"+cod);
      fetch(BASE_URL + 'cuore').then(onResponse).then(onJson1);
    }
  }
}

function onJson2(json){
  console.log(json);
  boxp.innerHTML= '' ;

  const list = document.querySelector('#posts');
  list.innerHTML= '';

  const div_posts = document.createElement('div');
  div_posts.textContent = 'I miei posts:';
  list.appendChild(div_posts);
  
  if (json == 0 ){
    const div_contenitore= document.createElement('div');
    const div= document.createElement('div');
    div.classList.add('prefvuoto');
    div.textContent='Non hai ancora pubblicato post';
    div_contenitore.appendChild(div);
    boxp.appendChild(div_contenitore);
  }
  else {
    for(let i=0; i<json.length; i++)
    {	
      console.log(json);
      const info=json[i];
      const cod=info.id;
      const testo=info.scritta;
      const img_url=info.carica; 
  
      const div_contenitore= document.createElement('div');
      const div_ft= document.createElement('div');
      div_ft.classList.add('ft');
      const div_titolo= document.createElement('p');
      div_titolo.textContent = testo;
      const img = document.createElement('img');
      img.src=img_url;
      const sotto = document.createElement('div');
      sotto.classList.add('sotto');
      const bid = document.createElement('div');
      bid.classList.add('bid');
      bid.classList.add('button');
      /*const like = document.createElement('div');
      like.classList.add('like');
      like.classList.add('button');*/
      

      div_contenitore.appendChild(div_ft);
      div_contenitore.appendChild(sotto);
      
      div_ft.appendChild(img);
      div_ft.appendChild(div_titolo);

      //sotto.appendChild(like);
      sotto.appendChild(bid); 

      boxp.appendChild(div_contenitore);
      div_contenitore.classList.add('post');
      bid.setAttribute('data-id', cod);
      //like.setAttribute('data-id', cod);
    }

    const mipiace = document.querySelectorAll('.like');
    for (let mp of mipiace){
      mp.addEventListener('click', vedi_like);
    }
    function vedi_like(event){
      const risp = event.currentTarget;
      const cod = risp.dataset.id;
      console.log(cod);
      fetch(BASE_URL + "vedi/"+cod);
      fetch(BASE_URL + 'posts').then(onResponse).then(onJson2);
    }
    
    const cestino = document.querySelectorAll('.bid');
    for (let c of cestino){
      c.addEventListener('click', remposts);
    }
    function remposts(event){
      const risp = event.currentTarget;
      const cod = risp.dataset.id;
      console.log(cod);
      fetch(BASE_URL + "rem/"+cod);
      fetch(BASE_URL + 'posts').then(onResponse).then(onJson2);
    }
  }
}

function onResponse(response){
    return response.json();
}

fetch(BASE_URL + 'cuore').then(onResponse).then(onJson1);
const box = document.querySelector('#box-preferiti');

fetch(BASE_URL + 'posts').then(onResponse).then(onJson2);
const boxp = document.querySelector('#box-posts');