<?php

    echo "<h2>Dane odebrane z formularza</h2>";

    echo "Wybrano tutoriale:";

if(isset($_REQUEST['jezyk'])) {
    foreach ($_REQUEST['jezyk'] as $wybranyKurs) {
        echo $wybranyKurs . ",";
    }}else {
        echo "Nie wybrano żadnych kursów.<br>" ;
    }

if (isset($_REQUEST['zaplata'])) {

    echo "<br>wybrane zaplata: " . $_REQUEST['zaplata'] . " <br/><br>";
}
else echo "Nie wybrano zaplaty <br />";




?>