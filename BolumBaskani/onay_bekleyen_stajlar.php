<?php
include '../Include/Header.php';
$girenBaskan = $_SESSION['baskanID'];
?>

<body id="body-pd">
  <header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
  </header>
  <div class="l-navbar" id="nav-bar">
    <nav class="nav">
      <div> <a href="AnaPanel_BolumBaskani.php" class="nav_logo"><span class="nav_logo-name"><img src="../resimler/ktun_logo_koyu_zemin.gif" height="40"></span> </a>
        <div class="nav_list"> <a href="AnaPanel_BolumBaskani.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-house-door nav_icon'></i> <span class="nav_name">Anasayfa</span> </a>
          <a href="sinif_listesi.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-list-ul nav_icon'></i> <span class="nav_name">Sınıf Listeleri</span> </a>
          <a href="onay_bekleyen_stajlar.php" class="nav_link active" style="text-decoration:none;"> <i class='bi bi-clock-history nav_icon'></i> <span class="nav_name">Onay Bekleyen <br>Stajlar</span> </a>
          <a href="onaylanmis_stajlar.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-person-check nav_icon'></i> <span class="nav_name">Onaylanmış Stajlar</span> </a>
          

        </div>
        </div> <a href="uyecikis.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Çıkış Yap</span> </a>
    </nav>
  </div>
  <div class="row">
    <div class="col-8" style="margin-top: 80px;">
      <h3>Onay Bekleyen Stajlar</h3>
    </div>
    <div class="col-4" style="margin-top: 80px; text-align: right;">
      <form action="ogrenci_bul.php" method="GET" role="form" class="d-flex" style="margin-left: 20px; width:300px;">
        <input class="form-control me-2" name="arananOgrenci" type="search" required="required" style="border-radius: 10px; text-align: center; background-color: black; color: white;" placeholder="Öğrenci Ara" aria-label="Search">
        <button class="btn" name="arama" type="submit"><b>Bul</b></button>
      </form>
    </div>
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
          <td>Onayla</td>
          <td>Reddet</td>
        </tr>
      </thead>
      <?php
      $ogrenci_sor1 = $VeritabaniBaglantisi->prepare("SELECT * FROM baskanlar WHERE baskan_id=?");
      $ogrenci_sor1->execute(array($girenBaskan));
      $ogrenci_bilgisor = $ogrenci_sor1->fetch(PDO::FETCH_ASSOC); #baskan_bolum_id çekildi

      $ogrenci_sor = $VeritabaniBaglantisi->prepare("SELECT * FROM ogrenciler WHERE StajOnay=? AND OgrenciStajBasvuru=? AND Ogrenci_bolum_kodu=? ORDER BY Ogrenci_id ASC");
      $ogrenci_sor->execute(array(1, 0, $ogrenci_bilgisor['baskan_bolum_kodu']));
      foreach ($ogrenci_sor as $row) {
      ?>
        <tr>
          <td><?php echo $row['Ogrenci_no']; ?></td>
          <td><?php echo $row['Ogrenci_adi']; ?></td>
          <td><?php echo $row['Ogrenci_soyadi']; ?></td>
          <td><?php echo $row['Ogrenci_Email']; ?></td>
          <td><a href="stajkontrol.php?ID=<?php echo $row['Ogrenci_id']; ?>" style="text-decoration: none; color:#4B7BE5;">Gönderilen Formu Kontrol Et</a></td>
          <td><a href="stajonayla.php?ID=<?php echo $row['Ogrenci_id']; ?>" style="text-decoration: none; color: white;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16" style="color:#6BCB77;">
                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
              </svg>&nbsp;</a></td>
              <td><a href="rednedeni.php?ID=<?php echo $row['Ogrenci_id'];?>"  style="text-decoration: none; color: white;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16" style="color:red;">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg>&nbsp;</td>
        </tr>
      <?php } ?>
    </table>
  </div>


  <?php
  include '../Include/footer.php';
  ?>