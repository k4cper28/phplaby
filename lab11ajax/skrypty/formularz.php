<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <title>Informacje kontaktowe</title></head>
<body>
<div id='tresc'>
    <div id='nag'>
        <img src='zdjecia/foto.jpg' alt='foto'/></div>
    <div id='menu'>
        <div id='nav'>
            <?php
            $przyciski = array("Kontakt" => "index",
                "Galeria" => "galeria", "Formularz" => "formularz",
                "O nas" => "onas");

            foreach ($przyciski as $nazwa => $id) {
                echo " <button id='$id'> $nazwa </button>";
            }
            ?>

        </div>
        <div id='main'>
            <div id="form">
                <table>
                    <tr>
                        <td>Nazwisko:</td>
                        <td><input type="text" name="nazw" title="Nazwisko" pattern="[a-zA-Z]*" id="Nazwisko"></td>
                    </tr>
                    <tr>
                        <td>Wiek:</td>
                        <td><input type="number" name="wiek" min="0" max="100" title="Wiek" id="Wiek"></td>
                    </tr>
                    <tr>
                        <td>Panstwo:</td>
                        <td>
                            <select name="panstwo" id="Panstwo">
                                <option></option>
                                <option>Polska</option>
                                <option>Niemcy</option>
                                <option>Anglia</option>
                                <option>Usa</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Adres e-mail:</td>
                        <td><input type="email" name="email" placeholder="kacper@gmail.com" title="email" id="Email"></td>
                    </tr>
                </table>

                <h4> Zamawiam tutorial z języka: </h4>
                <div class="check">
                    <label><input type="checkbox" name="jezyk[]" value="PHP" title="PHP" id="Jezyk"> PHP</label>
                    <label><input type="checkbox" name="jezyk[]" value="C" title="C" > C</label>
                    <label><input type="checkbox" name="jezyk[]" value="Java" title="Java"> Java</label>
                </div>
                <h4> Sposób zapłaty: </h4>
                <div class="check">
                    <label><input type="radio" name="zaplata" value="Master Card" title="ex" checked> Master Card</label>
                    <label><input type="radio" name="zaplata" value="Visa" title="visa"> Visa</label>
                    <label><input type="radio" name="zaplata" value="Przelew" title="p"> Przelew bankowy</label><br><br>
                </div>
                <div id="guziki">
                <?php
                $przyciski = array("Pokaz" => "pokaz", "Dodaj" => "dodaj");

                foreach ($przyciski as $nazwa => $id) {
                    echo "<button id='$id'> $nazwa </button>";
                }
                ?>
                </div>
            </div>
            <div id="odpowiedz">
            </div>
        </div>
    </div>
</div>
<div id="stopka"> &copy; KS</div>
<div id="skrypty">
    <script src='js/skrypty.js'></script>
    <script src="js/skryptyFormularz.js"></script>
</div>
</body>
</html>