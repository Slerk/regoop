<?php
session_start();
class AdmPostCreClass extends AdminPostCreateModel
{

    private $title;
    private $content;
    private $topic;
    private $img;



    public function __construct($title,$content,$topic,$img)
    {

        $this->title = $title;
        $this->content = $content;
        $this->topic = $topic;
        $this->img = $img;


    }

    public function insertPost(){

        if ($this->emptyInput() === false){
            header("location: ../admin/AdminPostForm.php?error=emptyinput");
            exit();
        }

        if ($this->invalidTitle() === false){
            header("location: ../admin/AdminPostForm.php?error=invalidtitle");
            exit();
        }

        if ($this->invalidContent() === false){
            header("location: ../admin/AdminPostForm.php?error=invalidcontent");
            exit();
        }

        if ($this->titleCount() === false){
            header("location: ../admin/AdminPostForm.php?error=titlecountfalse");
            exit();
        }

        if ($this->contentCount() === false){
            header("location: ../admin/AdminPostForm.php?error=contentcountfalse");
            exit();
        }

        if ($this->titleTaken() === false){
            header("location: ../admin/AdminPostForm.php?error=titletaken");
            exit();
        }

        if ($this->imgAdd() === false){
            header("location: ../admin/AdminPostForm.php?error=imgtaken");
            exit();
        }

        $this->setPost($this->title,$this->content,$this->topic,$this->img);

    }

    private function emptyInput(){

        if (empty($this->title) || empty($this->content) ){
            $result = false;
        }else{
            $result = true;
        }
        return $result;

    }

    private function invalidTitle(){

        if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $this->title)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;

    }

    private function invalidContent(){

        if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $this->content)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;

    }

    private function titleCount(){
        if (strlen($this->title) <=3){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function contentCount(){
        if (strlen($this->content) <=3){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    public function imgAdd(){

        if (!empty($_FILES['img']['name'])){

            //даем уникальное имя файлу по времени добавления в секундах
            $img = time() . "_" . $_FILES['img']['name'];
            //временное имя
            $fileTmpName = $_FILES['img']['tmp_name'];
            //тип файла
            $fileType = $_FILES['img']['type'];
            //место хранения изображения
            $destination = "../img/" . $img;


            if (strpos($fileType, 'image') === false) {
//                $this->img = $img;
                $error = "Подгружаемый файл не является изображением!";
            }else{
                $result = move_uploaded_file($fileTmpName, $destination);
//                $result->writeImage($path."name.jpg");
                if (!empty($result)){
//                    $result = move_uploaded_file($fileTmpName, $destination);
                    $this->img = $img;

                    $res = true;

                }
                else{
                    $res = false;
                }
            }
        }
        else{
            $res = false;
        }

        return $res;

    }

    private function titleTaken(){

        if (!$this->checkTitle($this->title)){
            $res = false;
        }else{
            $res = true;
        }
        return $res;

    }



}