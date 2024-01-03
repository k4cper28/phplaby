<?php
require_once("klasy/Strona.php");
$strona_akt = new Strona();
//dołącz plik z ustawioną zmienną $tytul i $zawartosc
$plik = "skrypty/glowna.php";
if (file_exists($plik)) {
    $strona_akt->wyswietl();
}   