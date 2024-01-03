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

    public function executeQuery($sql)
    {
        return $this->mysqli->query($sql);
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

    public function select($sql, $pola)
    {
        $tresc = "";
        if ($result = $this->mysqli->query($sql)) {
            $ilepol = count($pola); //ile pól
            $ile = $result->num_rows; //ile wierszy
            // pętla po wyniku zapytania $results
            $tresc .= "<table><tbody>";
            while ($row = $result->fetch_object()) {
                $tresc .= "<tr>";
                for ($i = 0; $i < $ilepol; $i++) {
                    $p = $pola[$i];
                    $tresc .= "<td>" . $row->$p . "</td>";
                }
                $tresc .= "</tr>";
            }
            $tresc .= "</table></tbody>";
            $result->close(); /* zwolnij pamięć */
        }
        return $tresc;
    }


}//koniec klasy Baza