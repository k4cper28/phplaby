<?php

require_once 'klasy/User.php';

session_start();

// Wyświetlanie id sesji i zmiennych sesji
echo "ID sesji: " . session_id() . "<br>";

if (isset($_SESSION['p1'])) {
    $p1_z_sesji=$_SESSION['p1'];
    $p1 = unserialize($_SESSION['p1']);
    echo "<p>Obiekt po odtworzeniu (deserializacji): <br />";
    $p1->show2();
    echo "</p>";
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