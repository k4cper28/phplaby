<?php


include_once "klasy/RegistrationForm.php";
include_once "klasy/User.php";
include_once "klasy/Baza.php";
require_once 'klasy/RegistrationForm.php';


//$db = new Baza("localhost", "root", "", "klienci");
$db = new PDO('mysql:host=localhost;dbname=klienci', 'root','');
$rf = new RegistrationForm(); //wyświetla formularz rejestracji

if (filter_input(INPUT_POST, 'submit')) {
    $akcja = filter_input(INPUT_POST, "submit");
    $user = $rf->checkUser(); //sprawdza poprawność danych
    if ($user === NULL)
        echo "<br><br>";
    else{
        switch ($akcja) {
            case "Zarejestruj":
                $user->saveDB($db);
                break;

        }
    }
}
echo "aktualny wyglad bazy danych: ";
User::getAllUsersFromDB($db);

?>