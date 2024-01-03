<div>
    <table><tr>
            <td>Nazwisko:</td> <td><input type="text" name="nazw" title="Nazwisko" pattern="[a-zA-Z]*" id="Nazwisko"></td>
        </tr>
        <tr>
            <td>Wiek:</td> <td><input type="number" name="wiek" min="0" max="100" title="Wiek" id="Wiek" ></td>
        </tr>
        <tr>
            <td>Panstwo:</td> <td><select name="panstwo">
                    <option></option>
                    <option> Polska </option>
                    <option> Niemcy </option>
                    <option> Anglia </option>
                    <option> Usa </option>
                </select> </label></td>
        <tr>
        </tr>
        <td>Adres e-mail:</td> <td><input type="email" name="email" placeholder="kacper@gmail.com" title="email" ></td>
        <tr>
        </tr>
    </table>

    <h4> Zamawiam tutorial z języka: </h4>
    <div class="check">
        <label><input type=checkbox name=jezyk[] value=PHP title=PHP> PHP</label>
        <label><input type=checkbox name=jezyk[] value=C title=C> C</label>
        <label><input type=checkbox name=jezyk[] value=Java  title=Java> Java</label>
        <h4> Sposób zapłaty: </h4>
        <label><input type="radio" name="zaplata" value="Master Card"  title="ex" >Master Card</label>
        <label><input type="radio" name="zaplata" value="Visa"  title="visa" > visa</label>
        <label><input type="radio" name="zaplata" value="Przelew" title="p" > przelew bankowy </label><br><br>
    </div>
    <?php
        $przyciski = array( "Pokaz" => "pokaz",
        "Dodaj" => "dodaj");

    foreach($przyciski as $nazwa => $id){
        echo " <button id='$id'> $nazwa </button>";
    }
    ?>
