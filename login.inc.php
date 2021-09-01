<?php
require "header.php";

    $_SESSION["logged"]=false;
    
    require "class/user.php";
    $user= new User();
    $msg="";

    if(isset($_POST["login"])){
        $username=$_POST["username"];
        $password=$_POST["password"];

        try{
            $user->login($username,$password);

        }catch(Exception $e){
            $msg=$e->getMessage();
        }
    }

?>

<div class="container mt-5">
    <div class="row justify-content-center text-center">
        <div class="col-sm-12 ">
            <h4 class="ptty text-center p-5">Üdvözöllek!</h4>
        </div>
    </div>
    <div class="pritty row justify-content-center">
         <div class="col-sm-6"><img class="rounded-circle mx-auto d-block img-fluid" src="IMG/aromakocka.jpg" alt=""></div>
        <div class="col-sm-6">
            <form action="" method="post" class="form-group p-5 text-center">

                <span class="d-block"><?php if(!empty($msg)){echo $msg;} ?></span>
                
                <label for="">Felhasználónév</label>
                <input type="text" name="username" class="form-control mb-3">

                <label for="">Jelszó</label>
                <input type="password" name="password" class="form-control mb-3">

                <button type="submit" name="login" class="btn btn-success my-3">Bejelentkezés</button>
                <br>
                <a href="reg.inc.php">Még nem regisztráltam</a>

            </form>
        </div>
    </div>
</div>
<script>
</script>
<script src="scriptek.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

