<?php 
require "admin_header.php";
require "admin_sql.php";

$personal = new Sql();

if(isset($_GET['userid'])){
    $userid=$_GET['userid'];

    $adat=$personal->kilistaz_reszletesen($userid);
        foreach($adat as $a =>$ertek){
           
            echo"
            <div class='container kartya'>
            <div class='row'>
                <div class='col-sm-2'></div>
                <div class='col-sm-8'>
                    <div class='card text-center'>
                        <div class='card-header bg-primary text-white'>
                            <h4 class='card-title'>".$ertek[2]."</h4>
                        </div>
                        <div class='card-body'>
                            <h5 class='card-title'>".$ertek[1]." -ra jentkezett</h5>
                            <p class='card-text'>Az adatai:</p>
                            <p class='card-text'>Telefonszáma:<b> ".$ertek[3]."</b></p>
                            <p class='card-text'>Email címe:<b> ".$ertek[4]."</b></p>
                            <p class='card-text'><b>Egyéb információ, ha van:</b></p>
                            <p class='card-text'> ".$ertek[7]."</p>
                          
                            </form>
                            </div>
                        <div class='card-footer text-muted'>
                        <p class='card-text'>Dátum:<b> ".$ertek[5]." </b></p>
                        <p class='card-text'>Időpont:<b> ".$ertek[6]."</b> </p>

                            
                        </div>
                        <a href='admin_index.php'>vissza az előző oldalra</a>
                    </div>
                
                </div>
                <div class='col-sm-2'></div>
            </div>
            </div>";
        }

}

?>




       






<?php 
require "admin_footer.php";
?>