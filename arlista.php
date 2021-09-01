<?php  

require "header.php"; 
require "nav.php"; 
?>
<?php require "class/masszazs.php"; ?>
<!--
<div class="container-fluid lentebb">
<div class="row justify-content-center">
    <h2 class="ptty text-center mb-5">Árlistám</h2>
</div>
        <div class="col-sm-12 ">
            <table class="table table-striped">
                <thead>
                    <tr id="arcim">
                        <td></td>
                        <td class="bg-secondary text-white text-center">Aroma terápiás kezelés</td>
                        <td>Mélyszövetes celulit masszázs, köpölyözéssel</td>
                        <td class="bg-secondary text-white text-center">Mézes meélyszövet masszázs</td>
                        <td>Talp masszázs</td>
                        <td class="bg-secondary text-white text-center">Arc masszázs</td>
                        <td>Relaxáló frissítő masszázs</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>Kezelés időtartama:</td>
                        <td class="bg-secondary text-white text-center">50 perc</td>
                        <td>45 perc</td>
                        <td class="bg-secondary text-white text-center">30perc</td>
                        <td>30perc</td>
                        <td class="bg-secondary text-white text-center">50 perc</td>
                        <td>50 perc</td>
                    </tr>
                    <tr>
                        <td>Rövid leírás:</td>
                        <td class="bg-secondary text-white ">Az illóolajok hatással vannak az érzelmekre, a hangulatra, enyhítik a fájdalmat és egyéb kellemetlen tüneteket. Az illóolajokról azt tartják, hogy csökkentik a stresszt, fokozzák a keringést és a méreganyagok kiválasztását, csillapítják a duzzanatot.</td>
                        <td>Kis üvegharangokkal masszírozunk, kilazíthatjuk az izmokat, eldolgozhatunk velük mélyebb, kézzel csak nehezen kimasszírozható izom-letapadásokat, csomókat. A köpölyözés során vákuum keletkezik, melynek hatására a kezelt területen a kapilláris erek kitágulnak, fokozott vérbőség alakul ki az adott területen; javul a bőr, az izom, és a kezelt területhez tartozó belső szervek vérellátása, keringése, anyagcseréje. </td>
                        <td class="bg-secondary text-white ">A méz nemcsak kisimítja és finomabbá teszi bőrét, de elsősorban szó szerint kiszívja belőle a méreganyagokat, kitisztítja az elszennyeződött pórusokat és növeli a vérbőséget. A nyirokrendszer szempontjából is nagy jelentősége van a méznek és a mézes masszázsnak, mert beindítja a nyirokáramlást és ezzel segíti a minél több méreganyag eltávozását a szervezetből.</td>
                        <td>Röviden, a talp, a lábfej, valamint a boka környékének a masszírozása.
– meghatározott sorrendben, a különböző szervrendszereink alapján.
A talpmasszírozás az energetika egyik speciális része.</td>
                        <td class="bg-secondary text-white ">20 perces kiegészítő arcmasszázsunk csökkenti a feszültséget, nyugtató, kellemesen relaxáló hatással bír. Az arcizmok átdolgozása által emellett segít a szövetek rugalmasságának, feszességének megtartásában is. Javítja az izmok tápanyag- és oxigénellátását, gyorsítja a kötőszövet élettani folyamatait, fokozza a sejtek, rostok képződését, ezáltal lassítja az öregedést.</td>
                        <td>A frissítő masszázs legalapvetőbb tulajdonsága a lazítás, aminek nem csak az izmokra, ízületekre, inakra van hatása, hanem közvetve a vegetatív idegrendszerre is. Mindezekből következik, hogy például a fezültség okozta fejfájás nagyon gyakran megszüntethető a masszázzsal. </td>
                    </tr>                    
                    <tr id="ar" class="text-center">
                        <td>A kezelés ára:</td>
                        <td class="bg-secondary text-white text-center">5000 Forint</td>
                        <td>7000 Forint</td>
                        <td class="bg-secondary text-white text-center">2500 Forint</td>
                        <td>3000 Forint</td>
                        <td class="bg-secondary text-white text-center">6000 Forint</td>
                        <td>6000 Forint</td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
</div>
-->
<div class="container-fluid vilagos py-3">
<h2 class="ptty text-center mb-5 lentebb">Árlistám</h2>
</div>


<div class="container">
    <div class="row my-5">
<!--aromaterápiás kezelés-->
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <div class="tarto">
                <img src="IMG/aromakocka.jpg"class="img-fluid d-block mx-auto " alt="kezeles1">
                    <div class="overlay">
                        <div class="text">Az illóolajok hatással vannak az érzelmekre, a hangulatra, enyhítik a fájdalmat és egyéb kellemetlen tüneteket. Az illóolajokról azt tartják, hogy csökkentik a stresszt, fokozzák a keringést és a méreganyagok kiválasztását, csillapítják a duzzanatot.</div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Aromaterápiás masszázs</h5>
                    <p class="card-text">A kezelés időtartama: <b>50 perc</b></p>
                    
                    <p class="card-text text-center ar">Ár: <b>5000 Forint</b></p>
                    <a href="jelentkezes.php?username=<?php echo $_SESSION['user']; ?>" class="font ar fog">Foglalok időpontot!</a>
                </div>
            </div>
        </div>
<!--Mélyszövetes celulit masszázs, köpölyözéssel-->
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <div class="tarto">
                <img src="IMG/kopolyozeskocka.jpg"class="img-fluid d-block mx-auto " alt="kezeles1">
                    <div class="overlay">
                        <div class="text">Kis üvegharangokkal masszírozunk, kilazíthatjuk az izmokat, eldolgozhatunk velük mélyebb, kézzel csak nehezen kimasszírozható izom-letapadásokat, csomókat. A köpölyözés során vákuum keletkezik, melynek hatására a kezelt területen a kapilláris erek kitágulnak, fokozott vérbőség alakul ki az adott területen.</div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Mélyszövet masszázs köpölyözéssel</h5>
                    <p class="card-text">A kezelés időtartama: <b>50 perc</b></p>
                    
                    <p class="card-text text-center ar">Ár: <b>7000 Forint</b></p>
                    <a href="jelentkezes.php?username=<?php echo $_SESSION['user']; ?>" class="font ar fog">Foglalok időpontot!</a>
                </div>
            </div>
        </div>
<!--Mézes meélyszövet masszázs-->
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <div class="tarto">
                <img src="IMG/mezeskocka.png"class="img-fluid d-block mx-auto " alt="kezeles1">
                    <div class="overlay">
                        <div class="text">A méz nemcsak kisimítja és finomabbá teszi bőrt, kitisztítja az elszennyeződött pórusokat és növeli a vérbőséget. A nyirokrendszer szempontjából is nagy jelentősége van a mézes masszázsnak, mert beindítja a nyirokáramlást és ezzel segíti a méreganyag távozását a szervezetből.</div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Mézes mélyszövet masszázs</h5>
                    <p class="card-text">A kezelés időtartama: <b>50 perc</b></p>
                    
                    <p class="card-text text-center ar">Ár: <b>5000 Forint</b></p>
                    <a href="jelentkezes.php?username=<?php echo $_SESSION['user']; ?>" class="font ar fog">Foglalok időpontot!</a>
                </div>
            </div>
        </div>

    </div><!--row vége-->
    <div class="row my-5">
<!--Talp masszázs-->
    <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <div class="tarto">
                <img src="IMG/talpkocka.jpg"class="img-fluid d-block mx-auto " alt="kezeles1">
                    <div class="overlay">
                        <div class="text">Röviden, a talp, a lábfej, valamint a boka környékének a masszírozása meghatározott sorrendben, a különböző szervrendszereink alapján. A talpmasszírozás az energetika egyik speciális része. A relaxálás mellett nem elhanyagolandó gyógyító hatása sem!</div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Talpmasszázs</h5>
                    <p class="card-text">A kezelés időtartama: <b>50 perc</b></p>
                    
                    <p class="card-text text-center ar">Ár: <b>5000 Forint</b></p>
                    <a href="jelentkezes.php?username=<?php echo $_SESSION['user']; ?>" class="font ar fog">Foglalok időpontot!</a>
                </div>
            </div>
        </div>
<!--Arcmasszázs-->
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <div class="tarto">
                <img src="IMG/arckocka.jpg"class="img-fluid d-block mx-auto " alt="kezeles1">
                    <div class="overlay">
                        <div class="text">Már 20 perces arcmasszázs csökkenti a feszültséget, nyugtató, kellemesen relaxáló hatása van. Az arcizmok átdolgozása mellett segít a szövetek rugalmasságának, feszességének megtartásában is. Javítja az izmok tápanyag- és oxigénellátását, gyorsítja a kötőszövet élettani folyamatait, fokozza a sejtek, rostok képződését, lassítja az öregedést.</div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Arc masszázs</h5>
                    <p class="card-text">A kezelés időtartama: <b>50 perc</b></p>
                    
                    <p class="card-text text-center ar">Ár: <b>5000 Forint</b></p>
                    <a href="jelentkezes.php?username=<?php echo $_SESSION['user']; ?>" class="font ar fog">Foglalok időpontot!</a>
                </div>
            </div>
        </div>
<!--Frissítő-->
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <div class="tarto">
                <img src="IMG/post4.jpg"class="img-fluid d-block mx-auto " alt="kezeles1">
                    <div class="overlay">
                        <div class="text">A frissítő masszázs legalapvetőbb tulajdonsága a lazítás, aminek nem csak az izmokra, ízületekre, inakra van hatása, hanem közvetve a vegetatív idegrendszerre is. Mindezekből következik, hogy például a fezültség okozta fejfájás nagyon gyakran megszüntethető a masszázzsal. </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Frissítő svéd-masszázs</h5>
                    <p class="card-text">A kezelés időtartama: <b>50 perc</b></p>
                    
                    <p class="card-text text-center ar">Ár: <b>5000 Forint</b></p>
                    <a href="jelentkezes.php?username=<?php echo $_SESSION['user']; ?>" class="font ar fog">Foglalok időpontot!</a>
                </div>
            </div>
        </div>

    </div>
</div>
<!--
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <img src="IMG/kopolyozes.jpg" class="img d-bloc mx-auto img-fluid img-thumbnail mt-5" alt="">
        </div>
    </div>
</div>
-->
<?php require "footer.php";