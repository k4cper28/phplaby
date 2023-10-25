<?php

use lab5\User;
include 'klasy/User.php';

use lab5\RegistrationForm;
include 'klasy/RegistrationForm.php';

$rf = new RegistrationForm(); //wyświetla formularz rejestracji
if (filter_input(INPUT_POST, 'submit')) {
    $user = $rf->checkUser(); //sprawdza poprawność danych
    if ($user === NULL)
        echo "<p>Niepoprawne dane rejestracji.</p>";
    else{
        echo "<p>Poprawne dane rejestracji:</p>";
        $user->show();
    }
}

?>