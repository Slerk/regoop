<?php
session_start();

    if (isset($_POST['edit_post'])){

        $admTitle = $_POST['title'];
        $admContent = $_POST['content'];
        $admIdTopic = $_POST['topic'];
        $admImg = $_POST['img'];

    include "../classes/DbhClass.php";
    include "../classes/AdminPostEditModel.php";
    include "../classes/AdminPostEditClass.php";


    $postEdit = new AdminPostEditClass($admTitle,$admContent,$admIdTopic,$admImg);

//
        $postEdit->insertPost($admTitle,$admContent,$admIdTopic,$admImg);

    header("location: ../admin/postsAll.php?error=none");

}