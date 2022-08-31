<?php 
Include '../Include/Header.php'; 
Include '../ayarlar/fonksiyonlar.php'; 
$girenDanisman = $_SESSION['danismanSicil'];
if (isset($_GET['ID'])) {
    $GelenID        =   $_GET['ID'];
  }
  if(isset($_POST['Reddet']))
  {
    $redSebebi = Guvenlik($_POST['redSebebi']);
    $UPDATE =$VeritabaniBaglantisi->prepare("UPDATE ogrenciler SET StajOnay=?, OgrenciStajBasvuru=?, OgrenciStajGonderim=?, ReddetmeYorumu=? WHERE Ogrenci_id=?");
  $UPDATE->execute(array(2,0,0,$redSebebi, $GelenID));
  $update_SAyi = $UPDATE->rowCount();
  if($update_SAyi ==0){
     header("Location:rednedeni.php?reddetme=false");
    exit();
  }
  else{
    $DELETE =$VeritabaniBaglantisi->prepare("DELETE FROM stajbasvurudetay WHERE OgrenciID=?");
    $DELETE->execute(array($GelenID));
    $delete_sayi = $DELETE->rowCount();
  	Header("Location:onay_bekleyen_stajlar.php");
    exit();
  }
}
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
                   <a href="onay_bekleyen_stajlar.php" class="nav_link active" style="text-decoration:none; text-align: center;"> <i class='bi bi-clock-history nav_icon'></i> <span class="nav_name">Onay Bekleyen<br>Stajlar</span> </a>
                   <a href="onaylanmis_stajlar.php" class="nav_link" style="text-decoration:none; text-align: center;"> <i class='bi bi-person-check nav_icon'></i> <span class="nav_name">Onaylanmış Stajlar</span> </a>
                   <a href="gönderilen_staj_dosyaları.php" class="nav_link" style="text-decoration:none; text-align: center;"> <i class="bi bi-journal-check nav_icon"></i> <span class="nav_name">Staj Dosyaları</span> </a>
                 
             </div>
             </div> <a href="uyecikis.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Çıkış Yap</span> </a>        </nav>
    </div>
    <div class="row">
 <div class="col-8" style="margin-top: 80px;"><h3>Reddetme Sebebi</h3></div>
 </div>
    <div style="border-top:2px solid blue; padding: 20px;">
    <div class="col-6">
    <form method="POST">
    <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="redSebebi" required="required" style="height:50px;">
            <label for="floatingInput"><b>Reddetme Sebebinizi Kısaca Belirtiniz.</b></label>
          </div>
          </div>
          <input class="btn" type="submit" name="Reddet" value="Reddet" style="background-color: #3A5BA0; color: white; border-radius: 15px; width: 200px; margin-left:500px;">
    </form>