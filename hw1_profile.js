function onJson1(json){
    console.log(json);
    box.innerHTML= '' ;
    box.classList.remove('invisibile');

    const list = document.querySelector('#lista');
    list.innerHTML= '';
  
    const div_lista = document.createElement('div');
    div_lista.textContent = 'Lista razze preferiti:';
    list.appendChild(div_lista);
  
  if (!json ){
    const div_contenitore= document.createElement('div');
    const div= document.createElement('div');
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
      fetch("rempreferiti.php?dati="+cod);
      fetch("http://localhost/Homework4/agglista.php").then(onResponse).then(onJson1);
    }
  }
}

function onResponse(response){
    return response.json();
}

fetch("http://localhost/Homework4/agglista.php").then(onResponse).then(onJson1);
const box = document.querySelector('#box-preferiti');