

function cambiaImmagine(percorso) {
    document.getElementById("immagine_valuta").setAttribute("src", percorso)

}

function cambiaBandiera(value) {
    if (value == "dollari") {
        percorso = "./images/us-flag.gif"
    } else if (value == "yen") {
        percorso = "./images/ja-flag.gif"
    } else if (value == "franchi_svizzeri") {
        percorso = "./images/sz-flag.gif"
    } else if (value == "sterline") {
        percorso = "./images/uk-flag.gif"
    }
    cambiaImmagine(percorso)
}


