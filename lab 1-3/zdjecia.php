<?php

var_dump($_REQUEST);

var_dump($_POST);

if (isset($_POST['szer']) && isset($_POST['wys'])) {
    echo "Dane zostały przesłane.<br>";
} else {
    echo "Dane nie zostały przesłane.<br>";
}

if (isset($_GET['zdj'])) {
    $pic_param = $_GET['zdj'];
    echo "Parametr pic otrzymany: " . $pic_param;
} else {
    echo "Parametr pic nie został otrzymany.";
}

?>