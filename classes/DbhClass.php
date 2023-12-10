<?php
session_start();
    class DbhClass
    {

        protected function connect(){

            try {
                $username = 'root';
                $password = 'root';
                $db = 'oop';
                $host = '127.0.0.1';
//                $pdo = new PDO('mysql:host=localhost;dbname=DATABASENAME', 'USERNAME_DB', 'PASSWORD_DB');
                $dsn = "mysql:host=$host;dbname=$db";
                $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];

                $connect = new PDO($dsn, $username, $password, $options);
            }
            catch (PDOException $e){
                print_r('Error!:' . $e->getMessage() . '<br/>');
                die();
            }

            return $connect;

        }


    }

//try {
//                $username = 'root';
//                $password = 'root';
//                $db = 'oop';
//                $host = '127.0.0.1';
//
//                $dsn = "mysql:host=$host;dbname=$db";
//                $options = [
//                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//                    PDO::ATTR_EMULATE_PREPARES   => false,
//                ];
//
//                $connect = new PDO($dsn, $username, $password, $options);
//            }
//            catch (PDOException $e){
//                print_r('Error!:' . $e->getMessage() . '<br/>');
//                die();
//            }

