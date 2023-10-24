<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Szybki kurs HTML </title>
</head>
<body>

<header> <h2>Szybki kurs HTML </h2> </header>
<main>
    <h3 id="center"> Przykładowy formularz HTML:</h3>
    <div id="form">
        <form action="pliki.php" method="post">

            <label>Nazwisko:<input type="text" name="nazw" title="Nazwisko" pattern="[a-zA-Z]*"  > </label><br >
            <label>Wiek:<input type="number" name="wiek" min="0" max="100" title="Wiek" > </label> <br >
            <label>Państwo:<select name="panstwo">
                    <option></option>
                    <option> Polska </option>
                    <option> Niemcy </option>
                    <option> Anglia </option>
                    <option> Usa </option>
                </select> </label><br>
            <label>Adres e-mail: <input type="email" name="email" placeholder="kacper@gmail.com" title="email" >  </label><br>
            <label>Numer telefonu: <input type="text"    name="telefon" pattern="(?:\d{9})" placeholder="530047097" title="telefon" > </label><br>
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
            <label><input type="radio" name="zaplata" value="eurocard"  title="ex" > eurocard</label>
            <label><input type="radio" name="zaplata" value="visa"  title="visa" > visa</label>
            <label><input type="radio" name="zaplata" value="przelew bankowy" title="pb" > przelew bankowy </label><br><br>
            <input type="submit" name="submit" value="zapisz" title="zapisz" >
            <input type="reset" value="wyczysc" title="wyczysc">
            <input type="submit"  name="submit"value="pokaz" title="pokaz">
            <input type="submit"  name="submit"value="php" title="php">
            <input type="submit" name="submit" value="cpp" title="cpp">
            <input type="submit" name="submit" value="java" title="java">
            <input type="submit" name="submit" value="statystki" title="statystki">

            <?php
                include_once "funkcje.php";


              if(filter_input(INPUT_POST, "submit")){
                  $akcja = filter_input(INPUT_POST, "submit");
                  switch ($akcja){
                      case "zapisz":  dodaj(); break;
                      case "pokaz":   pokaz(); break;
                      case "php":     pokaz_zamowienie("PHP"); break;
                      case "cpp":     pokaz_zamowienie("CPP"); break;
                      case "java":    pokaz_zamowienie("Java"); break;
                      case "statystki": statystyki(); break;
                  }

              }

            ?>
        </form>
    </div>
    </div>
</main>
</body>
</html>