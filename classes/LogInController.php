<?php
session_start();
class LogInController extends DbhClass

{

    protected function getUser($login,$password ){
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE login = ? OR email = ?;');


        //$login и email подставляются здесь в запрос вместо ?
        if (!$stmt->execute([$login,$password])){
            $stmt = null;
            header("location: ../forms/auth.php?error=stmtfailed");
            exit();
        }
//            $stmt = null;
 //если количество строк зарпоса 0,то юзера нету такого,значит ошибка
        if ($stmt->rowCount() ==0){

            $stmt = null;
            header("location: ../forms/auth.php?error=usernotfound");
            exit();

        }

        //проверка на правильность пароля
        $passHash = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPass = password_verify($password,$passHash[0]['password']);

        if ($passHash == false){

            $stmt = null;
            header("location: ../forms/auth.php?error=wrong");
            exit();

        }elseif ($passHash == true){
            //выбираем пользователя где совпали введенные данные
            $stmt = $this->connect()->prepare('SELECT * FROM users 
                                                    WHERE login = ? OR email = ? AND password = ?;');
            if (!$stmt->execute([$login,$login,$password])){
                $stmt = null;
                header("location: ../forms/auth.php?error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount() == 0){

                $stmt = null;
                header("location: ../forms/auth.php?error=usernotfound");
                exit();

            }

            //если все проверки прошли,записываем данные в сессию

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION['userID'] = $user[0]['id'];
            $_SESSION['login'] = $user[0]['login'];


        }

//        $stmt = null;

    }



}