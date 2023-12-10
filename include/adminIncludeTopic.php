<?php
session_start();

if (isset($_POST['but_topic'])){

    $admTopic = $_POST['name_topic'];


    include "../classes/DbhClass.php";
    include "../classes/AdminTopCreatModel.php";
    include "../classes/AdminTopicCreatClass.php";


        $topicCreate = new AdminTopicCreatClass($admTopic);

        $topicCreate->insertTopic($admTopic);

    header("location: ../admin/adminTopicsCreate.php?error=none");

}