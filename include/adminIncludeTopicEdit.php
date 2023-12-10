<?php
    session_start();

    if (isset($_POST['topic-edit'])){

        $admTopic = $_POST['name_topic'];


        include "../classes/DbhClass.php";
        include "../classes/AdminTopEditModel.php";
        include "../classes/AdminTopicEditClass.php";


        $topicEdit = new AdminTopicEditClass($admTopic);

        $topicEdit->editTop($admTopic);

        header("location: ../admin/topicsAll.php?error=none");

    }