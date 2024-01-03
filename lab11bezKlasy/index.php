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
                <h2>Katedra Informatyki</h2>
                <h4>WEiI Politechnika Lubelska <br/>
                    ul. Nadbystrzycka 36b, 20-618 Lublin<br />
                    tel. +48 815252046<br /></h4>
                <h3>Laboratorium PAI - tworzenie modułowego serwisu WWW.</h3>
            </div>
        </div>
    </div>
    <div id="stopka"> &copy; KS</div>
    <div id="skrypty">
    <script src='js/skrypty.js'></script>
    </div>
    </body>
</html>