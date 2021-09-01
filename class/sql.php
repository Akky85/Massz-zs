<?php 

    require "database.php";

    class Sql extends Database{

        public function __construct(){
            parent::__construct();
        }
        public function reg($username,$email,$password){
            $con = parent::connection();
            $res = $con->prepare("INSERT INTO user(username,password,email) VALUES(?,?,?)");
            $res->bindParam(1, $username);
            $res->bindParam(2, $password);
            $res->bindParam(3, $email);

            if(empty($username) || empty($email) || empty($password)){
                throw new Exception("Minden mező kitöltése!");
            } else if(strlen($password) < 6){
                throw new Exception("Jelszó hossza minimum 6 karakternek kell legyen!");
            } else{
                $res->execute();
            }
        }

        


    }