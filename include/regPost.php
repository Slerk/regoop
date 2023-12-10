<?php
    session_start();

        if (isset($_POST['but_reg'])){

            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            include "../classes/DbhClass.php";
            include "../classes/SignUpController.php";
            include "../classes/RegistrUser.php";

            $regClass = new RegistrUser($login,$email,$password);

            $regClass->signupUser($login,$email,$password);


            header("location: ../forms/regForm.php?error=none");


        }