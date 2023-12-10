<?php
session_start();

if (isset($_POST['but_auth'])){

    $login = $_POST['login'];
    $password = $_POST['password'];

    include "../classes/DbhClass.php";
    include "../classes/LogInController.php";
    include "../classes/AuthClass.php";

$logUser = new AuthClass($login,$password);
    $logUser->LogInUser();


    header("location: ../index.php?error=none");


}