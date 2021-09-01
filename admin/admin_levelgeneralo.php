<?php 
require "admin_header.php";
require "admin_sql.php";
 
require "PHPMailer/Exception.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$msg = '';

if(isset($_POST["send"])){

    //Szerver beállítása
    try{

    
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = $_POST["senderAddress"];
    $mail->Password = $_POST["pwd"];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->CharSet = "UTF-8";

    //Kitől menjen az email és kinek és milyen csatománnyal
    $mail->setFrom($_POST["senderAddress"]);
    $mail->addAddress($_POST["address"]);

    /*$mail->addReplyTo("info@example.com", "Info");
    $mail->addCC("cc@example.com");
    $mail->addBCC("bcc@example.com");
    */

    $mail->addAttachment("IMG/relaxkocka.jpg","kep.jpg");

    //Szöveges rész - content

    $mail->isHTML(true);
    $mail->Subject = $_POST["subject"];
    $mail->Body = nl2br($_POST["body"]);

    $mail->send();
    $msg = "<h3>Levél sikeresen elküldve!</h3>";
}
catch(Exception $e){

    $msg = "<h3>Levélküldés sikertelen!</h3> <p>Üzenet: ".$mail->ErrorInfo."</p>";
}
}



?>

<div class="tablazat container">
    <div class="row justify-content-center">
        <div class="col-sm-4">
           <form action="" method="post">
                <button name="kilistaz" type="submit" class="btn btn-light form-control my-3">Az összes kiválasztása!</button>
                 <div class="text-center" my-3">
                <?php
                $csatlakozas = new Sql();
                if(isset($_POST['kilistaz'])){
                    $adat=$csatlakozas->email_kilistaz();
                    foreach($adat as $a =>$ertek){
                        echo" <p><b>".$ertek[1]."</b> , ".$ertek[2]."</p>";
                }}
                ?>            
               </div>
                
            </form>
        </div>
        <div class="col-sm-8">
            <form action="" method="" class="form-group">
                <h3 class="vilagos py-3 text-center text-white mono">Levélküldés</h3>
                <span class="text-center d-block mb-3"><?php if(!empty($msg)){echo $msg;} ?></span>

                <label for=""><b>A feladó adatai:</b></label>
                <input name="senderAddress" type="email"  class="form-control my-3" placeholder="Feladó email címe" required>
                <input name="senderName" type="email" id="" class="form-control" placeholder="feladó neve" required>
                <div class="input-group mt-3 mb-5">
                    <span class="input-group-text bg-primary text-white" id="basic-addon1">Email fiókod jelszava</span>
                    <input name="pwd" type="password" class="form-control"  aria-describedby="basic-addon1">
                </div>
                
               <label for=""><b>A címzett adatai:</b></label>
                <input name="address" type="email" id="" class="form-control my-3" placeholder="címzett email címe" required>   
                <input name="subject" type="text" class="form-control" placeholder="tárgy" required>             
                
                <textarea name="body" id="" cols="30" rows="10" placeholder="Az üzenet" class="form-control my-3" required></textarea>
                
                <input name="file" type="file" id="" class="form-control my-3">
                
                <button name="send" type="button" class="btn btn-outline-primary" class="form-control my-3">Elküldés</button>
            
            </form>
        </div>
    </div>
</div>

<?php require "admin_footer.php" ?>