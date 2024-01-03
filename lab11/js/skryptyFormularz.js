document.addEventListener('DOMContentLoaded', () => {
    var bdodaj = document.getElementById('dodaj');
    bdodaj.addEventListener("click", () => {
        console.log("Dodawanie klienta");
        dodaj();
    });
    var bpokaz = document.getElementById('pokaz');
    bpokaz.addEventListener("click", () => {
        console.log("Pobranie wszystkich klientow");
        pokaz();
    });
});

function dodaj() {
    const formData = new FormData();
    formData.append("nazw", document.getElementById('Nazwisko').value);

    fetch("http://localhost/KS/lab11/skrypty/dodaj.php", {
        method: "post",
        body: formData
    })
        .then( response => response.text())
        .then(response => {
            console.log("Dodano artykuł:");
            console.log(response);

            return response;
        }).then((data) => {
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
