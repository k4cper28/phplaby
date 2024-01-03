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
    formData.append("nazwisko", document.getElementById('Nazwisko').value);
    formData.append("wiek", document.getElementById('Wiek').value);
    formData.append("panstwo", document.getElementById('Panstwo').value);
    formData.append("email", document.getElementById('Email').value);

    const jezyki = document.querySelectorAll('input[name="jezyk[]"]:checked');

    const wybraneJezykiString = Array.from(jezyki).map(checkbox => checkbox.value).join(',');

    formData.append("jezyk", wybraneJezykiString);

    const zaplataRadio = document.querySelector('input[name="zaplata"]').value;

    formData.append("zaplata", zaplataRadio);

    fetch("http://localhost/KS/lab11bezKlasy/skrypty/dodaj.php", {
        method: "post",
        body: formData

    }).then((response) => {
        if (response.status !== 200) {
            return Promise.reject('Coś poszło nie tak!');
        }
        return response.text();
    })
        .then( response => {
            document.getElementById('odpowiedz').innerHTML = response;}
        )
        .then(response => {
            console.log("Dodano artykuł:");
            clearFormFields();
        });
}

function clearFormFields() {
    document.getElementById('Nazwisko').value = '';
    document.getElementById('Wiek').value = '';
    document.getElementsByName('panstwo')[0].value = '';
    document.getElementsByName('email')[0].value = '';

    // Odznacz zaznaczone checkboxy
    const jezyki = document.querySelectorAll('input[name="jezyk[]"]:checked');
    jezyki.forEach(checkbox => checkbox.checked = false);

    // Odznacz zaznaczony przycisk radio
    const zaplata = document.querySelector('input[name="zaplata"]:checked');
    if (zaplata) {
        zaplata.checked = false;
    }
}


function pokaz() {
    fetch("http://localhost/KS/lab11bezKlasy/skrypty/pokaz.php")
        .then((response) => {
            if (response.status !== 200) {
                return Promise.reject('Coś poszło nie tak!');
            }
            return response.text();
        })
        .then((data) => {
            document.getElementById('odpowiedz').innerHTML = data;
        })
        .catch((error) => {
            console.log(error);
        });
}
