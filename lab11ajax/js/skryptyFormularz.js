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

    const zaplataRadio = document.querySelector('input[name="zaplata"]:checked');
    formData.append("zaplata", zaplataRadio ? zaplataRadio.value : '');

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/KS/lab11bezKlasy/skrypty/dodaj.php", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                document.getElementById('odpowiedz').innerHTML = xhr.responseText;
                console.log("Dodano artykuł:");
                clearFormFields();
            } else {
                console.log('Coś poszło nie tak!');
            }
        }
    };

    xhr.send(formData);
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
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/KS/lab11bezKlasy/skrypty/pokaz.php", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                document.getElementById('odpowiedz').innerHTML = xhr.responseText;
            } else {
                console.log('Coś poszło nie tak!');
            }
        }
    };

    xhr.send();
}
