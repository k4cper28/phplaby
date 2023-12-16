<?php
//wykorzystaj lekko zmodyfikowane wcześniej tworzone funkcje
//pomocnicza funkcja generująca formularz:
function drukuj_form() {
    $zawartosc = 'elo';
    return $zawartosc;
}
function walidacja() { //jak poprzednio – tylko usunąć polecenia echo
}
function dodajdoBD($bd) { //funkcja powinna zwracać łańcuch z komunikatem
//czy udało się czy nie dodać dane do bazy – reszta bez zmia
}
//uchwyt do bazy klienci:
include_once "E:/xampp/htdocs/KS/lab10/klasy/Baza.php";
$tytul = "Formularz zamowienia";
$zawartosc = drukuj_form();
$bd = new Baza("localhost", "root", "", "klienci");
/*
if (filter_input(INPUT_POST, "submit")) {
    $akcja = filter_input(INPUT_POST, "submit");
    switch ($akcja) {
        case "Dodaj" : $zawartosc.= dodajdoBD($bd);
            break;
        case "Pokaż" : $zawartosc.= $bd->select("select * from klienci",
            ["Email", "Zamowienie"]);
            break;
    }
}*/