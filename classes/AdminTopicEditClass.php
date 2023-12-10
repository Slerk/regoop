<?php
session_start();
    class AdminTopicEditClass extends AdminTopEditModel
    {
//        private $id;
        private $topic;


        public function __construct($topic)
        {
//            $this->id = $id;
            $this->topic = $topic;

        }


        public function editTopic(){

            if ($this->emptyTopic() === false){
                header("location: ../admin/adminTopicsCreate.php?error=emptyinput");
                exit();
            }

            if ($this->invalidTopic() === false){
                header("location: ../admin/adminTopicsCreate.php?error=invalidtopic");
                exit();
            }

            if ($this->countTop() === false){
                header("location: ../admin/adminTopicsCreate.php?error=topiccountfalse");
                exit();
            }

            if ($this->topicTaken() === false){
                header("location: ../admin/adminTopicsCreate.php?error=topictaken");
                exit();
            }


            $this->editTopic($this->topic);

        }

        private function emptyTopic(){

            if (empty($this->topic)){
                $res = false;
            }else {
                $res = true;
            }
            return $res;

        }

        private function invalidTopic(){

            if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $this->topic)){
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }

        private function countTop(){

            if (strlen($this->topic) <=3){
                $res = false;
            }else{
                $res = true;
            }
            return $res;

        }

        private function topicTaken(){

            if (!$this->checkTopic($this->topic)){
                $res = false;
            }else{
                $res = true;
            }
            return $res;

        }

    }