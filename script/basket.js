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




  if(document.getElementById("livraison").checked == true){
    document.getElementById("livraison-div").hidden= false;
    document.getElementById("livraison-infos").hidden= false;
  }else if (document.getElementById("livraison").checked == false){
    document.getElementById("livraison-div").hidden = true;
    document.getElementById("livraison-infos").hidden = true;
  }



function add(id, type){
  document.cookie = "id_js = " + id ;
  document.cookie = "type_js = " + type ;
  document.cookie = "funct_js = add";
  console.log(id)
  location.reload
}

function del(id, type){
  document.cookie = "id_js = " + id ;
  document.cookie = "type_js = " + type ;
  document.cookie = "funct_js = del";
  console.log(id)
  location.reload()
}

function track() {
  console.log(document.getElementById("livraison").checked)
  if ( document.getElementById("livraison").checked==true ) {
    document.cookie = "livraison ="+ document.getElementById("livraison").checked;
    document.cookie = "checked = checked";
    document.cookie = "hidden = hidden";
  } else if(document.getElementById("livraison").checked==false){
    document.cookie = "livraison ="+document.getElementById("livraison").checked;
    document.cookie = "checked = ";
    document.cookie = "hidden = hidden";
  }

};
