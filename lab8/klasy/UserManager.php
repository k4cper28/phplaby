
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

         // Usuń wszystkie wpisy historyczne dla użytkownika o $userId
         $db->delete("logged_in_users", "userId  = '$userId'");

         // Ustaw datę - format("Y-m-d H:i:s")
         $date = date("Y-m-d H:i:s");

         // Pobierz id sesji
         $sessionId = session_id();

         // Dodaj wpis do tabeli logged_in_users

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
     session_destroy();
     $db->delete("logged_in_users", "sessionId  = '$sessionId'");
 }
 function getLoggedInUser($db, $sessionId) {
 // Sprawdź, czy istnieje wpis w tabeli logged_in_users dla podanego id sesji
        $sql = "SELECT user_id FROM logged_in_users WHERE session_id = '$sessionId'";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            // Jeśli istnieje wpis, zwróć id zalogowanego użytkownika
            $row = $result->fetch_assoc();
            return $row['user_id'];
        } else {
            // Jeśli nie istnieje wpis, zwróć -1
            return -1;
        }
    }

}
