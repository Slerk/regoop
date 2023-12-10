<?php

session_start();
//include "SignUpController.php";

class AuthClass extends  LogInController
{


    private $login;
    private $password;


    public function __construct($login,$password){

        $this->login = $login;
        $this->password = $password;


    }


    public function LoginUser(){

        $error = '';

        if ($this->emptyInput() === false){
            header("location: ../forms/regForm.php?error=emptyinput");
            exit();
        }


        $this->getUser($this->login,$this->password);

    }

    private function emptyInput(){

        $result;
        if (empty($this->login) || empty($this->password)){
            $result = false;
        }else{
            $result = true;

        }
        return $result;

    }

}