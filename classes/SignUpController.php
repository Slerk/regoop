<?php
    session_start();
    class SignUpController extends DbhClass

    {

        protected function setUser($login,$email ,$password ){
            $stmt = $this->connect()->prepare('INSERT INTO users (login,email,password) VALUES (?,?,?);');

            $hash = password_hash($password,PASSWORD_DEFAULT);

            //$login и email подставляются здесь в запрос вместо ?
            if (!$stmt->execute([$login,$email ,$hash])){
                $stmt = null;
                header("location: ../forms/regForm.php?error=stmtfailed");
                exit();
            }

            $_SESSION['login'] = $login;

//            $stmt = null;

        }


        //проверка на занятый логин и адрес
        protected function checkUser($login,$email){
            $stmt = $this->connect()->prepare('SELECT id FROM users WHERE login = ? OR email = ?;');

            //$login и email подставляются здесь в запрос вместо ?
            if (!$stmt->execute([$login,$email])){
                $stmt = null;
                header("location: ../forms/regForm.php?error=stmtfailed");
                exit();
            }

            $resultCheck;
            if ($stmt->rowCount() > 0){
                $resultCheck = false;
            }else{
                $resultCheck = true;
            }

            return $resultCheck;

        }

        public function allUsers(){

            $con = $this->connect()->prepare('SELECT * FROM users;');
            $con->execute();
            $users = $con->fetchAll(PDO::FETCH_ASSOC);

                foreach ($users as $key=>$value) {
                    echo "<tr>";
                    echo "<p>"."<td>".$value['id']."</td>"."<p>";
                    echo "<p>"."<td>".$value['login']."</td>"."<p>";
                    echo "<p>"."<td>".$value['email']."</td>"."<p>";
                    echo "<p>"."<td>"."<a href='../admin/usersAll.php?delete_id=".$value['id']."' class='btn btn-danger'>".'Удалить'."</a>"."</td>"."<p>";
                    echo "</tr>";
                     }

                }

                public function delUser(){

                    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {


                        $id = $_GET['delete_id'];

                        $con = $this->connect()->prepare("DELETE  FROM users WHERE id ='$id'");
                        $con->execute();

                        header('location: ../admin/usersAll.php');

                    }

                }





    }