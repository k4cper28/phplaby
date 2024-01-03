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
    fetch("http://localhost/KS/lab11bezKlasy/skrypty/onas.php")
        .then((response) => {
            if (response.status !== 200) {
                return Promise.reject('Coś poszło nie tak!');
            }
            return response.text();
        })
        .then((data) => {
            document.getElementById('main').innerHTML = data;
        })
        .catch((error) => {
            console.log(error);
        });
}

function pokazGalerie() {
    fetch("http://localhost/KS/lab11bezKlasy/skrypty/galeria.php")
        .then((response) => {
            if (response.status !== 200) {
                return Promise.reject('Coś poszło nie tak!');
            }
            return response.text();
        })
        .then((data) => {
            document.getElementById('main').innerHTML = data;
        })
        .catch((error) => {
            console.log(error);
        });
}


function pokazGlowna() {
    fetch("http://localhost/KS/lab11bezKlasy/skrypty/glowny.php")
        .then((response) => {
            if (response.status !== 200) {
                return Promise.reject('Coś poszło nie tak!');
            }
            return response.text();
        })
        .then((data) => {
            document.getElementById('main').innerHTML = data;
        })
        .catch((error) => {
            console.log(error);
        });
}

function pokazFormularz() {
    fetch("http://localhost/KS/lab11bezKlasy/skrypty/formularz.php")
        .then((response) => {
            if (!response.ok) {
                return Promise.reject('Coś poszło nie tak!');
            }
            return response.text();
        })
        .then((data) => {
            document.open(); // Otwórz nowe okno dokumentu
            document.write(data); // Zapisz nową zawartość dokumentu
            document.close(); // Zamknij dokument
        })
        .catch((error) => {
            console.log(error);
        });
}


function pokaz() {
    fetch("http://localhost/KS/lab11/skrypty/pokaz.php")
        .then((response) => {
            if (response.status !== 200) {
                return Promise.reject('Coś poszło nie tak!');
            }
            return response.text();
        })
        .then((data) => {
            document.getElementById('main').innerHTML = data;
        })
        .catch((error) => {
            console.log(error);
        });
}