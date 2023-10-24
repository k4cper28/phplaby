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

                 function walidacja(){
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
                                          'options' => ['regexp' => '/^[a-ząęłńśćźżó -]{1,25}$/']]
                            ];


                    $dane = filter_input_array(INPUT_POST, $args);
                     //pokaż tablicę po przefiltrowaniu - sprawdź wyniki filtrowania:
                     var_dump($dane);

                     $errors = "";
                      foreach ($dane as $key => $val) {
                      if ($val === false or $val === NULL) {
                      $errors .= $key . " ";
                      }
                      }

                    if ($errors === "") {
                     dopliku("dane.txt", $dane);
                     } else {
                     echo "<br>Nie poprawnie dane: " . $errors;
                     }

                 }

                 function dopliku($nazwaPliku, $tablicaDanych) {
                  $dane = "";

                   foreach ($tablicaDanych as $wartosc) {
                       if(!is_array($wartosc)){
                            $dane .= $wartosc . " ";
                       }else{
                            $dane .=join(",",$wartosc) . " ";
                       }
                   }


                  $dane.=PHP_EOL;
                  echo "<p>Zapisano: <br /> $dane</p>";
                  file_put_contents($nazwaPliku, $dane, FILE_APPEND | LOCK_EX);

                 }

                 function dodaj(){
                        echo "<h3>Dodawanie do pliku:</h3>";
                        walidacja();
                 }

                function pokaz()
                {
                    $lines = file('dane.txt');

                    foreach ($lines as $line) {
                        echo "<br>" . $line;
                    }

//                     echo "\n\nElementy tablicy globalnej \$_SERVER:<br>";
//                     foreach ($_SERVER as $key => $value) {
//                         echo $key . " => " . $value . "<br>";
//                     }
                }

                function pokaz_zamowienie($tut){
                    if($tut == "PHP"){
                        $lines = file('dane.txt');
                        foreach ($lines as $line) {
                            if(strpos($line, $tut) !== false){
                                  echo "<br>" . $line;
                              }
                        }
                    }else if($tut == "CPP"){
                       $lines = file('dane.txt');
                       foreach ($lines as $line) {
                            if(strpos($line, $tut) !== false){
                            echo "<br>" . $line;
                            }
                       }
                    }else if($tut == "Java"){
                       $lines = file('dane.txt');
                       foreach ($lines as $line) {
                            if(strpos($line, $tut) !== false){
                            echo "<br>" . $line;
                            }
                       }
                    }
                }

                function statystyki(){

                $plik = "dane.txt";
                    $zamowienia = file($plik, FILE_IGNORE_NEW_LINES);
                    $liczbaWszystkichZamowien = count($zamowienia);
                    $liczbaZamowienPonizej18 = 0;
                    $liczbaZamowienPowyzej49 = 0;

                    foreach ($zamowienia as $linia) {
                        $elementy = explode(' ', $linia);
                        $wiek = (int)$elementy[1];
                        if ($wiek < 18) {
                            $liczbaZamowienPonizej18++;
                        } elseif ($wiek > 49) {
                            $liczbaZamowienPowyzej49++;
                        }
                    }

                    echo "<p>Liczba wszystkich zamówień: $liczbaWszystkichZamowien</p>";
                    echo "<p>Liczba zamówień od osób poniżej 18 lat: $liczbaZamowienPonizej18</p>";
                    echo "<p>Liczba zamówień od osób powyżej 49 lat: $liczbaZamowienPowyzej49</p>";

                }


            ?>