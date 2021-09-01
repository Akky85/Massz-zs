
<?php 

$_SESSION["logged"]=false;
require "header.php";

?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12 ">
                <h4 class="ptty text-center p-5">Üdvözöllek!</h4>
            </div>
        </div>
        <div class="pritty row justify-content-center">
            <div class="col-sm-6"><img class="rounded-circle mx-auto d-block img-fluid" src="IMG/aromakocka.jpg" alt=""></div>
            <div class="col-sm-6 justify-content-center text-center">
                <form action="" method="post" class="form-group text-center p-5">

                    <span class="d-block"><?php if(!empty($msg)){echo $msg;} ?></span>

                    <label for="">Felhasználónév</label>
                    <input name="username" type="text" class="form-control mb-3">
                    
                    <label for="">E-mail </label>
                    <input name="email" type="email" class="form-control mb-3">
                    
                    <label for="">Jelszó </label>
                    <input name="password1" type="password"class="form-control mb-3">
                    
                    <label for="">Jelszó mégegyszer </label>
                    <input name="password2" type="password" class="form-control mb-3">
                    
                    <button name="reg" type="submit" class="btn btn-primary mb-2 mt-3">Regisztráció</button><br>
                    <a href='login.inc.php' >Bocsika, már regisztráltam</a>


                </form>
            </div>

        </div>
    </div>
   
<script src="scriptek.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
require_once "class/user.php";
   $user= new User();
   $msg="";


   if(isset($_POST["reg"])){
       $username=$_POST["username"];
       $email=$_POST["email"];
       $password1=$_POST["password1"];
       $password2=$_POST["password2"];

       $msg=$user->reg($username,$password1,$password2,$email);
   }
?>