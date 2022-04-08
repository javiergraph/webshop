function addToCart(id) {
    let panier = parseInt(document.getElementById("nombre-articles").textContent);
    panier = panier + 1
    document.getElementById("nombre-articles").innerHTML = panier;

    // enregistrer les infos de l'achat dans les cookies
    let article = 'quantite-' + id;
    let quantite = parseInt(document.getElementById(article).value);

    // Enregistre les infos de l'achat dans un cookie

    // Récupérer la valeur du cookie achat
    if (document.cookie.length > 0) {
        var tablecookie = document.cookie.split(';');
        var nomcookie = "achat=";
        var valeurcookie = "";
        for (i = 0; i < tablecookie.length; i++) {
            if (tablecookie[i].indexOf(nomcookie) != -1) {
                valeurcookie = tablecookie[i].substring(nomcookie.length + tablecookie[i].indexOf(nomcookie), tablecookie[i].length);
            }
        }

        if (valeurcookie == 0) {
            let temp = [id + '-' + quantite]
            cookie = JSON.stringify(temp);
            document.cookie = 'achat=' + cookie;
        } else {
            let cookie = JSON.parse(valeurcookie);
            let temp = id + '-' + quantite;
            cookie.push(temp);
            cookie = JSON.stringify(cookie);
            document.cookie = 'achat=' + cookie;
        }

    }
    document.cookie = 'panier=' + panier;
    console.log(document.cookie);
}

function ajouter() {
    Swal.fire({
        icon: 'success',
        title: 'Ajoute au panier',
        //footer: '<a href>Why do I have this issue?</a>'
        timer: 2000,
        toast: true,
        position: 'bottom',
        showConfirmButton: false
    })
}

function panierVide() {
    console.log('ok');
    Swal.fire({
        icon: 'error',
        title: 'Sélection vide!',
        text: 'Revenez à la page principale pour effectuer votre achat',
        footer: '<a href="index.php">Page Principal</a>'
    })
}

function eraser() {
    Swal.fire({
        icon: 'error',
        title: 'Supprimé!',
        text: 'Votre choix a été éliminé!',
        timer: 70000

    })
}

function vide() {
    Swal.fire({
        icon: 'error',
        title: 'Sélection vide!',
        text: 'Revenez à la page principale pour effectuer votre achat',
        footer: '<a href="index.php">Page Principal</a>'
    })
}

function hola() {
    Swal.fire({
        title: 'Inscrivez vous!',
        text: 'BEST VIDEO PROGRAMMING CONFERENCE',
        imageUrl: 'img/ads.jpg',
        imageWidth: 400,
        imageHeight: 265,
        imageAlt: 'Custom image',
    })
}

//compte regresive

$('.compter').countdown('2020/10/10 09:00:00', function(event) {
    $('#jour').html(event.strftime('%D'));
    $('#hours').html(event.strftime('%H'));
    $('#minutes').html(event.strftime('%M'));
    $('#secondes').html(event.strftime('%S'));
});