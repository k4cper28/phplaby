
<?php

include_once "klasy/Baza.php";
include_once "klasy/User.php";

class UserManager {

 function loginForm() {
 ?>
 <h3>Formularz logowania</h3><p>
 <form action="processLogin.php" method="post">
         <table>
             <tr>
                 <td>Username:</td>
                 <td><input type="text" name="username" required></td>
             </tr>
             <tr>
                 <td>Password:</td>
                 <td><input type="password" name="password" required></td>
             </tr>
             <tr>
                 <td colspan="2"> <input type="submit" value="zaloguj" name="zaloguj" /></td>
             </tr>
         </table>
 </form></p> <?php
 }


 function login($db) {
 //funkcja sprawdza poprawność logowania
 //wynik - id użytkownika zalogowanego lub -1
 $args = [
 'username' => FILTER_SANITIZE_ADD_SLASHES,
 'password' => FILTER_SANITIZE_ADD_SLASHES
 ];
 //przefiltruj dane z GET (lub z POST) zgodnie z ustawionymi
 //w $args filtrami:
 $dane = filter_input_array(INPUT_POST, $args);
 //var_dump($dane);
 //sprawdź czy użytkownik o loginie istnieje w tabeli users
 //i czy podane hasło jest poprawne
 $login = $dane["username"];
 $passwd = $dane["password"];

 $userId = $db->selectUser($login, $passwd, "users");
     if ($userId >= 0) {
         // Poprawne dane

         // Rozpocznij sesję zalogowanego użytkownika
         session_start();
         session_regenerate_id();

         // Usuń wszystkie wpisy historyczne dla użytkownika o $userId
         $db->delete("logged_in_users", "userId  = '$userId'");

         // Ustaw datę - format("Y-m-d H:i:s")
         $date = date("Y-m-d H:i:s");

         // Pobierz id sesji
         $sessionId = session_id();

         // Dodaj wpis do tabeli logged_in_users
         $_SESSION['user_id'] = $userId;
         $_SESSION['sessionId'] = $sessionId;

         $sql = "INSERT INTO logged_in_users (sessionId, userId, lastUpdate) VALUES ('$sessionId', $userId, '$date')";
         $db -> insert($sql);


         return $userId; // Zwróć id zalogowanego użytkownika
     } else {
         // Błędne dane
         return -1;
     }
 }
 function logout($db) {
 //pobierz id bieżącej sesji (pamiętaj o session_start()
     session_start();
     $sessionId = session_id();
     session_unset();
     session_destroy();
     $db->delete("logged_in_users", "sessionId  = '$sessionId'");
 }

 function getLoggedInUser($db, $sessionId) {

 // Sprawdź, czy istnieje wpis w tabeli logged_in_users dla podanego id sesji
        $sql = "SELECT userId FROM logged_in_users WHERE sessionId = '$sessionId'";
     $result = mysqli_query($db->getMysqli(), $sql);

     if ($result === false) {
         die("Błąd zapytania SQL: " . $db->getError());
     }

     if ($result->num_rows > 0) {
         $row = $result->fetch_assoc();
         return $row['userId'];
     } else {
         return -1;
     }
    }

}
