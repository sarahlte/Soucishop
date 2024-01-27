let boutonAppelAjax = document.getElementById('nb-panier');


let body = document.querySelector('body');

onload = effectuerAppelAjax;
onchange = effectuerAppelAjax;


function effectuerAppelAjax() {

  const divReponse = document.getElementById('nb-panier');

  if (divReponse != null) { 

      fetch('./controllers/basket_ajax.php')
      .then((response) => {
          if (!response.ok) {
              throw new Error("Problème - code d'état HTTP : " + response.status);
          }
          return response.json();
      }).then((body) => {
          divReponse.innerHTML = body;
      })
  }
  else {
      console.log("Erreur : la division reponseAjax n'existe pas.");
  }
}


let compte = 0;

/* function add(event, id){
  event.preventDefault();
  console.log(id);
  compte++
  updateCount();
}

function updateCount(){
  document.getElementById('nb-panier').innerHTML = compte;
} */

function handleChange(checkbox) {
  if(checkbox.checked == true){
      document.getElementById("livraison-div").hidden= false;
      document.getElementById("livraison-infos").hidden= false;
  }else{
      document.getElementById("livraison-div").hidden = true;
      document.getElementById("livraison-infos").hidden = true;
 }
}

function add(id, type){
  document.cookie = "id_js = " + id ;
  document.cookie = "type_js = " + type ;
  document.cookie = "funct_js = add";
  console.log(id)
}

function del(id, type){
  document.cookie = "id_js = " + id ;
  document.cookie = "type_js = " + type ;
  document.cookie = "funct_js = del";
  console.log(id)
}

function track() {
  if ( document.getElementById("livraison-div").checked==true ) {
    document.cookie = "livraison = 1"
  } else {
    document.cookie = "livraison = 0"
  }
};

