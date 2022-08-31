<?php
include "../Include/Header.php";
$girenBaskan = $_SESSION['baskanID'];

if(isset($_GET['arama'])){

$aranan_ogrenci = $_GET['arananOgrenci'];

$ogrenci_sor1=$VeritabaniBaglantisi->prepare("SELECT * FROM baskanlar WHERE baskan_id=?");
$ogrenci_sor1->execute(array($girenBaskan));
$ogrenci_bilgisor=$ogrenci_sor1->fetch(PDO::FETCH_ASSOC);
		$ogrenci_sor =$VeritabaniBaglantisi->prepare("SELECT * FROM ogrenciler WHERE Ogrenci_adi LIKE ? AND Ogrenci_bolum_kodu=? AND Silinme_Durumu=?");
                                    $ogrenci_sor->execute(array("%$aranan_ogrenci%", $ogrenci_bilgisor['baskan_bolum_kodu'],0));
                                      $say =$ogrenci_sor->rowCount();

	} else {
		header("Location:sinif_listeleri_listeleri.php?durum=bos");
	}
 ?>
 <body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="AnaPanel_BolumBaskani.php" class="nav_logo"><span class="nav_logo-name"><img src="../resimler/ktun_logo_koyu_zemin.gif" height="40"></span> </a>
                <div class="nav_list"> <a href="AnaPanel_BolumBaskani.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-house-door nav_icon'></i> <span class="nav_name">Anasayfa</span> </a>
                    <a href="sinif_listesi.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-list-ul nav_icon'></i> <span class="nav_name">Öğrenci Listeleri</span> </a>
                    <a href="onay_bekleyen_stajlar.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-person-check nav_icon'></i> <span class="nav_name" style="text-decoration: center;">Onay Bekleyen<br>Stajlar</span> </a>
                     <a href="onaylanmis_stajlar.php" class="nav_link" style="text-decoration:none; text-align: center;"> <i class='bi bi-clock-history nav_icon'></i> <span class="nav_name">Onaylanmış Stajlar</span> </a>

                 
             </div>
             </div> <a href="uyecikis.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Çıkış Yap</span> </a>
        </nav>
    </div>
    
 <div style="margin-top: 80px;"><h4><?php echo "'$aranan_ogrenci' ile ilgili $say eşleşme bulundu!"?></h4></div>
    <div style="border-top:2px solid blue; padding: 20px;">
      <table class="table table-dark table-striped">
        <thead>
            <tr>
                <td>Öğrenci Adı</td>
                <td>Öğrenci Soyadı</td>
                <td>Öğrenci E-mail</td>
                <td>Öğrenci Telefon</td>
                <td>Öğrenci Cinsiyet</td>
            </tr>
        </thead>
        <?php
            foreach($ogrenci_sor as $row){
                ?>

        <tr>
            <td><?php echo $row['Ogrenci_adi']; ?></td>
            <td><?php echo $row['Ogrenci_soyadi']; ?></td>
            <td><?php echo $row['Ogrenci_Email']; ?></td>
            <td><?php echo $row['Ogrenci_Telefon']; ?></td>
             <td><?php echo $row['Ogrenci_cinsiyet']; ?></td>
        </tr>

    <?php } ?>
        </table>
    </div>




 <?php
include "../Include/footer.php";
 ?>