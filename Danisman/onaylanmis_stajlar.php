<?php 
Include '../Include/Header.php';  
$girenDanisman = $_SESSION['danismanSicil'];
?>
    <body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="AnaPanel_Danisman.php" class="nav_logo"><span class="nav_logo-name"><img src="../resimler/ktun_logo_koyu_zemin.gif" height="40"></span> </a>
                <div class="nav_list"> <a href="AnaPanel_Danisman.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-house-door nav_icon'></i> <span class="nav_name">Anasayfa</span> </a>
                    <a href="sinif_listeleri.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-list-ul nav_icon'></i> <span class="nav_name">Sınıf Listeleri</span> </a>
                   <a href="onay_bekleyen_stajlar.php" class="nav_link" style="text-decoration:none; text-align: center;"> <i class='bi bi-clock-history nav_icon'></i> <span class="nav_name">Onay Bekleyen<br>Stajlar</span> </a>
                   <a href="onaylanmis_stajlar.php" class="nav_link active" style="text-decoration:none; text-align: center;"> <i class='bi bi-person-check nav_icon'></i> <span class="nav_name">Onaylanmış Stajlar</span> </a>
                   <a href="gönderilen_staj_dosyaları.php" class="nav_link" style="text-decoration:none; text-align: center;"> <i class="bi bi-journal-check nav_icon"></i> <span class="nav_name">Staj Dosyaları</span> </a>
                 
             </div>
             </div> <a href="uyecikis.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Çıkış Yap</span> </a>        </nav>
    </div>
    <div class="row">
 <div class="col-8" style="margin-top: 80px;"><h3>Onaylanmış Stajlar</h3></div>
 <div class="col-4" style="margin-top: 80px; text-align: right;"> <form action="ogrenci_bul.php" method="GET" role="form" class="d-flex" style="margin-left: 20px; width:300px;">
            <input class="form-control me-2" name="arananOgrenci" type="search" required="required" style="border-radius: 10px; text-align: center; background-color: black; color: white;" placeholder="Öğrenci Ara" aria-label="Search">
            <button class="btn" name="arama" type="submit"><b>Bul</b></button>
          </form></div>
 </div>
    <div style="border-top:2px solid blue; padding: 20px;">
      <table class="table table-dark table-striped">
 		<thead>
 			<tr>
 				 <td>Öğrenci Numarası</td>
                <td>Öğrenci Adı</td>
                <td>Öğrenci Soyadı</td>
                <td>Öğrenci E-mail</td>
                 <td>Form Kontrol</td>
                 <td>İptal Et</td>
 			</tr>
 		</thead>
 		<?php
        $ogrenci_sor =$VeritabaniBaglantisi->prepare("SELECT * FROM ogrenciler WHERE StajOnay=? AND Danisman_SicilNo=? ORDER BY Ogrenci_id ASC");
     $ogrenci_sor->execute(array(1, $girenDanisman));
    
            foreach($ogrenci_sor as $row){
                
                ?>


        <tr>
            <td><?php echo $row['Ogrenci_no']; ?></td>
            <td><?php echo $row['Ogrenci_adi']; ?></td>
            <td><?php echo $row['Ogrenci_soyadi']; ?></td>
            <td><?php echo $row['Ogrenci_Email']; ?></td>
               <td><a href="stajkontrol.php?ID=<?php echo $row['Ogrenci_id'];?>" style="text-decoration: none; color:#4B7BE5;">Onaylanan Formu Kontrol Et</a></td>
               <td><a href="rednedeni.php?ID=<?php echo $row['Ogrenci_id'];?>" style="text-decoration: none; color:#4B7BE5;">İptal Et</a></td>
        </tr>

    <?php } ?>
		</table>
    </div>








<?php 
Include'../Include/footer.php';
?>
   