<?php
include '../Include/Header.php';
if (isset($_GET['ID'])) {
  $GelenID        =   $_GET['ID'];
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
          <a href="sinif_listeleri.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-list-ul nav_icon'></i> <span class="nav_name">Öğrenci Listeleri</span> </a>
          <a href="onay_bekleyen_stajlar.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-clock-history nav_icon'></i> <span class="nav_name" style="text-decoration: center;">Onay Bekleyen<br>Stajlar</span> </a>
          <a href="onaylanmis_stajlar.php" class="nav_link" style="text-decoration:none; text-align: center;"> <i class='bi bi-person-check nav_icon'></i> <span class="nav_name">Onaylanmış Stajlar</span> </a>
          <a href="gönderilen_staj_dosyaları.php" class="nav_link" style="text-decoration:none; text-align: center;"> <i class="bi bi-journal-check nav_icon"></i> <span class="nav_name">Staj Dosyaları</span> </a>

        </div>
      </div> <a href="uyecikis.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Çıkış Yap</span> </a>
    </nav>
  </div>

  <div style="margin-top: 80px;">
    <h3>Öğrenci Listesi</h3>
  </div>
  <div style="border-top:2px solid blue; padding: 20px;">
    <table class="table table-dark table-striped">
      <thead>
        <tr>
        <td>Öğrenci Numarası</td>
          <td>Öğrenci Adı</td>
          <td>Öğrenci Soyadı</td>
          <td>Öğrenci E-mail</td>
          <td>Gönderim Durumu</td>
          <td>Onay Durumu</td>
        </tr>
      </thead>
      <?php
      $ogrenci_sor = $VeritabaniBaglantisi->prepare("SELECT * FROM ogrenciler WHERE Ogrenci_sinif_id=? ORDER BY Ogrenci_id ASC");
      $ogrenci_sor->execute(array($GelenID));
      foreach ($ogrenci_sor as $row) {
      ?>

        <tr>
        <td><?php echo $row['Ogrenci_no']; ?></td>
          <td><?php echo $row['Ogrenci_adi']; ?></td>
          <td><?php echo $row['Ogrenci_soyadi']; ?></td>
          <td><?php echo $row['Ogrenci_Email']; ?></td>

          <?php
          if ($row['OgrenciStajGonderim'] == 1) //Ogrenci staj gönderdiyse Gönderim durumu karşısına tik koy
          { ?>
            <td><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16" style="color:#6BCB77;">
                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
              </svg></td>
          <?php
          } else { //Ogrenci staj göndermediyse Gönderim durumu karşısına çarpı koy 
          ?>
            <td><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16" style="color:red;">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
              </svg></td>
          <?php }

          if ($row['StajOnay'] == 1) //Ogrenci staj gönderdikten sonra danışman onayladıysa Onay durumu karşısına tik koy
          { ?>
            <td><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16" style="color:#6BCB77;">
                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
              </svg></td>
          <?php
          } else { //Ogrenci staj gönderdikten sonra danışman reddedilirse Onay durumu karşısına çarpı koy 
          ?>
            <td><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16" style="color:red;">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
              </svg></td>

        <?php }
        } ?>
        </tr>


    </table>
  </div>
  <?php
  include '../Include/footer.php';

  ?>