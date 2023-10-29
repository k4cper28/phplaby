<?php

require_once 'klasy/User.php';

session_start();

// Wyświetlanie id sesji i zmiennych sesji
echo "ID sesji: " . session_id() . "<br>";

echo "Zmienne sesji: <br>";
foreach ($_SESSION as $key => $value) {
    echo $key . " => " . $value . "<br>";
}

// Usunięcie sesji
session_destroy();

// Wyświetlenie powiadomienia o usunięciu sesji
echo "<br>Sesja została zniszczona.<br>";

// Sprawdzenie, czy istnieje ciasteczko sesyjne z tym samym id
foreach ($_COOKIE as $key => $value) {
    echo $key . " => " . $value . "<br>";
}
?>

<!DOCTYPE html>
<html>
<body>
<br><br>
<a href="test1b.php">Powrót do test1.php</a>

</body>
</html>