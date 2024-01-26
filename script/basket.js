
const div_basket = document.getElementById('nb-item');

async function item(){
  await fetch('./controllers/basket_ajax.php')
  .then((body) => {
    body)})
  //.catch(err => console.log(err))
}


let response = item();
console.log(response);


