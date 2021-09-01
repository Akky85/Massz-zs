<?php 
require "header.php";
require "nav.php";
require "class/masszazs.php";
$modositos = new Masszazs();
$msg="";

if(isset($_POST['torles'])){
    if(isset($_GET['kezelesID'])){
        $kezeles_id=$_GET['kezelesID'];

        $msg=$modositos->kezelesTorlese($kezeles_id);
    }
}
?>

<div class="container lentebb text-center">
    <div class="row ">
        <div class="col-sm-12 justify-content-center">
           <form action="" method="POST">
           <h4 class="text-center"><i>Biztos hogy törölni szeretnéd ezt a kezelést?</i></h4>
            <button name="torles" type="submit" class="btn btn-secondary btn-lg my-3">Igen! Törlés!</button><br>
            <a class="" href="foglalasaim.php?username=<?php echo $_SESSION['user'];?>">Vissza az előző oldalra</a>
           </form>
        </div>
    </div>
</div>

<div class="container ">
    <div class="row">
        <div class="col-sm-12 text-center my-5">
            <span class="d-block"><?php echo $msg; ?></span>
        </div>
    </div>
</div>

<?php

if(isset($_GET['kezelesID'])){
    $userid=$_GET['kezelesID'];

    $adat=$modositos->kezelesekKilistazasa($userid);
        foreach($adat as $a =>$ertek){
           
            echo"
            <div class='container kartya py-5'>
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


                    </div>
                
                </div>
                <div class='col-sm-2'></div>
            </div>
            </div>";
        }

}

?>

<?php




require "footer.php"; ?>