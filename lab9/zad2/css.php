<!--<form action="css.php" method="post">-->
<!--    <textarea name="tekst"></textarea><br />-->
<!--    <input type="submit" name="wyslij" value="Wyślij" />-->
<!--</form>-->
<!--<div>-->
<!--    --><?php
//    if (filter_input(INPUT_POST,'wyslij'))
//        echo $_POST['tekst'];
//    ?>
<!--</div>-->

<!--Plik css.php -->
<!--<form action="css.php" method="post">-->
<!--    <textarea name="tekst"></textarea><br />-->
<!--    <input type="submit" name="wyslij" value="Wyślij" />-->
<!--</form>-->
<!--<div>-->
<!--    --><?php
//    if (filter_input(INPUT_POST, 'wyslij')) {
//        echo htmlspecialchars($_POST['tekst']);
//    }
//    ?>
<!--</div>-->

<!-- Plik css.php -->
<form action="css.php" method="post">
    <textarea name="tekst"></textarea><br />
    <input type="submit" name="wyslij" value="Wyślij" />
</form>
<div>
    <?php
    $tekst = filter_input(INPUT_POST, 'tekst', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if ($tekst) {
        echo $tekst;
    }
    ?>
</div>