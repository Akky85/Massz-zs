<?php 
require "header.php";
require "nav.php";
require "class/masszazs.php";

$modositos = new Masszazs();
$msg="";
if(isset($_GET['kezelesID'])){
    $userid=$_GET['kezelesID'];

    $adat=$modositos->kezelesekKilistazasa($userid);
        foreach($adat as $a =>$ertek){
           
            echo"
            <div class='container kartya lentebb pb-5'>
            <div class='row'>
                <div class='col-sm-2'></div>
                <div class='col-sm-8'>
                    <div class='card text-center'>
                        <div class='card-header bg-primary text-white'>
                            <h3 class='card-title'>".$ertek[2]."</h3>
                        </div>
                        <div class='card-body'>
                            <h5 class='card-title'><i>".$ertek[1]." </i>-ra jentkezett</h5>
                            <p class='card-text'>Az adatok:</p>
                            <p class='card-text'>Telefonszám:<b> ".$ertek[3]."</b></p>
                            <p class='card-text'>Email cím:<b> ".$ertek[4]."</b></p>
                            <p class='card-text'><b>Egyéb információ, ha van:</b></p>
                            <p class='card-text'> ".$ertek[7]."</p>
                          
                            </form>
                            </div>
                        <div class='card-footer text-muted'>
                        <p style='font-size:larger;' class='card-text'>Dátum:<b> ".$ertek[5]." </b></p>
                        <p class='card-text'>Időpont:<b> ".$ertek[6]."</b> </p>

                            
                        </div>
                        <a class='py-3' href='foglalasaim.php?username=".$_SESSION['user']."'>vissza az előző oldalra</a>

                    </div>
                
                </div>
                <div class='col-sm-2'></div>
            </div>
            </div>";
        }

}

if(isset($_POST['userModosit'])){
    if(isset($_GET['kezelesID'])){
        $kezeles_id=$_GET['kezelesID'];

        $kezeles=$_POST['kezeles'];
        $name=$_POST['name'];
        $telefon=$_POST['telefon'];
        $email=$_POST['email'];
        $date=$_POST['date'];
        $timeslot=$_POST['timeslot'];
        $megjegyzes=$_POST['megjegyzes'];

    
        $msg=$modositos->userModosit($kezeles_id,$kezeles,$name,$telefon,$email,$date,$timeslot,$megjegyzes);      

    }

}
?>
<div class="container pt-5">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
        <h4 class="text-center  lila py-3 text-white">A kezelés módosítása:</h4>
        <span class="d-block text-center"><?php echo $msg; ?></span>
        <p class="text-secondary text-center mt-3"><i>*Az összes adat újbóli megadása kötelező!</i></p>

            <form method="post" action="" class="form-group">
                <label for="">Név *</label>
                <input required name="name" type="text" class="form-control mb-2">
                <label for="">Telefon *</label>
                <input required name="telefon" type="text" class="form-control mb-2">
                <label for="">Email *</label>
                <input required name="email"  type="email" class="form-control mb-2">
                <label  for="">Dátum *</label>
                <input required name="date" type="date" class="form-control mb-2">
                <label for="">Kezelés fajtája *</label>
                <select name="kezeles" id="" class="form-control mb-2">
                    <option value="Aroma terápia">Aroma terápiás kezelés</option>
                    <option value="Mélyszövet, köpöllyel">Mélyszövetes celulit masszázs köpölyözéssel</option>
                    <option value="Mézes mélyszövet masszázs">Mézes mélyszövet masszázs</option>
                    <option value="Talp masszázs">Talp masszázs</option>
                    <option value="Arc masszázs">Arc masszázs</option>
                    <option value="Relaxáló masszázs">Relaxálós frissítő masszázs</option>
                </select>
                <label for="">Kezelés időpontja * </label>
                <select name="timeslot" id="" class="form-control mb-2">
                    <option value="08:00-tól - 09:00-ig">08:00-tól - 09:00-ig</option>
                    <option value="09:00-tól - 10:00-ig">09:00-tól - 10:00-ig</option>
                    <option value="10:00-tól - 11:00-ig">10:00-tól - 11:00-ig</option>
                    <option value="11:00-tól - 12:00-ig">11:00-tól - 12:00-ig</option>
                    <option value="12:00-tól - 13:00-ig">12:00-tól - 13:00-ig</option>
                    <option value="13:00-tól - 14:00-ig">13:00-tól - 14:00-ig</option>
                    <option value="14:00-tól - 15:00-ig">14:00-tól - 15:00-ig</option>
                    <option value="15:00-tól - 16:00-ig">15:00-tól - 16:00-ig</option>
                </select>
                <label for="">Megjegyzés <i><small>(nem kötelező)</i></small></label>
                <textarea name="megjegyzes" id="" cols="30" rows="2" placeholder="Megjegyzés" class="form-control mb-2"></textarea>
                <button class="btn btn-outline-secondary" name="userModosit" type="submit"> Módosítom!</button>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
<?php




require "footer.php"; ?>