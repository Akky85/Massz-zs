<?php

class Database {
    protected $host;
    protected $user;
    protected $pwd;
    protected $dbname;

    protected function __construct(){
        $this->host = "localhost";
        $this->user = "root";
        $this->pwd = "";
        $this->dbname = "idopontfoglalo";
    }

    protected function connection(){

        $con = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pwd);
        $con->exec("SET NAMES utf8");

        return $con;
    }
}