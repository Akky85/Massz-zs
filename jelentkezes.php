<?php 
 require "header.php" ;
 require "nav.php";
 require "class/masszazs.php";

if($_SESSION['logged']){
$massz=new Masszazs();
$msg="";





if(isset($_POST['lefoglal'])){

    if(isset($_GET['username'])){
    $user_id=$_GET['username'];
    /*$user_id=$massz->IDlekerdez($username);*/
    
        $kezeles=$_POST['kezeles'];
        $name=$_POST['name'];
        $telefon=$_POST['telefon'];
        $email=$_POST['email'];
        $date=$_POST['date'];
        $timeslot=$_POST['timeslot'];
        $megjegyzes=$_POST['megjegyzes'];

    
        $msg=$massz->kezelesLefoglal($kezeles,$name,$telefon,$email,$date,$timeslot,$megjegyzes,$user_id);      

    
        }
    }

 ?>  
<!-- _____________________belogolt állapot ________________________________-->

<div class="container lentebb">        
    <h2 class="ptty text-center mt-5">Foglalok időpontot</h2>

    <div class="row mt-5">        
        <div class="col-sm-6"><img class="img-thumbnail mx-auto d-block img-fluid mt-5" src="IMG/post1.jpg" alt=""></div>
        <div class="col-sm-6 justify-content-center">
        <p class="text-center text-dark mt-3" for=""><b>Kérlek töltsd ki az alábbi mezőket:</b></p> 
        <span class="text-center d-block"><?php echo $msg; ?></span>

            <form action="" method="POST" class="form-group">
                <label for="">Az időpontom:</label>
                <input name="date" class="form-control mb-3" type="date"  id="" required>

                <select name="timeslot" class="form-control mb-3" id="">
                    <option value="08:00-tól - 09:00-ig">08:00-tól - 09:00-ig</option>
                    <option value="09:00-tól - 10:00-ig">09:00-tól - 10:00-ig</option>
                    <option value="10:00-tól - 11:00-ig">10:00-tól - 11:00-ig</option>
                    <option value="11:00-tól - 12:00-ig">11:00-tól - 12:00-ig</option>
                    <option value="12:00-tól - 13:00-ig">12:00-tól - 13:00-ig</option>
                    <option value="13:00-tól - 14:00-ig">13:00-tól - 14:00-ig</option>
                    <option value="14:00-tól - 15:00-ig">14:00-tól - 15:00-ig</option>
                    <option value="15:00-tól - 16:00-ig">15:00-tól - 16:00-ig</option>
                </select>

                <select name="kezeles" class="form-control mb-3" id="">
                    <option value="Aroma terápia">Aroma terápiás kezelés</option>
                    <option value="Mélyszövet, köpöllyel">Mélyszövetes celulit masszázs köpölyözéssel</option>
                    <option value="Mézes mélyszövet masszázs">Mézes mélyszövet masszázs</option>
                    <option value="Talp">Talp masszázs</option>
                    <option value="Arc masszázs">Arc masszázs</option>
                    <option value="Relaxáló masszázs">Relaxálós frissítő masszázs</option>
                </select>

                <input required name="name" type="text" id="" class="form-control mb-3" placeholder="Név">

                <input required name="telefon" type="text" id="" class="form-control mb-3" placeholder="Telefonszám">

                <input required name="email" type="email" id="" class="form-control mb-3" placeholder="Email cím">

                <textarea name="megjegyzes" id="" class="form-control my-3" cols="30" rows="4" placeholder="Megjegyzések, betegségek, allergiás kórtünetek, amiről úgy gondolod, jó ha tájékoztatsz engem.."></textarea>  

                <button name="lefoglal" class="btn btn-secondary form-control mt-3" type="submit" data-toggle="modal" data-target="exampleModal">Elküldöm</button>
                
            </form>
        </div>
    </div>
</div>
<!-- _________________________________kilogolt állapot___________________________-->
<?php

} else{
     $_SESSION['user']="";

      ?>
<div class="container lentebb">        
    <h2 class="ptty text-center mt-5">Foglalok időpontot</h2>

    <div class="row mt-5">        
        <div class="col-sm-6"><img class="img-thumbnail mx-auto d-block img-fluid mt-5" src="IMG/post1.jpg" alt=""></div>
        <div class="col-sm-6 justify-content-center">
        <p class="text-center text-secondary mt-3" for=""><b>A kezelésre jelentkezéshez be kell lépned!</b></p> 

            <form action="" method="POST" class="form-group">
                <label for="">Az időpontom:</label>
                <input name="date" class="form-control mb-3" type="date"  id="" required>

                <select name="timeslot" class="form-control mb-3" id="">
                    <option value="08:00-tól - 09:00-ig">08:00-tól - 09:00-ig</option>
                    <option value="09:00-tól - 10:00-ig">09:00-tól - 10:00-ig</option>
                    <option value="10:00-tól - 11:00-ig">10:00-tól - 11:00-ig</option>
                    <option value="11:00-tól - 12:00-ig">11:00-tól - 12:00-ig</option>
                    <option value="12:00-tól - 13:00-ig">12:00-tól - 13:00-ig</option>
                    <option value="13:00-tól - 14:00-ig">13:00-tól - 14:00-ig</option>
                    <option value="14:00-tól - 15:00-ig">14:00-tól - 15:00-ig</option>
                    <option value="15:00-tól - 16:00-ig">15:00-tól - 16:00-ig</option>
                </select>

                <select name="kezeles" class="form-control mb-3" id="">
                    <option value="Aroma terápia">Aroma terápiás kezelés</option>
                    <option value="Mélyszövet, köpöllyel">Mélyszövetes celulit masszázs köpölyözéssel</option>
                    <option value="Mézes mélyszövet masszázs">Mézes mélyszövet masszázs</option>
                    <option value="Talp">Talp masszázs</option>
                    <option value="Arc masszázs">Arc masszázs</option>
                    <option value="Relaxáló masszázs">Relaxálós frissítő masszázs</option>
                </select>

                <input required name="name" type="text" id="" class="form-control mb-3" placeholder="Név">

                <input required name="telefon" type="text" id="" class="form-control mb-3" placeholder="Telefonszám">

                <input required name="email" type="email" id="" class="form-control mb-3" placeholder="Email cím">

                <textarea name="megjegyzes" id="" class="form-control my-3" cols="30" rows="4" placeholder="Megjegyzések, betegségek, allergiás kórtünetek, amiről úgy gondolod, jó ha tájékoztatsz engem.."></textarea>  

                <button disabled name="lefoglal" class="btn btn-dark form-control mt-3" type="submit">Foglaláshoz kérlek jelentkezz be!</button>

            </form>
        </div>
    </div>
</div>      







<?php
}
require "footer.php"
?>



