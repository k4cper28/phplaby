<?php

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
        $this->date = $this->date->format('Y-m-d H:i:s');
        $this->status = self::STATUS_USER; // Ustawienie statusu na STATUS_USER
    }

    public function show()
    {
        echo $this->userName . " " . $this->fullName . " " . $this->email . " " . $this->status . " "
            . $this->date->format('Y-m-d') . "<br>";
    }

    public function show2()
    {
        echo 'Username: ' . $this->getUsername() . '<br>';
        echo 'FullName: ' . $this->getFullName() . '<br>';
        echo 'email: ' . $this->getEmail() . '<br>';
        echo 'Passwd: ' . $this->getPasswd() . '<br>';
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

    function saveDB($db)
    {

        $sql = "INSERT INTO users(id,userName,fullName,email,passwd,status,date) VALUES 
                 (:id,:user,:fullN,:mail,:pass,:state,:data)";

        $stmt = $db->prepare($sql);


        $stmt->execute(['id' => NULL,'user' => $this->userName,'fullN' => $this->fullName,'mail' => $this->email,
                        'pass'=> $this->passwd,'state'=> $this->status,'data'=>$this->date->format('Y-m-d H:i:s')]);

    }

    static function getAllUsersFromDB($db){

        $sql = "Select * from users";

        foreach ($stmt = $db ->query($sql) as $row)
        {
            echo "<br>";
            echo $row['userName'] . " " .$row['fullName'] . " " . $row['email'] . " " . $row['date'];
        }
    }


}