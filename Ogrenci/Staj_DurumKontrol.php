<?php
include '../Include/Header.php';
$girenögrenci = $_SESSION['ÖgrenciID'];


$OgrenciKontrol = $VeritabaniBaglantisi->prepare("SELECT * FROM ogrenciler WHERE Ogrenci_id=?");
$OgrenciKontrol->execute(array($girenögrenci));
$OgrenciOnay = $OgrenciKontrol->fetch(PDO::FETCH_ASSOC);
?>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="AnaPanel_Ogrenci.php" class="nav_logo"><span class="nav_logo-name"><img src="../resimler/ktun_logo_koyu_zemin.gif" height="40"></span> </a>
                <div class="nav_list"> <a href="AnaPanel_Ogrenci.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-house-door nav_icon'></i> <span class="nav_name">Anasayfa</span> </a>
                    <a href="kisisel_bilgiler.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-card-checklist nav_icon'></i> <span class="nav_name">Kişisel Bilgiler</span> </a>
                    <a href="staj_formu.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-ui-checks nav_icon'></i> <span class="nav_name">Staj Formu</span> </a>
                   <a href="Staj_DurumKontrol.php" class="nav_link active" style="text-decoration:none;"> <i class='bi bi-eye nav_icon'></i> <span class="nav_name">Staj Onay Durumu</span> </a> 
                    <a href="stajdosyası.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-journal-text nav_icon'></i> <span class="nav_name">Staj Dosya <br>Yükle</span> </a>
                </div>
                </div> <a href="uyecikis.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Çıkış Yap</span> </a>        </nav>
    </div>
    <div style="margin-top: 80px;">
        <h3>Staj Durum Kontrol</h3>
    </div>
    <div style="border-top:2px solid blue; padding: 20px;">
        <div class="row">
            <div class="col-6">
                <?php 
                    if($OgrenciOnay['OgrenciStajGonderim'] ==1) {



                 if($OgrenciOnay['StajOnayBaskan']==0)
                {
                    echo "Staj başvurunuz değerlendirilme sürecinde...!";
                }
               
                else if($OgrenciOnay['StajOnayBaskan']==1)
                { 
                    echo "Staj başvurunuz onaylanmıştır...";
                }

                 }
                 else if($OgrenciOnay['OgrenciStajGonderim'] ==0 && $OgrenciOnay['StajOnayBaskan']==0 && $OgrenciOnay['StajOnay']==0){
                    echo "Staj Başvuru Formunu Göndermediniz...!";
                 }

                  if($OgrenciOnay['StajOnayBaskan']==2 || $OgrenciOnay['StajOnay']==2 ) 
                {
                     echo "Staj başvurunuz " . $OgrenciOnay['ReddetmeYorumu']." sebebiyle reddedilmiştir...!";
                }
                ?>
            </div>
        </div>