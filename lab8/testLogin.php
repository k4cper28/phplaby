<?php
include_once "klasy/Baza.php";
include_once "klasy/User.php";
include_once "klasy/UserManager.php";

session_start();



$db = new Baza("localhost", "root", "", "klienci");

$um = new UserManager();

    $sessionId = session_id();
    $userId = $um->getLoggedInUser($db, $sessionId);

if ($userId !== -1) {
    // Użytkownik jest zalogowany

    echo '<br><a href="processLogin.php?akcja=wyloguj">Wyloguj</a><br>';

    echo "Dane zalogowanego użytkownika:<br>";

    echo $db->select("select id,userName,fullName,	email   from users where id = $userId", ["id", "userName", "fullName", "email"]);
} else {
    // Użytkownik nie jest zalogowany, przekieruj na stronę logowania
    header("Location: processLogin.php");
    exit();
}






?>