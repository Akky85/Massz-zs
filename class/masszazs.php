<?php

require "database.php";

class Masszazs extends Database{
    public $id;
    public $kezeles;
    public $name;
    public $telefon;
    public $email;
    public $date;
    public $timeslot;
    public $megjegyzes;
    public $fuggoben;
    public $hirname;
    public $hiremail;
    public $username;



    function __construct(){
        parent::__construct();
    }

    public function IDlekerdez($username){

        $con= parent::connection();
        $stmt = $con->prepare("SELECT id FROM user INNER JOIN foglalas ON user.id=foglalas.user_id WHERE username=$username");

        $stmt->execute();

        $result=$stmt->fetch();
        return $result;
    }

    public function ellenor($date, $timeslot){
        $con = parent::connection();
        $stmt = $con->prepare("SELECT COUNT(id) AS db FROM foglalas WHERE date = ? AND timeslot = ?");
        $stmt->bindParam(1, $date);
        $stmt->bindParam(2, $timeslot);
        if($stmt->execute()){
            /*
        $result = $stmt->fetch();
            
            throw new Exception("Hiba!");
         */   
        }
        else{

            $result = $stmt->fetch();
            return $result['id']== 1;
        }
    }
    public function kezelesLefoglal($kezeles, $name,$telefon,$email,$date,$timeslot, $megjegyzes, $user_id){
        $msg="";

        if($this->ellenor($date,$timeslot)){
            $msg.=(!$this->beletesz($kezeles,$name,$telefon,$email,$date,$timeslot,$megjegyzes,$user_id))?"<h5 class='text-secondary'>Válassz másik időpontot!</h5>":"";
        }else{
        $msg.=$this->beletesz($kezeles,$name,$telefon,$email,$date,$timeslot,$megjegyzes,$user_id)?"<h5 class='text-primary'>Foglalás sikeres!</h5>":"<h5 class='text-secondary'>Foglalás sikertelen!</h5>";
        return $msg;
        }
    }

    public function beletesz($kezeles,$name,$telefon,$email,$date,$timeslot,$megjegyzes,$user_id){
        $con = parent::connection();
        $sql="INSERT INTO foglalas(kezeles,name,telefon,email,date,timeslot,megjegyzes,user_id) VALUES (?,?,?,?,?,?,?,?)";
        $ut=$con->prepare($sql);
        $ut->bindParam(1, $kezeles);
        $ut->bindParam(2, $name);
        $ut->bindParam(3, $telefon);
        $ut->bindParam(4, $email);
        $ut->bindParam(5, $date);
        $ut->bindParam(6, $timeslot);
        $ut->bindParam(7, $megjegyzes);
        $ut->bindParam(8, $user_id);
        $result=$ut->execute();
    

        return $result;
    }
/**    public function kezelesLefoglal($kezeles, $name,$telefon,$email,$date,$timeslot, $megjegyzes){
        $msg="";
        $msg.=($this->ellenor($date,$timeslot))? "<h5 class='text-secondary'>A választott időpont foglalt</h5>":"";
        if($msg ==""){
            $msg.=(!$this->beletesz($kezeles,$name,$telefon,$email,$date,$timeslot,$megjegyzes))?"<h5 class='text-secondary'>A foglalás nem sikerült!</h5>":"";
        }
        $msg=($msg="")?"<h5 class='text-primary'>Foglalás sikeres!</h5>":"<div>.$msg.</div>";
        return $msg;
    } */
        /*if($result){
            $msg.= "<h5 class='text-primary'>Foglalás sikeres!</h5>";
        }*/

    
    public function userKezelesModosit($kezeles_id,$kezeles,$name,$telefon,$email,$date,$timeslot,$megjegyzes){
        $con = parent::connection();
        $sql="UPDATE foglalas SET kezeles=?,name=?, telefon=?, email=?, date=?, timeslot=?, megjegyzes=? WHERE id=$kezeles_id";
        $ut=$con->prepare($sql);
        $ut->bindParam(1, $kezeles);
        $ut->bindParam(2, $name);
        $ut->bindParam(3, $telefon);
        $ut->bindParam(4, $email);
        $ut->bindParam(5, $date);
        $ut->bindParam(6, $timeslot);
        $ut->bindParam(7, $megjegyzes);
        $result=$ut->execute();

        return $result;

    }
    public function userModosit($kezeles_id,$kezeles,$name,$telefon,$email,$date,$timeslot,$megjegyzes){
        $msg="";
        if($this->userKezelesModosit($kezeles_id,$kezeles,$name,$telefon,$email,$date,$timeslot,$megjegyzes)){
            $msg.="<h5 class='text-primary text-center'>Sikerült a módosítás!</h5>";

        } else{
            throw new Exception("<h5 class='text-secondary'>Nem sikerült módosítani</h5>");
        }
        return $msg;
    }

    public function Torles($kezeles_id){
        $con = parent::connection();
        $sql="DELETE FROM foglalas WHERE id=$kezeles_id";
        $result=$con->query($sql);

        return $result;
    }
    public function kezelesTorlese($kezeles_id){
        $msg="";
        if($this->Torles($kezeles_id)){
            
            $msg.="<h5 class='text-secondary text-center'>Kezelésedet sikeresen töröltük az adatbázisból! </h5>
            ";

        } else{
            throw new Exception("<h5 class='text-secondary'>Nem sikerült a törlés!</h5>");
        }
        return $msg;
    }

    public function kezelesekKilistazasa($userid){
        $con = parent::connection();
        $res = $con->prepare("SELECT * FROM foglalas WHERE id=$userid");
        $res->execute();
    
        $adat=$res->fetchAll();
        return $adat;
    }
 
    public function hirlevelre_feliratkoz($hirname,$hiremail){
        $msg="";
        if($this->hirlevel($hirname,$hiremail)){
            $msg.="<h5 class='text-primary'>Sikerült a feliratkozás!</h5>";

        } else{
            throw new Exception("<h5 class='text-secondary'>Nem sikerült feliratkozni</h5>");
        }
        return $msg;
    }
    public function hirlevel($hirname,$hiremail){
        $con = parent::connection();
        $sql="INSERT INTO hirlevel(hirname,hiremail) VALUES(?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(1, $hirname);
        $stmt->bindParam(2, $hiremail);
        $result=$stmt->execute();
    
       return $result;
    }

    public function adatokKiir($username){
        $con=parent::connection();
        $res=$con->prepare("SELECT email FROM user WHERE username=?");
        $res->bindParam(1, $username);
        $res->execute();
        $adat=$res->fetch();
        
        echo $adat[0];
        
    }

    public function kilistazSpec($nev){
        $con = parent::connection();
        $res = $con->prepare("SELECT * FROM foglalas INNER JOIN user ON foglalas.user_id=user.username WHERE username= ? ORDER BY date DESC ");
        $res->bindParam(1,$nev);
        $res->execute();
        
        $adat= $res->fetchAll();

        return $adat;
    }
/**____________adatmódosításos cuccok nem működik_____________ */

    public function userAdatModosit($password,$username,$email){
        $con = parent::connection();
        $sql="UPDATE user SET username=?, email=? WHERE password=$password";
        $ut=$con->prepare($sql);
        $ut->bindParam(1, $username);    
        $ut->bindParam(2, $email);


        $ut->execute();



    }


    public function mod($password,$username,$email){
        $msg="";
        if($msg ==""){
            $msg.=(!$this->userAdatModosit(sha1($password),$username,$email)) ? "<h5 class='error'>A módosítás nem sikerült! </h5>" : "" ;
        }
        $msg = ($msg =="") ? "<h3 class='siker'>Sikeres adatmódosítás!</h3>" : "<div>.$msg.</div>" ;
        

        return $msg;
    }
}