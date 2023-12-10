<?php

class AdminPostEditModel extends DbhClass
{

    public function editPost($title,$content,$topic,$img){
        $id = $_POST['id'];
        $con= $this->connect()->prepare("UPDATE posts SET title = '$title', content = '$content', id_topic = '$topic', img = '$img'
              WHERE id='$id'");
        if (!$con->execute()){
            $con = null;
            header("location: ../admin/adminEditPost.php?error=connfailed");
            exit();
        }

    }



}