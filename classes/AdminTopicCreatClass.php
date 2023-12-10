<?php
session_start();
class AdminTopicCreatClass extends AdminTopCreatModel
{

    private $topic;


    public function __construct($topic)
    {

        $this->topic = $topic;

    }


    public function insertTopic(){

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


        $this->setTopic($this->topic);

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