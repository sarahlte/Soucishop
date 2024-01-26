
const div_basket = document.getElementById('nb-item');

/* async function item(){
  await fetch('./controllers/basket_ajax.php')
  .then((body) => {
    body)})
  //.catch(err => console.log(err))
}
 */



function handleChange(checkbox) {
  if(checkbox.checked == true){
    document.getElementById("livraison-div").hidden = false;
  }else{
    document.getElementById("livraison-div").hidden = true;
 }
}
