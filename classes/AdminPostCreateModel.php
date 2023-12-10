<?php
    session_start();
    class AdminPostCreateModel extends DbhClass
    {

        protected function setPost($title,$content,$topic,$img){

            $con = $this->connect()->prepare('INSERT INTO posts (title,content,id_topic,img) VALUES (?,?,?,?);');


            if (!$con->execute([$title,$content,$topic,$img])){
                $con = null;
                header("location: ../admin/AdminPostForm.php?error=connfailed");
                exit();
            }

        }

        protected function checkTitle($title)
        {

            $con = $this->connect()->prepare('SELECT id FROM posts WHERE title = ?;');

            if (!$con->execute([$title])) {
                $con = null;
                header("location: ../admin/AdminPostForm.php?error=conerror");
                exit();

            }

            if ($con->rowCount() >0){
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }

        public function infoSelect(){
            $con = $this->connect()->prepare('SELECT * FROM topics;');
            $con->execute();
            $topics = $con->fetchAll(PDO::FETCH_ASSOC);

        foreach ($topics as $key => $value) {

            echo "<option value=".$value['id'].">".$value['name_topic']."</option>";

            }

        }

        public function getAllPosts(){

            $conek = $this->connect()->prepare("SELECT * FROM posts");
            $conek->execute();
            $topicsAll = $conek->fetchAll(PDO::FETCH_ASSOC);

            foreach ($topicsAll as $key=>$value) {

                echo "<tr>";
                echo "<p>"."<td>".$value['id']."</td>"."<p>";
                echo "<p>"."<td>".$value['title']."</td>"."<p>";
                echo "<p>"."<td>".$value['id_topic']."</td>"."<p>";
                echo "<p>"."<td>"."<a href='../admin/adminEditPost.php?id=".$value['id']."' class='btn btn-warning'>".'Редактировать'."</a>"."</td>"."<p>";
                echo "<p>"."<td>"."<a href='../admin/postsAll.php?deletePost_id=".$value['id']."' class='btn btn-danger'>".'Удалить'."</a>"."</td>"."<p>";
                echo "</tr>";

            }

        }

        public function delPost(){

            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['deletePost_id'])){
                $id = $_GET['deletePost_id'];
                $conDel = $this->connect()->prepare("DELETE FROM posts WHERE id = '$id'");
                $conDel->execute();
                header('location: ../admin/postsAll.php');

            }

        }

        public function getParamPost(){

            if ($_SERVER['REQUEST_METHOD'] ==='GET' && isset($_GET['id'])){

                $id = $_GET['id'];

                $conn = $this->connect()->prepare("SELECT * FROM posts WHERE id = '$id'");
                $conn->execute();
                $postsGet = $conn->fetchAll(PDO::FETCH_ASSOC);

                foreach ($postsGet as $key=>$value){

                    $postId = $value['id'];
                    $postTitle = $value['title'];
                    $postContent = $value['content'];

                    echo "<input name='id' value='$postId' type ='hidden' >";
                    echo  "<div class='form-floating'>";
                    echo "<input value='$postTitle' type='text' name='title' class='form-control mt-5 col-auto' id='title' placeholder='title'>";
                    echo "<label for='floatingInput'>".'Заглавие'."</label>";
                    echo "</div>";
                    echo  "<div class='input-group'>";
                    echo "<span  class='input-group-text'>".'With textarea'."</span>";
                    echo "<textarea type='text' name='content' class='form-control' id='content' aria-label='With textarea'>".$postContent."</textarea>";
                    echo "</div>";

                }

            }

        }

    }

