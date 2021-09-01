<?php 

require "admin_sql.php";

$csatlakozas = new Sql();
$msg="";


if(isset($_POST["manualisan_beletesz"])){

    if(isset($_GET['username'])){
        $user_id=$_GET['username'];
   
    $kezeles = $_POST['kezeles'];
    $name = $_POST['name'];
    $telefon = $_POST['telefon'];
    $date = $_POST['date'];       
    $email = $_POST['email'];
    $timeslot = $_POST['timeslot'];
    $megjegyzes = $_POST['megjegyzes'];


    $msg=$csatlakozas->beletesz($kezeles, $name, $telefon, $email, $date, $timeslot, $megjegyzes, $user_id);
    }
}
 
?>
<?php require "admin_header.php" ?>

<div class="kartya container py-5">
    <div class="row">
        <div class="col-sm-6">

        <span><?php if(!empty($msg)){echo $msg;} ?></span>
            <form method="post" action="" class="form-group">
                <label for="">Név</label>
                <input required name="name" type="text" class="form-control mb-2">
                <label for="">Telefon</label>
                <input name="telefon" type="text" class="form-control mb-2">
                <label for="">Email</label>
                <input name="email"  type="email" class="form-control mb-2">
                <label  for="">Dátum</label>
                <input required name="date" type="date" class="form-control mb-2">
                <select name="kezeles" id="" class="form-control mb-2">
                    <option value="Aroma terápia">Aroma terápiás kezelés</option>
                    <option value="Mélyszövet, köpöllyel">Mélyszövetes celulit masszázs köpölyözéssel</option>
                    <option value="Mézes mélyszövet masszázs">Mézes mélyszövet masszázs</option>
                    <option value="Talp masszázs">Talp masszázs</option>
                    <option value="Arc masszázs">Arc masszázs</option>
                    <option value="Relaxáló masszázs">Relaxálós frissítő masszázs</option>
                </select>
                <select required name="timeslot" id="" class="form-control mb-2">
                    <option value="08:00-tól - 09:00-ig">08:00-tól - 09:00-ig</option>
                    <option value="09:00-tól - 10:00-ig">09:00-tól - 10:00-ig</option>
                    <option value="10:00-tól - 11:00-ig">10:00-tól - 11:00-ig</option>
                    <option value="11:00-tól - 12:00-ig">11:00-tól - 12:00-ig</option>
                    <option value="12:00-tól - 13:00-ig">12:00-tól - 13:00-ig</option>
                    <option value="13:00-tól - 14:00-ig">13:00-tól - 14:00-ig</option>
                    <option value="14:00-tól - 15:00-ig">14:00-tól - 15:00-ig</option>
                    <option value="15:00-tól - 16:00-ig">15:00-tól - 16:00-ig</option>
                </select>
                <textarea name="megjegyzes" id="" cols="30" rows="2" placeholder="Megjegyzés" class="form-control mb-2"></textarea>
                <button class="btn btn-secondary" name="manualisan_beletesz" type="submit"> Feltölt</button>
            </form>
        </div>
        <div class="col-sm-6">
            <?php
            if(isset($_POST["manualisan_beletesz"])){
                $kezeles = $_POST['kezeles'];
                $name = $_POST['name'];
                $telefon = $_POST['telefon'];
                $date = $_POST['date'];       
                $email = $_POST['email'];
                $timeslot = $_POST['timeslot'];
                $megjegyzes = $_POST['megjegyzes'];

                echo " <div class='card text-center'>
                <div class='card-header bg-primary text-white'>
                <h6 class'card-title'>Sikeres eseményfelvétel</h6>
                <h5 class='card-title'><b>".$name." </b></h5> 
                <h6>részére</h6>
                </div>
                <div class='card-body'>
                    <h5 class='card-title'>".$kezeles."</h5>
                    <p class='card-text'><i>Az adatok:</i></p>
                    <p><i class='fas fa-spa mr-2'></i></p>
                    <p class='card-text'>Telefonszám: <b>".$telefon."</b></p>

                    <p class='card-text'>Email cím: <b>".$email."</b></p>

                    <p class='card-text'><i>Egyébb fontosabb megjegyzés, ha van:</i></p>
                    <p class='card-text'><b>".$megjegyzes."</b></p>

                </div>
                <div class='card-footer text-muted'>
                <p class='card-text'> Kezelés dátuma: <b>".$date."</b></p>
                <p class='card-text'> Kezelés időpontja: <b>".$timeslot."</b></p>
                </div>
            </div>";}
            ?>
           
        </div>
    </div>
</div>



<?php require "admin_footer.php" ?>