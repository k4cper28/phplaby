document.addEventListener('DOMContentLoaded', () => {
    var bindex = document.getElementById('index');
    bindex.addEventListener("click", () => {
        console.log("Przełączanie na stronę główną");
        przejdzNaStrone("http://localhost/KS/test/index.php");
    });

    var bform = document.getElementById('form');
    bform.addEventListener("click", () => {
        console.log("Przełączanie na stronę formularza");
        przejdzNaStrone("http://localhost/KS/test/formularz.php");
    });
});

function przejdzNaStrone(url) {
    fetch(url)
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