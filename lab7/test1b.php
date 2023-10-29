<?php
require_once 'klasy/User.php';

session_start();

$user = new User('kubus', 'Kubus Puchatek', 'kubus@stumilowylas.pl', 'ADMIN');

var_dump($user);


?>


<!DOCTYPE html>
<body>

<?php
echo "ID sesji: " . session_id() . "<br>";


//echo "Zmienne sesji: <br>";
//foreach ($_SESSION as $key => $value) {
//    echo $key . " => " . $value . "<br>";
//}

echo "<br>Ciasteczka skojarzone z domeną localhost: <br>";
foreach ($_COOKIE as $key => $value) {
    echo $key . " => " . $value . "<br>";
}
?>

<br><br>
<a href="test2b.php">Przejdź do test2.php</a>

</body>