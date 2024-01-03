//Fetch API
document.addEventListener('DOMContentLoaded', () => {
    var bdodaj = document.getElementById('dodaj');
    bdodaj.addEventListener("click", () => {
        console.log("Dodawanie artykułu");
        dodaj();
    });
    var bpokaz = document.getElementById('pokaz');
    bpokaz.addEventListener("click", () => {
        console.log("Pobranie wszystkich artykułów");
        pokaz();
    });
});

function dodaj() {
    const formData = new FormData();
    formData.append("tytul", document.getElementById('tytul').value);
    formData.append("autor", document.getElementById('autor').value);
    formData.append("tresc", document.getElementById('tresc').value);

    console.log( document.getElementById('tytul').value);

    fetch("http://localhost/KS/test/dodaj.php", {
        method: "post",
        body: formData
    })
        .then( response => response.text())
        .then(response => {
            console.log("Dodano artykuł:");
            console.log(response);
        });
}

function pokaz() {
    fetch("http://localhost/KS/test/pokaz.php")
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
