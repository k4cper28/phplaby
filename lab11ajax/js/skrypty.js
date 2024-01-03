document.addEventListener('DOMContentLoaded', () => {
    var bonas = document.getElementById('onas');
    bonas.addEventListener("click", () => {
        console.log("Strona O nas");
        pokazOnas();
    });

    var bgaleria = document.getElementById('galeria');
    bgaleria.addEventListener("click", () => {
        console.log("Galeria zdjęć");
        pokazGalerie();
    });

    var bglowna = document.getElementById('index');
    bglowna.addEventListener("click", () => {
        console.log("Glowna");
        pokazGlowna();
    });

    var bformularz = document.getElementById('formularz');
    bformularz.addEventListener("click", () => {
        console.log("Formularz");
        pokazFormularz();
    });
});

function pokazOnas() {
    ajaxRequest("http://localhost/KS/lab11bezKlasy/skrypty/onas.php", "GET", (data) => {
        document.getElementById('main').innerHTML = data;
    });
}

function pokazGalerie() {
    ajaxRequest("http://localhost/KS/lab11bezKlasy/skrypty/galeria.php", "GET", (data) => {
        document.getElementById('main').innerHTML = data;
    });
}

function pokazGlowna() {
    ajaxRequest("http://localhost/KS/lab11bezKlasy/skrypty/glowny.php", "GET", (data) => {
        document.getElementById('main').innerHTML = data;
    });
}

function pokazFormularz() {
    ajaxRequest("http://localhost/KS/lab11bezKlasy/skrypty/formularz.php", "GET", (data) => {
        document.open();
        document.write(data);
        document.close();
    });
}

function ajaxRequest(url, method, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open(method, url, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                callback(xhr.responseText);
            } else {
                console.log('Coś poszło nie tak!');
            }
        }
    };

    xhr.send();
}
