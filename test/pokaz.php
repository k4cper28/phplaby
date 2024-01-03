<?php
include_once "klasy/Baza.php";
$db = new Baza('localhost', 'root', '', 'klienci');
$sql = "select * from klienci";
echo $db->select($sql, ["Nazwisko", "Zamowienie"]);