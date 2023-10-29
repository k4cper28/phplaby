<?php
session_start();
$_SESSION['username'] = 'kubus';
$_SESSION['fullname'] = 'Kubus Puchatek';
$_SESSION['email'] = 'kubus@stumilowylas.pl';
$_SESSION['status'] = 'ADMIN';

?>


<!DOCTYPE html>
<body>

<?php
echo "ID sesji: " . session_id() . "<br>";


echo "Zmienne sesji: <br>";
foreach ($_SESSION as $key => $value) {
    echo $key . " => " . $value . "<br>";
}

echo "<br>Ciasteczka skojarzone z domeną localhost: <br>";
foreach ($_COOKIE as $key => $value) {
    echo $key . " => " . $value . "<br>";
}
?>

<br><br>
<a href="test2.php">Przejdź do test2.php</a>

</body>