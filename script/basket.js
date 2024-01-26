
// async function fetchText() {
//   let response = await fetch('./views/maki_view.php');
//   let data = await response.text();
//   console.log(data);
// }


let compte = 0;

function add(event, id){
  event.preventDefault();
  console.log(id);
  compte++
  updateCount();
}

function updateCount(){
  document.getElementById('nb-panier').innerHTML = compte;
}
