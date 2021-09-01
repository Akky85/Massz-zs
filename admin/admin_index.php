<?php 

require "admin_sql.php";

$csatlakozas = new Sql();
$msg="";

if(isset($_POST['idopont'])){
    $date=$_POST['idopont'];
} else{
    $t=time();
    $date=date("Y-m-d",$t);
}

?>
<?php require "admin_header.php" ?>
<div class="lentebb tablazat container">
    <div class="row">  
        <div class="col-sm-4">
            <table class="table table striped text-center table-lg">
                <tr>
                    <td><form action="" method="post"><button name="muti" class="btn btn-primary btn-sm form-control" type="submit">Megnézem!</button></form></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Regisztrált felhasználók száma:</td>
                    <td>Hírlevélre várók száma</td>
                        
                <tr>
                    <td>
                        <?php 
                        if(isset($_POST["muti"])){

                            $adat=$csatlakozas->felhasznalok_szama();

                        }   
                    ?> 
                    </td>
                    <td>
                    <?php 
                        if(isset($_POST["muti"])){

                            $adat=$csatlakozas->hirlevelre_jelentkezettek_szama();

                        }   
                    ?>
                    </td>
                </tr>
            </table>
               
        </div>
        <div class="col-sm-8">

            <form action="" method="POST">
                
            <h5 class="text-center">Kezelések erre a napra:</h5>
            <div class="input-group mb-3">
                <input name="idopont" type="date" class="form-control" aria-describedby="basic-addon2">
                <div class="input-group-append">
                <button name="mutika" class="btn btn-outline-primary" type="submit">Megnéz</button>             
                </div>
            </div>
            <h5 class="text-center text-primary"><?php if(!empty($date)){echo $date;} ?></h5>
            <table class="table-striped">
                <?php 
                    if(isset($_POST["mutika"])){
                    $date=$_POST['idopont'];
                    $adat=$csatlakozas->kezelesre_idorendben($date);
                    foreach($adat as $a =>$ertek){
                        echo"
                    <tr class='text-center'>
                        <td><b> ".$ertek[6]."</b></td>
                        <td>".$ertek[1]."</td>
                        <td>".$ertek[2]."</td>
                        <td> <a href='personal.php?userid=".$ertek[0]."' >Részletek</a><td>
                    </tr>";              
                    }
                    }
                      
                ?>
            </table>
          </form>  
        </div>
    </div>      
    <div class="row justify-content-center mt-5">
        <div class="col-sm-12 "> 
            <form action="" method="post">
                <div class="btn-group " role="group">
                    <button name="megnez" type="submit" class="btn btn-secondary  btn-group ">Kilistázás sorszám szerint (összes, legújabb elöl)</button>
                    <button name="datumos" type="submit" class="btn btn-secondary  btn-group ">Dátum szerint (összes, legkésőbbi elöl)</button>
                    <button name="fel" type="submit" class="btn btn-secondary  btn-group ">Név szerint rendezés (ABC)</button>
                    <button name="kezelesek" type="submit" class="btn btn-secondary btn-group ">Kilistázás kezelésenként (ABC)</button>
                    <button name="muta" type="submit" class="btn btn-secondary  btn-group">Hírlevélre feliratkozás (növekvő sorban) </button>
                </div>
            </form>
        
        <table class="table table-striped table-sm mt-3 adminos">
            
    <?php 
 /*____________________________Összes kilistáz, későbbi elöl__________________*/    
        if(isset($_POST["megnez"])){
        $adat=$csatlakozas->kilistaz();
        foreach($adat as $a =>$ertek){
            echo"
           <tr class='text-center'>
                <td class='adminos1'> ".$ertek[0]." </td>
                <td class='adminos2 text-secondary nagyit'> ".$ertek[5]."</td> 
                <td class='adminos2 text-primary nagyit'> ".$ertek[6]."</td>
                <td class='adminos3'><b>".$ertek[2]."</b></td>
                <td class='adminos2'><i>Regisztrált becenév:</i><br>  ".$ertek[8]."</td>                      
            </tr>
            <tr class='text-center ' id='lejjebb'>                                               
                <td class='adminos2 text-primary'>".$ertek[1]."</td>         
                <td class='adminos2'> ".$ertek[3]."</td>
                <td class='adminos2'>".$ertek[4]."</td>


                <td class='adminos3'><i style='font-size: smaller;'>A kezeléshez hozzáfűzött megjegyzés:</i><br>  ".$ertek[7]."</td>
                
                <td class='adminos1'> <a href='personal.php?userid=".$ertek[0]."'>Részletek</a><td>
            </tr>";
        
        }
        }   
/*_________________________Felhasználók szerint ABC sorrendben_________________*/ 
        if(isset($_POST["fel"])){
            $adat=$csatlakozas->felhasznalokABC();
                foreach($adat as $a =>$ertek){
                    echo"
           <tr class='text-center'>
                <td class='adminos2 mono'><b>".$ertek[2]."</b></td>
                <td class='adminos2'><i>Regisztrált becenév:</i><br> <b> ".$ertek[8]."</b></td> 
                <td class='adminos3'>".$ertek[1]." </td>
                <td class='adminos2 text-secondary nagyit'> ".$ertek[5]."</td> 
                <td class='adminos2 text-primary nagyit'> ".$ertek[6]."</td>
                     
            </tr>
            <tr class='text-center ' id='lejjebb'>                                               
                <td class='adminos2 text-primary'>sorszám: ".$ertek[0]."</td>         
                <td class='adminos2'> ".$ertek[3]."</td>
                <td class='adminos2'>".$ertek[4]."</td>


                <td class='adminos3'><i style='font-size: smaller;'>A kezeléshez hozzáfűzött megjegyzés:</i><br>  ".$ertek[7]."</td>
                
                <td class='adminos1'> <a href='personal.php?userid=".$ertek[0]."'>Részletek</a><td>
            </tr>";
                
            
            }
            }   
/**_________________________kezelésenkénti kilistázás__________________ */
            if(isset($_POST["kezelesek"])){
                $adat=$csatlakozas->kezelesABC();
                foreach($adat as $a =>$ertek){
                    echo"
           <tr class='text-center'>
                <td  class='adminos2 mono'>".$ertek[1]." </td>
                <td class='adminos2 text-secondary nagyit'> ".$ertek[5]."</td> 
                <td class='adminos2 text-primary nagyit'> ".$ertek[6]."</td>
                <td class='adminos2'><b>".$ertek[2]."</b></td>
                <td class='adminos2'><i>Regisztrált becenév:</i><br>  ".$ertek[8]."</td>                      
            </tr>
            <tr class='text-center ' id='lejjebb'>                                               
                <td class='adminos2 text-primary'>sorszám: ".$ertek[0]."</td>         
                <td class='adminos2'> ".$ertek[3]."</td>
                <td class='adminos2'>".$ertek[4]."</td>


                <td class='adminos3'><i style='font-size: smaller;'>A kezeléshez hozzáfűzött megjegyzés:</i><br>  ".$ertek[7]."</td>
                
                <td class='adminos1'> <a href='personal.php?userid=".$ertek[0]."'>Részletek</a><td>
            </tr>";
                
                }
                }   
/*____________________hírleveles sorban_____________________*/

            if(isset($_POST["muta"])){
                $adat=$csatlakozas->email_kilistaz();
                foreach($adat as $a =>$ertek){
                    echo"
                    <tr class='text-center'>
                         <td class='adminos1'>".$ertek[0]." </td>
                         <td class='adminos3 text-secondary nagyit'> ".$ertek[1]."</td> 
                         <td class='adminos3 text-primary nagyit'> ".$ertek[2]."</td>
                         <td class='adminos2'></td>
                        
                     </tr>";
                
                }
            }   
 
/**____________________Dátumszerint összes kilistáz_____________ */
        if(isset($_POST["datumos"])){
            $adat=$csatlakozas->kilistazDatumos();
            foreach($adat as $a =>$ertek){
                echo"
            <tr class='text-center'>
                    <td class='adminos2 text-secondary nagyit'> ".$ertek[5]."</td> 
                    <td class='adminos2 text-primary nagyit'> ".$ertek[6]."</td> 
                    <td class='adminos2 text-primary'>".$ertek[1]."</td>                               


                    <td class='adminos3'><b>".$ertek[2]."</b></td>
                    <td class='adminos2'><i>Regisztrált becenév:</i><br>  ".$ertek[8]."</td>                      
                </tr>
                <tr class='text-center ' id='lejjebb'>                                               
                    <td  class='adminos1'>sorszám: ".$ertek[0]." </td>        
                    <td class='adminos2'> ".$ertek[3]."</td>
                    <td class='adminos2'>".$ertek[4]."</td>


                    <td class='adminos3'><i style='font-size: smaller;'>A kezeléshez hozzáfűzött megjegyzés:</i><br>  ".$ertek[7]."</td>
                    
                    <td class='adminos1'> <a href='personal.php?userid=".$ertek[0]."'>Részletek</a><td>
                </tr>";
            
            }
            }   
        ?>      
        </table>         
        </div>
    </div>
</div>


<?php require "admin_footer.php" ?>