<?php

namespace lab5;

use Couchbase\ValueRecorder;

class RegistrationForm
{
    protected $user;

    // Konstruktor klasy bezparametrowy
    public function __construct() {
        $this->user = new User("", "", "", "");
        $this ->showForm();
    }

    // Metoda wyświetlająca formularz rejestracyjny
    public function showForm() {
        echo "
        <form action='' method='post'>
        <table><tr>
            <td>Nazwa użytkownika:</td> <td><input type='text' name='username'></td>
            </tr>
            <tr>
            <td>Hasło:</td> <td><input type='password' name='password'></td>
            </tr>
            <tr>
            <td>Imię i nazwisko:</td> <td><input type='text' name='fullName'></td>
            <tr>
            </tr>
            <td>Adres e-mail:</td> <td><input type='text' name='email'></td>
            <tr>
            </tr>
        </table>
        <input type='submit' value='Zarejestruj' name = 'submit'>
        </form>";
    }

    // Metoda sprawdzająca poprawność danych użytkownika
    public function checkUser() {

        $args = [
            'username' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[0-9A-Za-ząęłńśćźżó_-]{2,25}$/']],
            'password'  =>    ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[0-9A-Za-ząęłńśćźżó_-]{2,25}$/']],
            'fullName' =>   ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[A-Z]{1}[a-ząęłńśćźżó_]{1,25}[ ]{1}[A-Z]{1}[a-ząęłńśćźżó_]{1,25}$/']],
            'email'  =>     ['filter' => FILTER_VALIDATE_EMAIL]
            ];


        $dane = filter_input_array(INPUT_POST, $args);


        $errors = "";
        foreach ($dane as $key => $val) {
            if ($val === false or $val === NULL) {
                $errors .= $key . " ";
            }
        }

        if ($errors === "") {
            $this->user = new User($dane['username' ], $dane['fullName'], $dane['email'], $dane['password']);
        } else {
            echo "<br>Nie poprawnie dane: " . $errors;
            return NULL;
        }

        return $this->user;

    }

}