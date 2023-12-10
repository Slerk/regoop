<?php
    session_start();

    if (isset($_POST['but_regAdmin'])){

        $admLogin = $_POST['login'];
        $admEmail = $_POST['email'];
        $admPassword = $_POST['password'];
        $admAdmin = $_POST['admin'];

        include "../classes/DbhClass.php";
        include "../classes/AdminUserRegModel.php";
        include "../classes/AdminUserRegClass.php";

        $regAdmUser = new AdminUserRegClass($admLogin,$admEmail,$admPassword,$admAdmin);

        $regAdmUser->insertUser_orErr($admLogin,$admEmail,$admPassword,$admAdmin);

        header("location: ../admin/adminUserCreate.php?error=none");

    }