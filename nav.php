<?php 
if($_SESSION['logged']){
$msg="";
?>
<!-- _______________BELOGOLT ÁLLAPOT________________________  -->

<div id="navbar">
    <form action="" method="POST">
    <div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-times"></i></a>
        <ins><h4 class="font ml-4"><?php echo "Üdvözöllek ".$_SESSION['user']."!"; ?></h4></ins>
          <a href="adataim.php?username=<?php echo $_SESSION['user']; ?>"><i class="fas fa-info-circle"></i> Adataim</a>
          <a href="foglalasaim.php?username=<?php echo $_SESSION['user']; ?>"><i class="fas fa-calendar"></i> Foglalásaim</a>
          <button class="text-center" id="logoutgomb" name="logout" type="submit"><i class="fas fa-times-circle"></i>  Kijelentkezés</button>
        </div>
      <a class="openbtn" onclick="openNav()" id="logo"><i class="fas fa-spa mr-2"></i><?php echo "Üdvözöllek ".$_SESSION['user']."!"; ?></a>
      <div id="navbar-left">
      </div>
      <div id="navbar-right">
        <a href="index.php">Kezdőoldal</a>
        <a href="rolam.php">Rólam</a>
        <a href="kezeles.php">Kezelések</a>
        <a href="arlista.php">Árlista</a>
        <a href="jelentkezes.php?username=<?php echo $_SESSION['user']; ?>">Jelentkezek</a>
        <a href="kapcsolat.php">Kapcsolat</a>
      </div>
  </form>
</div>


<?php } else{
        $_SESSION['user']="";
      ?>

              <!-- _____________________________KILOGOLT ÁLLAPOT_________________________-->


<div id="navbar">
    <form action="" method="post">
        <a href="index.php" id="logo"><i class="fas fa-spa mr-2"></i> Pötyi Masszázs</a>
        <div id="navbar-left">
              <a href="login.inc.php">Belépés</a>
              <a href="reg.inc.php">Regisztráció</a>
        </div>
        <div id="navbar-right">
          <a href="index.php">Kezdőoldal</a>
          <a href="rolam.php">Rólam</a>
          <a href="kezeles.php">Kezelések</a>
          <a href="arlista.php">Árlista</a>
          <a href="jelentkezes.php">Jelentkezek</a>
          <a href="kapcsolat.php">Kapcsolat</a>
        </div>
    </form>
</div>

<?php } 
  if(isset($_POST['logout'])){
    unset($_SESSION['logged']);
    $_SESSION['logged']=false;
    header("Location:index.php");
  }

?>


