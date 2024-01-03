<?php
// Uzyskaj listę plików w katalogu
$katalogZdjecia = '../zdjecia';
$pliki = scandir($katalogZdjecia);


$zawartosc = '';

$zawartosc .= '<br><div id=zdjecia>';


$zawartosc .= "<div class=flex-item><img src='../zdjecia/obraz1.JPG' alt='foto' /></div>";
$zawartosc .= "<div class=flex-item><img src='../zdjecia/obraz2.JPG' alt='foto' /></div>";
$zawartosc .= "<div class=flex-item><img src='../zdjecia/obraz3.JPG' alt='foto' /></div>";
$zawartosc .= "<div class=flex-item><img src='../zdjecia/obraz4.JPG' alt='foto' /></div>";
$zawartosc .= "<div class=flex-item><img src='../zdjecia/obraz5.JPG' alt='foto' /></div>";
$zawartosc .= "<div class=flex-item><img src='../zdjecia/obraz6.JPG' alt='foto' /></div>";
$zawartosc .= "<div class=flex-item><img src='../zdjecia/obraz7.JPG' alt='foto' /></div>";
$zawartosc .= "<div class=flex-item><img src='../zdjecia/obraz8.JPG' alt='foto' /></div>";
$zawartosc .= "<div class=flex-item><img src='../zdjecia/obraz9.JPG' alt='foto' /></div>";
$zawartosc .= "<div class=flex-item><img src='../zdjecia/obraz10.JPG' alt='foto' /></div>";


$zawartosc .=  '</div>';

    echo $zawartosc;

?>