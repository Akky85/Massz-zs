<?php

require "../class/database.php";

class Sql extends Database{


    public function __construct(){
        parent::__construct();
    }

    public function kilistaz(){
        $con = parent::connection();
        $res = $con->prepare("SELECT * FROM foglalas ORDER BY id DESC");
        $res->execute();
        
        $adat= $res->fetchAll();

        return $adat;
    }
    public function kilistaz_reszletesen($userid){
        $con = parent::connection();
        $res = $con->prepare("SELECT * FROM foglalas WHERE id=$userid");
        $res->execute();

        $adat=$res->fetchAll();
        return $adat;
    }
    public function kilistazDatumos(){
        $con = parent::connection();
        $res = $con->prepare("SELECT * FROM foglalas ORDER BY date DESC");
        $res->execute();
        
        $adat= $res->fetchAll();

        return $adat;
    }


/* nem működik a csekkolás */
    private function csekkol($date, $timeslot){
        $con = parent::connection();
        $stmt = $con->prepare("SELECT COUNT(id) FROM foglalas AS db WHERE date = ? AND timeslot = ?");
        $stmt->bindParam(1, $date);
        $stmt->bindParam(2, $timeslot);
        $stmt->execute();
        $result = $stmt->fetch();
        return($result[0]==1 );
    }
    public function beletesz($kezeles,$name,$telefon,$email,$date,$timeslot,$megjegyzes,$user_id){
        $msg="";
        $con = parent::connection();
        if($this->csekkol($date,$timeslot)){
            $msg.= "<p class='alert alert-danger'>Az általad választott időpont foglalt, kérlek válassz másikat!</p>";           
        } else{
            $stmt = $con->prepare("INSERT INTO foglalas (kezeles, name, telefon, email, date, timeslot, megjegyzes, user_id) VALUES (?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1, $kezeles);
            $stmt->bindParam(2, $name);
            $stmt->bindParam(3, $telefon);
            $stmt->bindParam(4, $email);
            $stmt->bindParam(5, $date);
            $stmt->bindParam(6, $timeslot);
            $stmt->bindParam(7, $megjegyzes);
            $stmt->bindParam(8, $user_id);
            $stmt->execute();

            return $msg="Foglalás sikerült!";
            }            
        }
    
    public function felhasznalok_szama(){
        $con = parent::connection();
        foreach($con->query('SELECT COUNT(id) FROM user') as $row) {

            echo "<p style='font-size:larger;'><b>" . $row['COUNT(id)'] . "</b></p>";
            }

    }
    public function hirlevelre_jelentkezettek_szama(){
        $con = parent::connection();
        foreach($con->query('SELECT COUNT(hir_id) FROM hirlevel') as $row) {

            echo "<p style='font-size:larger;'><b>" . $row['COUNT(hir_id)'] . "</b></p>";
            }

    }


    public function kezelesre_idorendben($date){
        $con = parent::connection();
        $msg="";
        $res = $con->prepare("SELECT * FROM foglalas WHERE date=?");
        $res->bindParam(1, $date);
        $res->execute();
        $adat = $res->fetchAll();

             return $adat;
    }

/** nem müködik */
    public function kezelesABC(){
        $con = parent::connection();
        $res = $con->prepare("SELECT * FROM foglalas ORDER BY kezeles ASC");
        $res->execute();
        
        $adat= $res->fetchAll();

        return $adat;
    }
    public function felhasznalokABC(){
        $con = parent::connection();
        $res = $con->prepare("SELECT * FROM foglalas ORDER BY name ASC");
        $res->execute();
        
        $adat= $res->fetchAll();

        return $adat;
    }
    public function hirlevelesABC(){
        $con = parent::connection();
        $res = $con->prepare("SELECT * FROM hirlevel ORDER BY hirname ASC");
        $res->execute();
        
        $adat= $res->fetchAll();

        return $adat;
    }    
    /*
    public function hirlevel_feliratkozas(){
        $con = parent::connection();
        $res = $con->prepare("SELECT COUNT(id) FROM hirlevel");
        $res->execute();
        $adat = $res->fetch();
        return $adat;
    }*/
    public function email_kilistaz(){
        $con = parent::connection();
        $res = $con->prepare("SELECT * FROM hirlevel ORDER BY hir_id");
        $res->execute();
        $adat=$res->fetchAll();
        return $adat;
    }
    /*
    public function kilistaz_fuggoben(){
        $con = parent::connection();
        $res = $con->prepare("SELECT * FROM foglalas WHERE fuggoben = 0");
        $res->execute();
        
        $adat= $res->fetchAll();

        return $adat;

    }
   
    /**nem megy 
    public function pipa($userid){
        $con= parent::connection();
        $stmt=$con->prepare("UPDATE foglalas WHERE id=$userid SET fuggoben=? WHERE fuggoben=0");
        $stmt->bindParam(1,1);
        $stmt->execute();
        $result=$stmt->fetch();
        return $result;
    } */

    }


    