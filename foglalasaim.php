<?php 

require "header.php" ;
require "nav.php";
?>
<?php require "class/masszazs.php"; ?>
<div class="container lentebb">
<div class="row justify-content-center">
    <div class="col-sm-12">
      <h2 class="text-center py-5 lila font text-white"><?php echo $_SESSION["user"].", eddigi foglalt kezeléseid"; ?></h2>
      <table class="table table-striped text-center">
        <thead>
          <tr >
              <th style="width: 25%;">Mikor</th>
              <th style="width: 25%;">Időpont</th>
              <th style="width: 25%;">Kezelésforma</th>
              <th style="width: 13%;"></th>
              <th style="width: 12%;"></th>
            </tr>
        </thead>
        <tbody>
        <?php
            $le=new Masszazs();
            if(isset($_GET['username'])){
              $nev=$_GET['username'];
           

            $adat=$le->kilistazSpec($nev);
              foreach($adat as $a =>$ertek){
                  echo"
                    <tr>
                      <td>".$ertek[5]."</td>
                      <td>".$ertek[6]."</td>
                      <td> ".$ertek[1]."</td>
                      <td> <a href='personal.php?kezelesID=".$ertek[0]."' class='btn  btn-primary btn-sm'>Módosít</a><td>
                      <td><a href='torlendo_kezeles.php?kezelesID=".$ertek[0]."' class='btn  btn-secondary btn-sm'>Töröl</a</td>
                    </tr>
                  ";
                    
                }     
            }  
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php require "footer.php" ?>