<?php

class BazaPDO
{
    private $dbh; //uchwyt do BD

    public function __construct($serwer, $user, $pass)
    {
        try {
            $this->dbh = new PDO($serwer, $user, $pass,
                [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    } //koniec funkcji konstruktora

    function __destruct()
    {
        $this->dbh = null;
    }

    public function select($sql)
    {
        //parametr $sql – łańcuch zapytania select
        foreach ($this->dbh->query($sql) as $row) {
            echo "<br>";
            echo $row['Nazwisko'] . " " .$row['Email'] . " " . $row['Zamowienie'];
        }
    }

    //koniec klasy BazaPDO

    public function insert($sql)
    {
        if ($this->dbh->query($sql)) return true; else return false;
    }

}
?>

}