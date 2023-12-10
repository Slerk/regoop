<?php
session_start();
class AdminUserRegClass extends AdminUserRegModel
{

    private  $login;
    private  $email;
    private  $password;
    private  $adm;

    public function __construct($login,$email,$password,$admin){

        $this->login = $login;
        $this->email = $email;
        $this->password = $password;
        $this->adm = $admin;


    }

    public function insertUser_orErr(){

        if ($this->emptyInput() === false){
            header("location: ../admin/adminUserCreate.php?error=emptyinput");
            exit();
        }

        if ($this->invalidLogin() === false){
            header("location: ../admin/adminUserCreate.php?error=invalidlogin");
            exit();
        }

        if ($this->invalidEmail() === false){
            header("location: ../admin/adminUserCreate.php?error=invalidmail");
            exit();
        }

        if ($this->logCount() === false){
            header("location: ../admin/adminUserCreate.php?error=logcountfalse");
            exit();
        }

        if ($this->pasCount() === false){
            header("location: ../admin/adminUserCreate.php?error=pascountfalse");
            exit();
        }

        if ($this->loginTaken() === false){
            header("location: ../admin/adminUserCreate.php?error=logintaken");
            exit();
        }

        if ($this->emailTaken() === false){
            header("location: ../admin/adminUserCreate.php?error=mailtaken");
            exit();
        }

        if ($this->admChecket() === false){
            header("location: ../admin/adminUserCreate.php?error=none");

        }

        $this->setUser($this->login,$this->email,$this->password,$this->adm);

    }

    private function emptyInput(){

        if (empty($this->login) || empty($this->email) || empty($this->password)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function invalidLogin(){

        if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $this->login)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;

    }

    private function invalidEmail(){
        if (!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function logCount(){
        if (strlen($this->login) <=3){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function pasCount(){

        if (strlen($this->password) <=5){
            $result = false;
        }else{
            $result = true;
        }
        return $result;

    }

    private function loginTaken(){

        if (!$this->checkUserLogin($this->login)){
            $res = false;
        }else{
            $res = true;
        }
        return $res;

    }

    private function emailTaken(){

        if (!$this->checkUserEmail($this->email)){
            $res = false;
        }else{
            $res = true;
        }
        return $res;

    }

    private function admChecket(){

        if (!$this->adm){
            $result = false;
        }else{
            $this->adm = 1;
            $result = true;

        }
        return $result;


    }

}