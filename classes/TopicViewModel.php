<?php
session_start();

    class TopicViewModel extends DbhClass
    {

        public function veiewTopic()
        {

            $con = $this->connect()->prepare("SELECT * FROM topics");
            $con->execute();
            $topicsView = $con->fetchAll(PDO::FETCH_ASSOC);
            return $topicsView;

        }

        public function viewPost(){
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
                $id = $_GET['id'];
                $con = $this->connect()->prepare("SELECT * FROM posts WHERE id_topic ='$id'");

                $con->execute();
                $postView = $con->fetchAll(PDO::FETCH_ASSOC);
                return $postView;
            }



        }

        public function secondTop(){
            $id =$_GET['id'];
            $con = $this->connect()->prepare("SELECT * FROM topics WHERE id='$id'");
            $con->execute([$id]);
            $secondTopic = $con->fetchAll(PDO::FETCH_ASSOC);
            return $secondTopic;

//
//            $sql ='SELECT * FROM `posts` WHERE `id`=:id';
//            $id =$_GET['id'];
//            $query = $connect->prepare($sql);
//            $query->execute(['id' =>$id]);
//
//            $secondBooks = $query->fetch(PDO::FETCH_OBJ);


        }
    }