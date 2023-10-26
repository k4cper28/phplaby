<?php

namespace lab5;

use DateTime;

class User
{
    private $userName;
    private $passwd;
    private $fullName;
    private $email;
    private $date;
    private $status;

    const STATUS_ADMIN = 1;
    const STATUS_USER = 2;

    public function __construct($userName, $fullName, $email, $passwd)
    {
        $this->userName = $userName;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->passwd = password_hash($passwd, PASSWORD_DEFAULT); // Zahashowanie hasła
        $this->date = new DateTime(); // Bieżąca data i czas
        $this->status = self::STATUS_USER; // Ustawienie statusu na STATUS_USER
    }

    public function show()
    {
        echo $this->userName . " " . $this->fullName . " " . $this->email . " " . $this->status . " "
            . $this->date->format('Y-m-d') . "<br>";
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setPasswd($passwd)
    {
        $this->passwd = password_hash($passwd, PASSWORD_DEFAULT);
    }

    public function getPasswd()
    {
        return $this->passwd;
    }

    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    public function getFullName()
    {
        return $this->fullName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getStatus()
    {
        return $this->status;
    }


    public function setStatus($status)
    {
        $this->status = $status;
    }


    static function getAllUsers($plik)
    {
        $tab = json_decode(file_get_contents($plik));
        //var_dump($tab);
        foreach ($tab as $val) {
            echo "<p>" . $val->userName . " " . $val->fullName . " " . $val->date . "</p>";
        }
    }


    function toArray()
    {
        $arr = [
            "userName" => $this->userName,
            "passwd" => $this->passwd,
            "fullName" => $this->fullName,
            "email" => $this->email,
            "date" => $this->date->format('Y-m-d'),
            "status" => $this->status
        ];

        return $arr;
    }


    function save($plik)
    {
        $tab = json_decode(file_get_contents($plik), true);
        array_push($tab, $this->toArray());
        file_put_contents($plik, json_encode($tab));
    }


    function saveXML()
    {
        $xml = simplexml_load_file('users.xml');
        //dodajemy nowy element user (jako child)
        $xmlCopy = $xml->addChild("user");
        //do elementu dodajemy jego właściwości o określonej nazwie i treści
        $xmlCopy->addChild("userName", $this->userName);
        $xmlCopy->addChild("passwd", $this->passwd);
        $xmlCopy->addChild("fullName", $this->fullName);
        $xmlCopy->addChild("email", $this->email);
        $xmlCopy->addChild("data", $this->date->format('Y-m-d'));
        $xmlCopy->addChild("status", $this->status);
        //zapisujemy zmodyfikowany XML do pliku:
        $xml->asXML('users.xml');

    }


    static function getAllUsersFromXml()
    {

        $allUsers = simplexml_load_file('users.xml');
        echo "<ul>";
        foreach ($allUsers as $user):
        $userName = $user->userName;
        $date = $user->data;
        $fullName = $user -> fullName;
        echo "<li>$userName $fullName  $date</li>";
        endforeach;
        echo "</ul>";
}

}