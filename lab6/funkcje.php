<?php

//                 function dodaj(){
//
//                     $zapis = "";
//                     $plik = fopen('wyslij.txt','a');
//
// //                     if (isset($_REQUEST["nazw"])  && ($_REQUEST['nazw']!="")) {
// //                         $zapis .= htmlspecialchars($_REQUEST['nazw'])." ";
// //                     }
// //                     if (isset($_REQUEST["wiek"]) && ($_REQUEST['wiek']!="")) {
// //                         $zapis .= htmlspecialchars($_REQUEST['wiek'])." ";
// //                     }
// //                     if (isset($_REQUEST["panstwo"]) && ($_REQUEST['panstwo']!="")) {
// //                         $zapis .= htmlspecialchars($_REQUEST['panstwo'])." ";
// //                     }
// //                     if (isset($_REQUEST["email"]) && ($_REQUEST['email']!="")) {
// //                         $zapis .= htmlspecialchars($_REQUEST['email'])." ";
// //                     }
// //                     if (isset($_REQUEST["telefon"]) && ($_REQUEST['telefon']!="")) {
// //                         $zapis .= htmlspecialchars($_REQUEST['telefon'])." ";
// //                     }
// //                      if (isset($_REQUEST['jezyk'])  && ($_REQUEST['jezyk']!="")) {
// //
// //                         $zapis .= join(",", $_REQUEST['jezyk']);
// //
// //                      }
// //
// //                     if (isset($_REQUEST["zaplata"]) && ($_REQUEST['zaplata']!="")) {
// //                         $zapis .= htmlspecialchars(" " . $_REQUEST['zaplata'])." ";
// //                     }
//
//                     $zapis .= filter_input(INPUT_POST ,'nazw') . " ";
//                     $zapis .= filter_input(INPUT_POST ,'wiek') . " ";
//                     $zapis .= filter_input(INPUT_POST ,'email') . " ";
//                     $zapis .= filter_input(INPUT_POST ,'panstwo') . " ";
//                     $zapis .= filter_input(INPUT_POST ,'telefon') . " ";
//                     $zapis .= join(",", $_REQUEST['jezyk']);
//                     $zapis .=  " " . filter_input(INPUT_POST ,'zaplata');
//
//
//                      if($zapis !== ""){
//                             $zapis .= "\n";
//                             fwrite($plik, $zapis);
//                         }
//
//                 }


function dodajdoBD($bd)
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
        $sql =  "INSERT INTO klienci VALUES (NULL,'" . $dane['nazw'] ."', '" . $dane['wiek'] . "', '" . $dane['panstwo']
        . "', '" . $dane['email'] . "', '" . join(",", $dane['jezyk']) . "', '" . $dane['zaplata'] . "')";
        $bd -> insert($sql);
    } else {
        echo "<br>Nie poprawnie dane: " . $errors;
    }

}


function statystyka($bd){

    echo "<table><tr><td>wszystkie osoby: </td><td>". $bd->select("SELECT COUNT(*) AS wszystkie_zamowienia FROM klienci", ["wszystkie_zamowienia"]) . "</td></tr>";
    echo "<tr><td>Liczba zamowien dla osob ponizej 18: </td><td>" .  $bd->select("SELECT COUNT(*) AS wszystkie_zamowienia FROM klienci WHERE `Wiek` < 18", ["wszystkie_zamowienia"]) . "</td></tr>";
    echo "<tr><td>Liczba zamowien dla osob powyzej 49: </td><td>" .  $bd->select("SELECT COUNT(*) AS wszystkie_zamowienia FROM klienci WHERE `Wiek` > 49", ["wszystkie_zamowienia"]) . "</td></tr></table>";
}

?>