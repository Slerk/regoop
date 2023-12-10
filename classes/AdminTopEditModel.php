<?php
session_start();
    class AdminTopEditModel extends DbhClass
    {

        public function editTop($topic){
            $id = $_POST['id'];
        $con= $this->connect()->prepare("UPDATE topics SET name_topic = '$topic' WHERE id='$id'");
            if (!$con->execute()){
                $con = null;
                header("location: ../admin/adminEditTopics.php?error=connfailed");
                exit();
            }

        }


        protected function checkTopic($topic){

            $con = $this->connect()->prepare('SELECT id FROM topics WHERE name_topic = ?;');

            if (!$con->execute([$topic])){
                $con = null;
                header("location: ../admin/AdminTopicsCreate.php?error=conerror");
                exit();
            }

            if ($con->rowCount() >0){
                $res = false;
            }else{
                $res = true;
            }
            return $res;

        }


    }