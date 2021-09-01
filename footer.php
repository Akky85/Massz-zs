<?php


$hir= new Masszazs();
$msg="";

if(isset($_POST["hirgomb"])){

    $hirname=$_POST["hirname"];
    $hiremail=$_POST["hiremail"];


    $msg=$hir->hirlevelre_feliratkoz($hirname,$hiremail);
}
?>

<div class="vilagos container-fluid justify-content-center text-center mt-5 py-5 ">
    <a class="footerfoglalos" href="jelentkezes.php?username=<?php echo $_SESSION['user']; ?>"><p class="nagyobb"><i class="fas fa-calendar-alt mr-2"></i>  Foglalj időpontot online! </p></a>
    <p class="nagyobb text-dark"><i class="fas fa-phone-alt mr-2"></i>Vagy telefonon: +36 234 56 76</p>
</div>
<div class="lila container-fluid py-5">
    <div class="row justify-content-center">
        <h2 class="ptty text-white">Kapcsolat</h2>
    </div>
</div>
<footer>
  <div class="lila container-fluid pb-5 text-white">
    <div class="row justify-content-center">
    <div class="col-sm-1"></div>
        <div class="col-sm-3">
          <h4 class="font text-white text-center">Írj nekem!</h4>
          <hr>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus quam laudantium reiciendis pariatur dolorum mollitia molestiae assumenda omnis accusamus atque.</p>
          <p class="text-center">
              <a class="social_icons" href="https://www.facebook.com/"><i class="fab fa-facebook-messenger fa-2x mr-2"></i></a> 
              <a class="social_icons" href="https://www.facebook.com/"><i class="fab fa-facebook fa-2x mr-2"></i></a> 
              <a class="social_icons" href="https://www.instagram.com/"><i class="fab fa-instagram fa-2x mr-2"></i></a> 
              <a class="social_icons" href="https://twitter.com/?lang=hu"><i class="fab fa-twitter fa-2x mr-2"></i></a>
              <a class="social_icons" href="https://hu.pinterest.com/"><i class="fab fa-pinterest fa-2x mr-2"></i></a>
            </p>
        </div>
        <div class="col-sm-4">
          <!--
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2694.353475252329!2d21.64611975138607!3d47.52198090171044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47470e7cf1590519%3A0xf00a3eb4b6937ab3!2sChili%20Fitness%20Debrecen!5e0!3m2!1shu!2shu!4v1609078741723!5m2!1shu!2shu" width="500" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" ></iframe>
        -->
            <!--responzív térkép-->
            <div class="card">
              <div class="card-header">
                <h5 class="card-text text-center text-dark font">Itt megtalálsz</h5>
              </div>
              <div class="card-body text-center lila">
                <!--Google map-->
                <div id="map-container-google-9" class="z-depth-1-half map-container-5" style="height: 300px">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2694.353475252329!2d21.64611975138607!3d47.52198090171044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47470e7cf1590519%3A0xf00a3eb4b6937ab3!2sChili%20Fitness%20Debrecen!5e0!3m2!1shu!2shu!4v1609078741723!5m2!1shu!2shu" frameborder="0"
                    style="border:0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
        </div>

        <div class="col-sm-3">
          <h4 class="font text-white text-center">Iratkozz fel!</h4>
          <span class="text-center d-block"><?php echo $msg; ?></span>
          <hr>
          <p>Iratkozz fel, ha szeretnél értesítéseket kapni aktuális ajánlataimról, akcióimról, blog bejegyzéseimről.</p>
         <form action="" method="POST" class="form-group">
         <input name="hirname" class="form-control my-2" type="text" placeholder="Neved..">
          <input name="hiremail" class="form-control my-2" type="email" placeholder="az email-címed..">
          <button name="hirgomb" class="btn btn-primary footerfoglalos">Feliratkozok!</button>

         </form>
        </div>
        <div class="col-sm-1"></div>
    </div>
  </div>
  <div class="lila container-fluid justify-content-center text-center text-white pt-5 pb-2">
    <div class="col-sm-12">
      <p><small>Copyright © 2020 Akky theme. All Rights Reserved.</small></p>
    </div>
  </div>
</footer>

<script src="scriptek.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

