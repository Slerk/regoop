<?php
session_start();
//include "SignUpController.php";

class RegistrUser extends  SignUpController
{


    private $login;
    private $email;
    private $password;


    public function __construct($login,$email,$password){

        $this->login = $login;
        $this->email = $email;
        $this->password = $password;


    }


    public function signupUser(){

        $error = '';

        if ($this->emptyInput() === false){
            header("location: ../forms/regForm.php?error=emptyinput");
            exit();
        }
        if ($this->invalidLogin() === false){
            header("location: ../forms/regForm.php?error=login");
            exit();
        }
        if ($this->invalidEmail() === false){
            header("location: ../forms/regForm.php?error=email");
            exit();
        }
        if ($this->loginTakenCheck() === false){
            header("location: ../forms/regForm.php?error=eroremailtaken");
            exit();
        }
        if ($this->loginCou() === false){
            header("location: ../forms/regForm.php?error=erorlogincount");
            exit();
        }
        if ($this->passwordCount() === false){
            header("location: ../forms/regForm.php?error=erorpasscount");
            exit();
        }

        $this->setUser($this->login,$this->email,$this->password);

    }

    private function emptyInput(){

        $result;
        if (empty($this->login) || empty($this->email) || empty($this->password)){
            $result = false;
        }else{
            $result = true;

        }
        return $result;

    }

    private function invalidLogin(){
        $result;

        if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $this->login)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;

    }

    private function invalidEmail(){
        $result;

        if (!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;

    }
//логин или мыло занято
    private function loginTakenCheck(){
        $result;
        if (!$this->checkUser($this->login,$this->email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    //проверка на количество символов в логине

    private  function loginCou(){
        $result;
        if (strlen($this->login )<=5){
            $result = false;
        }else{
            $result = true;
        }
        return $result;

    }
    private  function passwordCount(){
        $result;
        if (strlen($this->password) <=5){
            $result = false;
        }else{
            $result = true;
        }
        return $result;

    }



}