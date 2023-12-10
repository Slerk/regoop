<?php
session_start();
class AdminTopCreatModel extends DbhClass
{

    protected function setTopic($topic){

        $con = $this->connect()->prepare('INSERT INTO topics (name_topic) VALUES (?);');

        if (!$con->execute([$topic])){
            $con = null;
            header("location: ../admin/AdminTopicsCreate.php?error=connfailed");
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

    public function allTopics(){

        $con = $this->connect()->prepare('SELECT * FROM topics;');
        $con->execute();
        $topics= $con->fetchAll(PDO::FETCH_ASSOC);

        foreach ($topics as $key=>$value) {
            echo "<tr>";
            echo "<p>"."<td>".$value['id']."</td>"."<p>";
            echo "<p>"."<td>".$value['name_topic']."</td>"."<p>";
            echo "<p>"."<td>"."<a href='../admin/adminEditTopics.php?id=".$value['id']."' class='btn btn-warning'>".'Редактировать'."</a>"."</td>"."<p>";
            echo "<p>"."<td>"."<a href='../admin/topicsAll.php?deleteTopic_id=".$value['id']."' class='btn btn-danger'>".'Удалить'."</a>"."</td>"."<p>";
            echo "</tr>";
        }

    }

    public function getParam(){

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){

            $id = $_GET['id'];

            $con = $this->connect()->prepare("SELECT * FROM topics WHERE id ='$id'");
            $con->execute();
            $topicsGet= $con->fetchAll(PDO::FETCH_ASSOC);

            foreach ($topicsGet as $key=>$value) {
                $valID = $value['id'];
                $name_topic = $value['name_topic'];

                echo "<input name='id' type='hidden' value='$valID'>";
                echo  "<div class='form-floating'>";
                echo "<input  value='$name_topic' class='form-control mt-5 col-auto' name='name_topic' placeholder='name_topic'>";
                echo "<label for='floatingInput'>".'Категория'."</label>";


            }

        }

    }

    public function delTopic(){

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['deleteTopic_id'])){

            $id = $_GET['deleteTopic_id'];
            $con = $this->connect()->prepare("DELETE FROM topics WHERE id = '$id'");
            $con->execute();
            header('location: ../admin/topicsAll.php');



        }

    }



}