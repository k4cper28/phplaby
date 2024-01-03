<?php
//wykorzystaj lekko zmodyfikowane wcześniej tworzone funkcje
//pomocnicza funkcja generująca formularz:
function drukuj_form()
{
    $zawartosc = ' <div id="tresc">
        <form action = "?strona=formularz" method = "POST" >
        <table><tr>
            <td>Nazwisko:</td> <td><input type="text" name="nazw" title="Nazwisko" pattern="[a-zA-Z]*"></td>
            </tr>
            <tr>
            <td>Wiek:</td> <td><input type="number" name="wiek" min="0" max="100" title="Wiek" ></td>
            </tr>
            <tr>
            <td>Panstwo:</td> <td><select name="panstwo">
                    <option></option>
                    <option> Polska </option>
                    <option> Niemcy </option>
                    <option> Anglia </option>
                    <option> Usa </option>
                </select> </label></td>
            <tr>
            </tr>
            <td>Adres e-mail:</td> <td><input type="email" name="email" placeholder="kacper@gmail.com" title="email" ></td>
            <tr>
            </tr>
        </table>
       
        <h4> Zamawiam tutorial z języka: </h4>
            <div class="check">

                <label><input type=checkbox name=jezyk[] value=PHP title=PHP> PHP</label>
                <label><input type=checkbox name=jezyk[] value=C title=C> C</label>
                <label><input type=checkbox name=jezyk[] value=Java  title=Java> Java</label>
                <h4> Sposób zapłaty: </h4>
            <label><input type="radio" name="zaplata" value="Master Card"  title="ex" >Master Card</label>
            <label><input type="radio" name="zaplata" value="Visa"  title="visa" > visa</label>
            <label><input type="radio" name="zaplata" value="Przelew" title="p" > przelew bankowy </label><br><br>
            <input type="submit" name="submit" value="zapisz" title="zapisz" >
            <input type="reset" value="wyczysc" title="wyczysc">
            <input type="submit"  name="submit"value="pokaz" title="pokaz"> 
            </div>
        </form >
        </div > ';

    return $zawartosc;
}
function walidacja() {
    $args = ['nazw' => ['filter' => FILTER_VALIDATE_REGEXP,
        'options' => ['regexp' => '/^[A-Z]{1}[a-ząęłńśćźżó-]{1,25}$/']],
        'wiek' => ['filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[0-9]{1}[1-9]{1}$/']],
        'panstwo' => ['filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[A-Z]{1}[a-ząęłńśćźżó-]{1,25}$/']],
        'email' => ['filter' => FILTER_VALIDATE_EMAIL],
        'jezyk' => ['filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'flags' => FILTER_REQUIRE_ARRAY],
        'zaplata' => ['filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[A-Z-a-ząęłńśćźżó -]{1,25}$/']]
    ];


    $dane = filter_input_array(INPUT_POST, $args);

    $errors = "";
    foreach ($dane as $key => $val) {
        if ($val === false or $val === NULL) {
            $errors .= $key . " ";
        }
    }

    if($errors === ""){
        $sql =  "INSERT INTO klienci VALUES (NULL,'" . $dane['nazw'] ."', '" . $dane['wiek'] . "', '" . $dane['panstwo']
            . "', '" . $dane['email'] . "', '" . join(",", $dane['jezyk']) . "', '" . $dane['zaplata'] . "')";
        return $sql;
    }else{
        return "blad";
    }

}
function dodajdoBD($bd) {
    if (walidacja() != "blad") {
        $bd -> insert(walidacja());
        return 'poprawnie zapisano do bazy';
    } else {
        return 'zle dane';
    }
}
//uchwyt do bazy klienci:
include_once "klasy/Baza.php";
$tytul = "Formularz zamowienia";
$zawartosc = drukuj_form();
$bd = new Baza("localhost", "root", "", "klienci");
if (filter_input(INPUT_POST, "submit")) {
    $akcja = filter_input(INPUT_POST, "submit");
    switch ($akcja) {
        case "zapisz" : $zawartosc.= dodajdoBD($bd);
            break;
        case "pokaz" : $zawartosc.= $bd->select("select * from klienci", ["Email", "Zamowienie"]);
            break;
    }
}