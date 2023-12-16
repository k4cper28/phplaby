<?php

require_once("klasy/strona.php");
$tytul = "Galeria";
$zawartosc = "";

$katalogZdjecia = 'zdjecia/';

// Uzyskaj listę plików w katalogu
$pliki = scandir($katalogZdjecia);

$licznik = 0;

$zawartosc .= '<div id="zdjecia">';

// Iteruj przez pliki
foreach ($pliki as $plik) {
    // Pomijaj katalogi . i ..
    if ($plik != '.' && $plik != '..' && $plik[0] == 'o') {
        // Wyświetl obrazki
        $zawartosc .= '<div class="flex-item"><img src="' . $katalogZdjecia . '/' . $plik . '" alt="Zdjęcie" /></div>';
    }
}

$zawartosc .= '</div>'
?>