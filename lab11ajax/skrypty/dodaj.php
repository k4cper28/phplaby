<?php
include_once "../klasy/Baza.php";
$db = new Baza('localhost', 'root', '', 'klienci');

$nazwisko = filter_input(INPUT_POST, 'nazwisko',FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[A-Z][a-z]*$/")));
$wiek = filter_input(INPUT_POST, 'wiek',FILTER_VALIDATE_INT, array('options' => array('min_range' => 1, 'max_range' => 99)));
$panstwo = filter_input(INPUT_POST, 'panstwo');
$email = filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL);
$jezyk = filter_input(INPUT_POST, 'jezyk');
$zaplata = filter_input(INPUT_POST, 'zaplata');

$errors = array();

if (empty($nazwisko)) {
    $errors[] = "Brak nazwiska.";
}

if ($wiek === false || $wiek < 1 || $wiek > 99) {
    $errors[] = "Wiek musi być liczbą całkowitą z zakresu 1-99.";
}

if (empty($panstwo)) {
    $errors[] = "Brak informacji o kraju.";
}

if (empty($email)) {
    $errors[] = "Brak adresu e-mail.";
}

if (empty($jezyk)) {
    $errors[] = "Nie wybrano żadnego języka.";
}

if (empty($zaplata)) {
    $errors[] = "Nie wybrano sposobu płatności.";
}

if (!empty($errors)) {
    // Wyświetl informacje o brakujących danych
    echo "<p>Proszę dostarczyć brakujące dane:</p>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
} else {
    $sql = "INSERT INTO klienci (Nazwisko, Wiek, Panstwo, Email, Zamowienie, Platnosc) VALUES ('$nazwisko', $wiek, '$panstwo', '$email', '$jezyk', '$zaplata')";

    if ($db->insert($sql)) {
        print("<h4> Dane zostały wpisane!</h4>");
    } else {
        print("<h5> Pojawił się problem z dodaniem artykułu. Spróbuj ponownie za jakiś czas. </h5>");
    }
}
?>
