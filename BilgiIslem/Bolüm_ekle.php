<?php
include '../Include/Header.php';
Include '../ayarlar/fonksiyonlar.php'; 
if(isset($_POST['BolumEkle'])){
    $BolumAdi=Guvenlik($_POST['BolumAdi']);
    $BolumKodu=Guvenlik($_POST['BolumKodu']);
    $BolumEkle = $VeritabaniBaglantisi->prepare("INSERT INTO bolumler (bolum_adi, bolum_kodu) values (?, ?)");
    $BolumEkle->execute(array($BolumAdi, $BolumKodu));
    $BolumEklemeSayisi    =  $BolumEkle->rowCount(); 
  if ($BolumEklemeSayisi == 0) {
    header("Location:Bolüm_ekle.php?durum=false");
    exit();
  }
  else {
    header("Location:Bolüm_ekle.php");
  }
}
?>
<body id="body-pd">
    
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
   

    </header>
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="jQuery-1.7.1.min.js"></script>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
        <div> <a href="AnaPanel_BilgiIslem.php" class="nav_logo"><span class="nav_logo-name"><img src="../resimler/ktun_logo_koyu_zemin.gif" height="40"></span> </a>
                <div class="nav_list"> <a href="AnaPanel_BilgiIslem.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-house-door nav_icon'></i> <span class="nav_name">Anasayfa</span> </a>
                    <a href="Ogrenci_ekle.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Öğrenci Ekle</span> </a>
                    <a href="Danisman_ekle.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-person-square nav_icon'></i> <span class="nav_name">Danışman Ekle</span> </a>
                    <a href="BolümBaskani_ekle.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-person-workspace nav_icon'></i> <span class="nav_name">Bölüm Başkanı Ekle</span> </a>
                    <a href="Bolüm_ekle.php" class="nav_link active" style="text-decoration:none;"> <i class='bi bi-bookmark nav_icon'></i> <span class="nav_name">Bölüm Ekle</span> </a>
                    <a href="staj_tarihgir.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-calendar2-date nav_icon'></i> <span class="nav_name">Başlangıç-Bitiş<br>Tarihi gir</span> </a>
                    <a href="danisman_ata.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-arrow-right-square nav_icon'></i> <span class="nav_name">Sınıfa Danışman ata</span> </a>
                </div>
                </div> <a href="uyecikis.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Çıkış Yap</span> </a>
        </nav>
    </div>
    <div style="margin-top: 80px;">
        <h3>Bölüm Ekle</h3>
    </div>

<form method="POST">
    <div style="border-top:2px solid blue; padding: 20px;">
        <div class="row">
            <div class="col-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="BolumAdi" required="required" style="height:50px;">
                    <label for="floatingInput"><b>Bölüm Adı</b></label>
                </div>
            </div>
            <div class="col-6">
                <div class="form-floating mb-3">
                    <input type="text" pattern="[A-Z]{3}[0-9]{2}" class="form-control" id="floatingInput" name="BolumKodu" required="required" style="height:50px;" maxlength="5">
                    <label for="floatingInput"><b>Bölüm Kodu</b></label>
                </div>
            </div>
        </div>
         <input class="btn" type="submit" name="BolumEkle" value="Bölüm Kaydet" style="background-color: #3A5BA0; color: white; border-radius: 15px; width: 200px; margin-left:10px;">
        </form>
        <?php
        include '../Include/footer.php';
        ?>