
const div_basket = document.getElementById('nb-item');
fetch('basket_ajax.php').then((response) => {
    if (!response.ok) {
        throw new Error("Problème - code d'état HTTP : " + response.status);
    }
    return response.json();
}).then((body) => {
    div_basket.innerHTML = body.nb;
})


