<!DOCTYPE html>
<html>
<body>

<form method="post" action="">
    <p>Wybierz swoje ulubione języki programowania:</p>
    <?php
    $tech = ["C", "CPP", "Java", "C#", "Html", "CSS", "XML", "PHP", "JavaScript"];
    foreach ($tech as $language) {
        echo '<input type="checkbox" name="technologie[]" value="' . $language . '"> ' . $language . '<br>';
    }
    ?>
    <br>
    <input type="submit" value="Wyślij">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sprawdzenie, czy przesłano dane z formularza
    if (isset($_POST['technologie'])) {
     // Przechowanie wybranych technologii z formularza
        $wybraneTechnologie = $_POST['technologie'];
        $plik = "ankieta.txt";
        // Odczytanie istniejących danych z pliku
        $lines = file($plik, FILE_IGNORE_NEW_LINES);
        $wyniki = [];

   // Przetworzenie istniejących danych na tablicę asocjacyjną
        foreach ($lines as $line) {
            $parts = explode(' - ', $line);
            $wyniki[$parts[0]] = $parts[1];
        }

 // Zaktualizowanie liczników dla nowych danych
        foreach ($wybraneTechnologie as $technologia) {
            if (array_key_exists($technologia, $wyniki)) {
                $wyniki[$technologia] = (int)$wyniki[$technologia] + 1;
            } else {
                $wyniki[$technologia] = 1;
            }
        }
 // Nadpisanie pliku z nowymi danymi
        file_put_contents($plik, "");
        foreach ($wyniki as $key => $value) {
            file_put_contents($plik, $key . ' - ' . $value . PHP_EOL, FILE_APPEND | LOCK_EX);
        }

//wyswietlanie
        echo "<h2>Wyniki ankiety:</h2>";
        foreach ($wyniki as $key => $value) {
            echo "$key - $value <br>";
        }
    }
}
?>

</body>
</html>