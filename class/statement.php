<?php
    require "database.php";

    class Statement extends Database{
        
        private $dbcon;

        public function __construct($host,$user,$pwd,$dbname){

            parent::__construct($host,$user,$pwd,$dbname);
            $this->dbcon = parent::connection();
        }
        public function isUsernameUsed($username){
            $stmt = $this->dbcon->prepare("SELECT COUNT(id) AS db FROM user WHERE username=?");
            $stmt->bindParam(1, $username);
            $stmt->execute();

            $result = $stmt->fetch();

            return ($result['db'] > 0 );
        }

        public function isEmailIsUsed($email){
            $stmt = $this->dbcon->prepare("SELECT COUNT(id) AS db FROM user WHERE email=?");
            $stmt->bindParam(2, $email);
            $stmt->execute();

            $result = $stmt->fetch();

            return ($result['db'] > 0 );
        }

    
        public function newUserReg($username,$password,$email){
            $stmt = $this->dbcon->prepare("INSERT INTO user(username,email,password) VALUES(?,?,?)");
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $password); 
            $stmt->execute();

            return($stmt->errorCode()=="00000");
        }

        public function loginCheck($username,$password){

            $stmt = $this->dbcon->prepare("SELECT COUNT(id) AS db FROM user WHERE username=? AND password=?");
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $password);
            $stmt->execute();

            $result = $stmt->fetch();
            return($result['db']==1 );
        }
        
/**_____________fel nem használt metódusok______________________ */
        public function newUserBevitel($username,$password,$email){
            $ut=$this->dbcon->prepare("INSERT INTO user VALUES (?,?,?)");
            $ut->bindParam(1, $username);
            $ut->bindParam(2, $email);
            $ut->bindParam(3, sha1($password));
            $ut->execute();
            $result = $ut->fetch();

            return $result;
        }

        public function userAdatModositas($userid,$username,$email){
            $ut=$this->dbcon->prepare("UPDATE user SET username=?, email=? WHERE userid=$userid");
            $ut->bindParam(1, $username);
            $ut->bindParam(2, $email);
            $ut->execute();
            $result = $ut->fetch();

            return $result;
        }

        public function userEltavolitas($userid){
            $ut=$this->dbcon->prepare("DELETE FROM user WHERE userid=$userid");
            $ut->execute();
            $result = $ut->fetch();

            return $result;
        }

        

       
 

    }