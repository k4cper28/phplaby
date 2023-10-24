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
    if (isset($_POST['technologie'])) {
        $wybraneTechnologie = $_POST['technologie'];
        $plik = "ankieta.txt";
        $lines = file($plik, FILE_IGNORE_NEW_LINES);
        $wyniki = [];

        foreach ($lines as $line) {
            $parts = explode(' - ', $line);
            $wyniki[$parts[0]] = $parts[1];
        }

        foreach ($wybraneTechnologie as $technologia) {
            if (array_key_exists($technologia, $wyniki)) {
                $wyniki[$technologia] = (int)$wyniki[$technologia] + 1;
            } else {
                $wyniki[$technologia] = 1;
            }
        }

        file_put_contents($plik, "");
        foreach ($wyniki as $key => $value) {
            file_put_contents($plik, $key . ' - ' . $value . PHP_EOL, FILE_APPEND | LOCK_EX);
        }

        echo "<h2>Wyniki ankiety:</h2>";
        foreach ($wyniki as $key => $value) {
            echo "$key - $value <br>";
        }
    }
}
?>

</body>
</html>