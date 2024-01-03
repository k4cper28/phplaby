
<?php

foreach($_REQUEST as $key=>$value) {
    if (!is_array($value)) {
        echo "$key = $value <br />";
    } else {
        echo "$key = " . join(",", $value) . "<br />";
    }
}

var_dump($_REQUEST);

?>