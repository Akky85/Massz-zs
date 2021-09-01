<?php

    require "statement.php";

    define("HOST",'localhost');
    define("USER","root");
    define("PWD","");
    define("DBNAME","idopontfoglalo");

    class User{
        private $statement;
        private $username;
        private $email;

        //adatbázis kapcsolódás futtatás
        public function __construct(){
            $this->statement =  new Statement(HOST,USER,PWD,DBNAME);
        }

        public function reg($username,$password1,$password2,$email){
            $msg="";

            $msg.=($this->statement->isUsernameUsed($username)) ? "<h5 class='error'>A választott felhasználónév foglalt! <h5>" : "" ;

            try{
                $this->passwordLength($password1);
                $this->passwordEqual($password1,$password2);
            } catch(Exception $e){
                $msg.= $e->getMessage();
            }

            if($msg ==""){
                $msg.=(!$this->statement->newUserReg($username, sha1($password1), $email)) ? "<h5 class='error'>A regisztráció nem sikerült! </h5>" : "" ;
            }
            $msg = ($msg =="") ? "<h3 class='siker'>Sikeres regisztráció!</h3>" : "<div>.$msg.</div>" ;
            header("Location:login.inc.php");

            return $msg;
        }

        public function login($username,$password){
            if($this->statement->loginCheck($username,sha1($password))){
                $_SESSION["logged"]=true;
                $_SESSION["user"]=$username;
                header("Location: index.php");
            } else{
                throw new Exception("<h4 class='error'>Hibás belépési adatok!</h4>");
            }
        }

        private function passwordLength($password){
            if(strlen($password) < 6){
                throw new Exception ("<h5 class='error'>A jelszó hossza minimum 6 karakter hosszú kell legyen! <h5>");

            }
        }
        private function passwordEqual($password1,$password2){
            if($password1 != $password2){
                throw new Exception("<h5 class='error'>A két jeleszó nem egyezik! </h5>");
            }
        }

    
   
}