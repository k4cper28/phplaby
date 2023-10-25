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

    public function __construct($userName, $fullName, $email, $passwd) {
        $this->userName = $userName;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->passwd = password_hash($passwd, PASSWORD_DEFAULT); // Zahashowanie hasła
        $this->date = new DateTime(); // Bieżąca data i czas
        $this->status = self::STATUS_USER; // Ustawienie statusu na STATUS_USER
    }

    public function show() {
        echo  $this->userName . " " . $this->fullName . " " . $this->email . " "  . $this->status . " "
         . $this->date->format('Y-m-d') . "<br>";
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function setPasswd($passwd) {
        $this->passwd = password_hash($passwd, PASSWORD_DEFAULT);
    }

    public function getPasswd() {
        return $this->passwd;
    }

    public function setFullName($fullName) {
        $this->fullName = $fullName;
    }

    public function getFullName() {
        return $this->fullName;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDate() {
        return $this->date;
    }

    public function getStatus() {
        return $this->status;
    }


    public function setStatus($status)
    {
        $this->status = $status;
    }



}