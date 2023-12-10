<?php
session_start();

if (isset($_POST['but_post'])){

    $admTitle = $_POST['title'];
    $admContent = $_POST['content'];
    $admTopic = $_POST['topic'];
//    $_FILES['file']['name'] = $_POST['img'];
//    $admImg = $_FILES['file']['name'];
    $admImg =$_POST['img'];


    include "../classes/DbhClass.php";
    include "../classes/AdminPostCreateModel.php";
    include "../classes/AdmPostCreClass.php";

//    $regAdmUser = new AdminUserRegClass($admLogin,$admEmail,$admPassword,$admAdmin);
//
//    $regAdmUser->insertUser_orErr($admLogin,$admEmail,$admPassword,$admAdmin);

        $insPost = new AdmPostCreClass($admTitle,$admContent,$admTopic,$admImg);

        $insPost->insertPost($admTitle,$admContent,$admTopic,$admImg);

    header("location: ../admin/AdminPostForm.php?error=none");

}