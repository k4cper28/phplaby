<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="odbierz.php" type="text/css" >
    <link rel="stylesheet" href="css/formularze.css" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Szybki kurs HTML </title>
</head>
<body>

<header> <h2>Szybki kurs HTML </h2> </header>
<main>
    <h3 id="center"> Przykładowy formularz HTML:</h3>
    <div id="form">
        <form action="odbierz3.php" method="post">

            <label>Nazwisko:<input type="text" name="nazw" title="Nazwisko" pattern="[a-zA-Z]*" required> </label><br >
            <label>Wiek:<input type="number" name="wiek" min="0" max="100" title="Wiek" required> </label> <br >
            <label>Państwo:<select name="panstwo">
                    <option> Polska </option>
                    <option> Niemcy </option>
                    <option> Anglia </option>
                    <option> USA </option>
                </select> </label><br>
            <label>Adres e-mail: <input type="email" name="email" placeholder="kacper@gmail.com" title="email" required>  </label><br>
            <label>Numer telefonu: <input type="text"    name="telefon" pattern="(?:\d{9})" placeholder="530047097" title="telefon" required> </label><br>
            <h4> Zamawiam tutorial z języka: </h4>
            <div class="check">
                <?php
                $jezyki = ["C", "CPP", "Java", "C#", "HTML", "CSS", "XML", "PHP", "JavaScript"];

                echo "<h4>Wybrane języki za pomocą pętli foreach:</h4>";

                foreach ($jezyki as $val){
                    echo "<label><input type=checkbox name=jezyk[] value=$val  title=php> $val</label>";
                }



                ?>
            </div>
            <h4> Sposób zapłaty: </h4>
            <label><input type="radio" name="zaplata" value="eurocard"  title="ex" required> eurocard</label>
            <label><input type="radio" name="zaplata" value="visa"  title="visa" required> visa</label>
            <label><input type="radio" name="zaplata" value="przelew bankowy" title="pb" required> przelew bankowy </label><br><br>
            <input type="submit" value="Wyślij" title="wyslij">
            <input type="reset" value="Wyczyść" title="wyczysc">

        </form>
    </div>
    </div>
    <footer> &copy;KŚ </footer>
</main>
</body>
</html>