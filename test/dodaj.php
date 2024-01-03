<?php
include_once "klasy/Baza.php";
$db = new Baza('localhost', 'root', '', 'dane');
$tytul = filter_input(INPUT_POST, 'tytul');
$tresc = filter_input(INPUT_POST, 'tresc');
$autor = filter_input(INPUT_POST, 'autor');
if (!($autor && $tytul && $tresc)) {
    echo "Nie wypeniono niektórych pól";
} else { $data = (new DateTime())->format("Y-m-d");
    $sql = "INSERT INTO dane
VALUES(NULL,'$tytul','$tresc','$data','$autor')";
    if ($db->insert($sql)) {
        print("<h4> Dane zostały wpisane!</h4>");
    } else {
        print("<h5> Pojawił się problem z dodaniem artykułu.
 Spróbuj ponownie za jakiś czas. </h5>"); }
}