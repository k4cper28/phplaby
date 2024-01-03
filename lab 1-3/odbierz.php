<?php
if (isset($_REQUEST['nazw'])&&($_REQUEST['nazw']!="")) {
    $nazwisko = htmlspecialchars(trim($_REQUEST['nazw']));
    echo "Nazwisko: $nazwisko <br />";
}
else echo "Nie wpisano nazwiska <br />";

if (isset($_REQUEST['wiek'])&&($_REQUEST['wiek']!="")) {
    $wiek = htmlspecialchars(trim($_REQUEST['wiek']));
    echo "Wiek: $wiek <br />";
}
else echo "Nie wpisano wieku<br />";

if (isset($_REQUEST['panstwo'])&&($_REQUEST['panstwo']!="")) {
    $panstwo = htmlspecialchars(trim($_REQUEST['panstwo']));
    echo "Panstwo: $panstwo <br />";
}
else echo "Nie wpisano panstwa <br />";

if (isset($_REQUEST['email'])&&($_REQUEST['email']!="")) {
    $email = htmlspecialchars(trim($_REQUEST['email']));
    echo "email: $email <br />";
}
else echo "Nie wpisano emailu <br />";

if (isset($_REQUEST['telefon'])&&($_REQUEST['telefon']!="")) {
    $telefon = htmlspecialchars(trim($_REQUEST['telefon']));
    echo "telefon: $telefon<br />";
}
else echo "Nie wpisano telefonu<br />";

if (isset($_REQUEST['jezyk'])) {

    $kurs = join(",", $_REQUEST['jezyk']);

    echo "wybrane kursy: $kurs <br />";
}
else echo "Nie wybrano jezyka <br />";

if (isset($_REQUEST['zaplata'])) {

    $zaplata = join(",", $_REQUEST['zaplata']);

    echo "wybrane zaplata: $zaplata <br />";
}
else echo "Nie wybrano zaplaty <br />";

foreach($_REQUEST as $key=>$value) {
    echo "$key = $value <br />";
}



?>