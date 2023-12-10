<?php
session_start();
class AdminUserRegModel extends  DbhClass
{

    protected function setUser($login,$email,$password,$adm){

        $con = $this->connect()->prepare('INSERT INTO users (login,email,password,admin) VALUES (?,?,?,?);');

        $hash = password_hash($password,PASSWORD_DEFAULT);

        if (!$con->execute([$login,$email,$hash,$adm])){
            $con = null;
            header("location: ../admin/AdminUserCreate.php?error=connfailed");
            exit();
        }

    }

    //проверка на занятый логин и адрес

    protected function checkUserLogin($login)
    {

        $con = $this->connect()->prepare('SELECT id FROM users WHERE login = ?;');

        if (!$con->execute([$login])) {
            $con = null;
            header("location: ../admin/AdminUserCreate.php?error=conerror");
            exit();

        }

        if ($con->rowCount() >0){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    protected function checkUserEmail($email)
    {

        $con = $this->connect()->prepare('SELECT id FROM users WHERE email = ?;');

        if (!$con->execute([$email])) {
            $con = null;
            header("location: ../admin/AdminUserCreate.php?error=conerror");
            exit();

        }

        if ($con->rowCount() >0){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }


}