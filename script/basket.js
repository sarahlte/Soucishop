
async function fetchText() {
  let response = await fetch('./controllers/basket_ajax.php');
  let data = await response.json();
  console.log(data);
}
function effectuerAppelAjax(event) {
  event.preventDefault();


  const divReponse = document.getElementById('reponseAjax');

  if (divReponse != null) { 

      fetch('traitement-bidon.php?nom=toto')
      .then((response) => {
          if (!response.ok) {
              throw new Error("Problème - code d'état HTTP : " + response.status);
          }
          return response.json();
      }).then((body) => {
          divReponse.innerHTML = body.salutation;
      }).catch((e) => {
          console.log(e.toString());
          divReponse.innerHTML = "Un problème nous empêche de compléter le traitement demandé.";
      });
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
