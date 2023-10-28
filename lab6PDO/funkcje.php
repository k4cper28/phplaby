<?php

function dodajdoBDPDO($pdo)
{
    $args = ['nazw' => ['filter' => FILTER_VALIDATE_REGEXP,
        'options' => ['regexp' => '/^[A-Z]{1}[a-ząęłńśćźżó-]{1,25}$/']],
        'wiek' => ['filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[0-9]{1}[1-9]{1}$/']],
        'panstwo' => ['filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[A-Z]{1}[a-ząęłńśćźżó-]{1,25}$/']],
        'email' => ['filter' => FILTER_VALIDATE_EMAIL],
        'telefon' => ['filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[0-9]{9}$/']],
        'jezyk' => ['filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'flags' => FILTER_REQUIRE_ARRAY],
        'zaplata' => ['filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[A-Z-a-ząęłńśćźżó -]{1,25}$/']]
    ];


    $dane = filter_input_array(INPUT_POST, $args);
    //pokaż tablicę po przefiltrowaniu - sprawdź wyniki filtrowania:
    //var_dump($dane);

    $errors = "";
    foreach ($dane as $key => $val) {
        if ($val === false or $val === NULL) {
            $errors .= $key . " ";
        }
    }

    if ($errors === "") {


        $sql = "INSERT INTO klienci (Id,Nazwisko, Wiek, Panstwo, Email, Zamowienie, Platnosc) VALUES (:id, :nazwisko, 
                :wiek , :panstwo, :email, :jezyk,:zaplata)";


        $stmt = $pdo ->prepare($sql);

        $jezyk = join(",", $dane['jezyk']);

        $stmt->execute(['id' => NULL, 'nazwisko' => $dane['nazw'], 'wiek' => $dane['wiek'], 'panstwo' => $dane['panstwo'],
            'email' => $dane['email'], 'jezyk' => $jezyk, 'zaplata' => $dane['zaplata']]);

        echo "<br>Dodano nowego klienta";

    } else {
        echo "<br>Nie poprawnie dane: " . $errors;
    }

}


function statystyka($pdo){

    foreach ($stmt = $pdo ->query("SELECT COUNT(*) AS wszystkie_zamowienia FROM klienci") as $row)
    {
        echo "<br>wszystkie osoby: ". $row['wszystkie_zamowienia'];
    }

    foreach ($stmt = $pdo ->query("SELECT COUNT(*) AS wszystkie_zamowienia FROM klienci WHERE `Wiek` < 18") as $row)
    {
        echo "<br>wszystkie osoby poniezej 18 lat: ". $row['wszystkie_zamowienia'];
    }

    foreach ($stmt = $pdo ->query("SELECT COUNT(*) AS wszystkie_zamowienia FROM klienci WHERE `Wiek` > 49") as $row)
    {
        echo "<br>wszystkie osoby powyzej 49 lat: ". $row['wszystkie_zamowienia'];
    }
}

function select($sql,$pdo) {
    //parametr $sql – łańcuch zapytania select
    foreach ($stmt = $pdo ->query($sql) as $row)
    {
        echo "<br>";
        echo $row['Nazwisko'] . " " .$row['Email'] . " " . $row['Zamowienie'];
    }
}


?>