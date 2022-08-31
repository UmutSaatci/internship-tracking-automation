<?php
include '../Include/Header.php';
$girenögrenci = $_SESSION['ÖgrenciID'];

if (isset($_POST['FormGonder'])) {


  $yukleklasor = "../resimler/"; //yüklenecek klasör
  $tmp_name = $_FILES['yukledosya']['tmp_name'];
  $name = $_FILES['yukledosya']['name'];
  $boyut = $_FILES['yukledosya']['size'];
  $tip = $_FILES['yukledosya']['type'];
  $uzanti = substr($name, -4, 4);
  $resimad = $name;

  //dosya varmı kontrol
  if (strlen($name) == 0) {
    echo "Bir dosya seçiniz";
    exit();
  }
  move_uploaded_file($tmp_name, "$yukleklasor/$resimad");

  $Formekle  =  $VeritabaniBaglantisi->prepare("INSERT INTO stajdosyasi  (OgrenciID, Ogrenci_dosya) values (?, ?)");
  $Formekle->execute([$_SESSION['ÖgrenciID'], $resimad]);
  $formeklemesayisi    =  $Formekle->rowCount();
  if ($formeklemesayisi == 0) {
    header("Location:stajdosyası.php?durum=false");
    exit();
  }
  else{
      header("Location:stajdosyası.php");
    exit();
  }
}
$BitisTarihiCek  =  $VeritabaniBaglantisi->prepare("SELECT StajBitisTarihi FROM bilgi_islem");
$BitisTarihiCek->execute();
$BitisTarihiCek2 = $BitisTarihiCek->fetch(PDO::FETCH_ASSOC);
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
          <a href="Staj_DurumKontrol.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-eye nav_icon'></i> <span class="nav_name">Staj Onay Durumu</span> </a>
          <a href="stajdosyası.php" class="nav_link active" style="text-decoration:none;"> <i class='bi bi-journal-text nav_icon'></i> <span class="nav_name">Staj Dosya <br>Yükle</span> </a>
        </div>
      </div> <a href="uyecikis.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Çıkış Yap</span> </a>
    </nav>
  </div>

  <div style="margin-top: 80px;">
<h3>Staj Dosyası Yükle</h3>
</div>
<div style="border-top:2px solid blue; padding: 20px;">
<?php
$bugün=date("d-m-Y");
$tarih1=$BitisTarihiCek2['StajBitisTarihi'];
$tarih2=date ("d-m-Y", strtotime("+1 month", strtotime($tarih1))); //bitis tarihine 1ay ekle
if($bugün>$tarih1 && $bugün<=$tarih2) {
?>

<div class="row">
  <form method="POST" enctype="multipart/form-data">
    <b>Staj Dosyasını Yükleyiniz</b> 
    <div class="col-4">
    <div class="mb-3">
              <input class="form-control" type="file" name="yukledosya">
            </div>
            </div>

    <div class="row">

      <input class="btn mt-3" type="submit" name="FormGonder" value="Dosyayı Gönder" style="background-color: #3A5BA0; color: white; border-radius: 15px; width: 175px;">
    </div>
  </form>
</div>
</div>
<?php } else{
  echo "Staj dosyası gönderimlerini sadece staj bitiş tarihinden <b>".$tarih1."</b> ile <b>".$tarih2."</b> tarihi arasında yapabilirsiniz...";  
} ?>
  <?php
  include '../Include/footer.php';
  ?>