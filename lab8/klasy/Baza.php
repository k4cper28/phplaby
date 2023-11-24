<?php

class Baza
{
    private $mysqli; //uchwyt do BD

    public function __construct($serwer, $user, $pass, $baza)
    {
        $this->mysqli = new mysqli($serwer, $user, $pass, $baza);
        /* sprawdz połączenie */
        if ($this->mysqli->connect_errno) {
            printf("Nie udało sie połączenie z serwerem: %s\n",
                $this->mysqli->connect_error);
            exit();
        }
        /* zmien kodowanie na utf8 */
        if ($this->mysqli->set_charset("utf8")) {
            //udało sie zmienić kodowanie
        }
    } //koniec funkcji konstruktora

    function __destruct()
    {
        $this->mysqli->close();
    }


    public function delete($table, $condition)
    {
        $sql = "DELETE FROM $table WHERE $condition";
        if ($this->mysqli->query($sql)) {
            return true; // Zwróć true jeśli zapytanie SQL zostało wykonane pomyślnie
        } else {
            return false; // Zwróć false jeśli wystąpił błąd w wykonaniu zapytania SQL
        }
    }

    public function insert($sql)
    {
        if ($this->mysqli->query($sql)) return true; else return false;
    }

    public function getMysqli()
    {
        return $this->mysqli;
    }

    public function selectUser($login, $passwd, $tabela) {
        //parametry $login, $passwd , $tabela – nazwa tabeli z użytkownikami
        //wynik – id użytkownika lub -1 jeśli dane logowania nie są poprawne
        $id = -1;
        $sql = "SELECT * FROM $tabela WHERE userName='$login'";
        if ($result = $this->mysqli->query($sql)) {
            $ile = $result->num_rows;
            if ($ile == 1) {
                $row = $result->fetch_object(); //pobierz rekord z użytkownikiem
 $hash = $row->passwd; //pobierz zahaszowane hasło użytkownika
 //sprawdź czy pobrane hasło pasuje do tego z tabeli bazy danych:
 if (password_verify($passwd, $hash))
     $id = $row->id; //jeśli hasła się zgadzają - pobierz id
 //użytkownika
 }
        }
        return $id; //id zalogowanego użytkownika(>0) lub -1
    }

} //koniec klasy Baza