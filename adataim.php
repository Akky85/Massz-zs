<?php 

require "header.php" ;
require "nav.php";
?>
<?php require "class/masszazs.php"; ?>

<div class="container-fluid bg-light pb-5 mt-5 lentebb">
  <div class="row bg-secondary mb-5">
    <div class="col-sm-12">
    <strong><h2 class="text-center text-light py-3 ptty"><?php echo "Szia ".$_SESSION["user"]."! "; ?></h2></strong>
    </div>
  </div>

    <div class="row justify-content-center">
      <div class="tovabbi" class="col-sm-3 ">
        <h4 >További lehetőségek</h4>
        <ul>
          <li><a href="#"><i class="far fa-id-card"></i> Személyes adatok</a></li>
          <li><a href="#"><i class="fas fa-unlock-alt"></i> Jelszóváltoztatás</a></li>
          <li><a href="#"><i class="fas fa-newspaper"></i> Számlázási cím</a></li>
          <li><a href="#"><i class="fas fa-pencil-alt"></i> Feliratkozások</a></li>
          <li><a href="#"><i class="fab fa-amazon-pay"></i> Fizetési lehetőségek</a></li>
          <li><a href="#"><i class="fas fa-user-cog"></i> Adatvédelem</a></li>
        </ul>
      </div>

      <div class="col-sm-1"></div>

      <div class="col-sm-5">
          <h4 class="text-center">Fiókod adatai:</h4>
              <table class="table">
                  <tr>
                      <td>Felhasználónév</td>
                      <td><?php echo $_SESSION['user']; ?></td>
                  </tr>
                  <tr>
                      <td>Email cím</td>
                      <td>
                    <?php  
                      $adataim=new Masszazs();
                      $nev = $_SESSION["user"];
                      $adat=$adataim->adatokKiir($nev);
                        
                          
                      ?>

                
                      
                      </td>
                  </tr>
                  <?php
                  $msg="";
                  if(isset($_POST['valtoztat'])){

                        $username=$_POST['username'];
                        $email=$_POST['email'];
                        $password=$_POST['pwd'];


                        $msg=$adataim->mod($username,$email,$password);
                  
                  }
                  ?>
              </table>
        <h5 class="text-center mt-5">Fiók adatok módosítása:</h5>
        <span class="text-center"><?php if(!empty($msg)){echo $msg;} ?></span>
        <form action="" method="POST" class="form-group mt-3">

            <label for="" >Felhasználónév</label>
            <input name="username" type="text" class="form-control mb-3" required>

            <label for="" >Email</label>
            <input name="email" type="email" class="form-control mb-3" required>

            <label for="" >Add meg a jelszavad a módosítások hitelesítéséhez:</label>
            <input name="pwd" type="password" class="form-control mb-3" required>

            <button name="#valtoztat" class="btn btn-warning justify-content-end mt-3" type="submit">Változtatni szeretnék</button>
        </form>      
      </div>

      <div class="col-sm-3">
        <img style="height: 400px;" class="img-fluid img-thumbnail mx-auto d-block" src="IMG/stone-1.jpg" alt="">
      </div>   
  </div>  
</div>


<?php require "footer.php"; ?>