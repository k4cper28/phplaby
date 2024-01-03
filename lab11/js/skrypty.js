document.addEventListener('DOMContentLoaded', () => {

    console.log("Glowna");

    pokazGlowna();

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

    // var bpokaz = document.getElementById('pokaz');
    //
    // bpokaz.addEventListener("click", () => {
    //     console.log("Pobranie wszystkich klientow");
    //     pokaz();
    // });
    //
    // var bdodaj = document.getElementById('dodaj');
    //
    // bdodaj.addEventListener("click", () => {
    //     console.log("Dodawanie klienta");
    //     dodaj();
    // });
});

function pokazOnas() {
    fetch("http://localhost/KS/lab11/skrypty/onas.php")
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
    fetch("http://localhost/KS/lab11/skrypty/galeria.php")
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
    fetch("http://localhost/KS/lab11/skrypty/glowna.php")
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
    fetch("http://localhost/KS/lab11/skrypty/formularz.php")
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