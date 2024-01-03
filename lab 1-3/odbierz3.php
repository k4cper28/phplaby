<!DOCTYPE html>
<html>
<head>
    <title>Dane z formularza</title>
</head>
<body>
<?php
if(isset($_REQUEST['jezyk'])) {
    // a) Użycie pętli foreach
    echo "<h2>Wybrane kursy za pomocą pętli foreach:</h2>";
    foreach ($_REQUEST['jezyk'] as $wybranyKurs) {
        echo $wybranyKurs . ",";
    }

    // b) Użycie funkcji join() lub implode()
    echo "<h2>Wybrane kursy za pomocą funkcji join():</h2>";
    echo join(", ", $_REQUEST['jezyk']);
} else {
    echo "Nie wybrano żadnych kursów.";
}

echo "<h2>Wszystkie parametry tablicy \$_REQUEST:</h2>";
foreach ($_REQUEST as $key => $value) {
    if (is_array($value)) {
        echo $key . ": " . implode(", ", $value) . "<br>";
    } else {
        echo $key . ": " . $value . "<br>";
    }
}
?>
</body>
</html>