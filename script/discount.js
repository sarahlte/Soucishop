function effectif(idCode){
    let effectif = document.getElementById('effectif'+idCode).value;
    let button = document.getElementById('button_eff'+idCode);
    if(effectif == 'oui'){
    button.style.textDecoration = "none";
    } else if (effectif == 'non'){
    button.style.textDecoration = "line-through";
    }
}
