<?php
include '../Include/Header.php';
?>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="AnaPanel_BilgiIslem.php" class="nav_logo"><span class="nav_logo-name"><img src="../resimler/ktun_logo_koyu_zemin.gif" height="40"></span> </a>
                <div class="nav_list"> <a href="AnaPanel_BilgiIslem.php" class="nav_link active" style="text-decoration:none;"> <i class='bi bi-house-door nav_icon'></i> <span class="nav_name">Anasayfa</span> </a>
                    <a href="Ogrenci_ekle.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Öğrenci Ekle</span> </a>
                    <a href="Danisman_ekle.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-person-square nav_icon'></i> <span class="nav_name">Danışman Ekle</span> </a>
                    <a href="BolümBaskani_ekle.php" class="nav_link" style="text-decoration:none;"> <i class="bi bi-person-workspace nav_icon"></i> <span class="nav_name">Bölüm Başkanı Ekle</span> </a>
                    <a href="Bolüm_ekle.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-bookmark nav_icon'></i> <span class="nav_name">Bölüm Ekle</span> </a>
                    <a href="staj_tarihgir.php" class="nav_link" style="text-decoration:none;"> <i class="bi bi-calendar2-date nav_icon"></i> <span class="nav_name">Başlangıç-Bitiş<br>Tarihi gir</span> </a>
                    <a href="danisman_ata.php" class="nav_link" style="text-decoration:none;"> <i class="bi bi-arrow-right-square nav_icon"></i> <span class="nav_name">Sınıfa Danışman ata</span> </a>
                </div>
            </div> <a href="uyecikis.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Çıkış Yap</span> </a>
        </nav>
    </div>
    <?php
      echo '<script>Swal.fire("Ekleme Başarılı", "Öğrenci kayıt/kayıtları başarıyla eklendi.", "success"); </script>';
      header("Refresh: 2; url=Ogrenci_ekle.php");
    ?>
    