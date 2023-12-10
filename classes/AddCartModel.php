<?php
session_start();
    class AddCartModel extends DbhClass
    {


        public function addToBasket()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['prodId'])) {
                $log = $_SESSION['login'];
                $stmt = $this->connect()->prepare("SELECT * FROM users WHERE login='$log'");
                if (!$stmt->execute()) {
                    $stmt = null;
                    header("location: ../portfolio.php?error=connfailed");
                    exit();
                }
                else {

                    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $_SESSION['clientId'] = $user[0]['id'];
                }

                if (!empty($_SESSION['clientId']) && !empty($_GET['prodId'])) {

                    $clientId = $_SESSION['clientId'];
                    $prodId = $_GET['prodId'];

                    $con = $this->connect()->prepare("SELECT id FROM posts");
                    if (!$con->execute()) {
                        $con = null;
                        header("location: ../portfolio.php?error=connfailed");
                        exit();
                    }
                    else {

                        $products = $con->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($products as $key => $value) {

                            if (in_array($prodId, $value)) {

                                $addConn = $this->connect()->prepare("INSERT INTO basket (clientId,productId) VALUES ($clientId,$prodId)");
                                if (!$addConn->execute()) {
                                    $addConn = null;
                                    header("location: ../portfolio.php?error=connfailed");
                                    exit();
                                }
//                                header("location: ../index.php");
                                else {
                                    header("location: ../index.php");
                                }

                            }

                        }

                    }

                }


            }

        }

        public function viewProd(){
                $clientId = $_SESSION['clientId'];
            $con = $this->connect()->prepare("SELECT * FROM posts INNER JOIN basket on posts.id = basket.productId
                                                    WHERE basket.clientId = $clientId ");
            $con->execute();
            $prodView = $con->fetchAll(PDO::FETCH_ASSOC);
            return $prodView;

        }

        public function delProd(){

            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['deleteProd_id'])){

                $id = $_GET['deleteProd_id'];
                $con = $this->connect()->prepare("DELETE FROM basket WHERE id = '$id'");
                $con->execute();
                header('location: ../productsBuy.php');



            }

        }


    }