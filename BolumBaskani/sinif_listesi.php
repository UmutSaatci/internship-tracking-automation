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
                    <a href="sinif_listesi.php" class="nav_link active" style="text-decoration:none;"> <i class='bi bi-list-ul nav_icon'></i> <span class="nav_name">Sınıf Listeleri</span> </a>
                    <a href="onay_bekleyen_stajlar.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-clock-history nav_icon'></i> <span class="nav_name">Onay Bekleyen<br> Stajlar</span> </a>
                    <a href="onaylanmis_stajlar.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-person-check nav_icon'></i> <span class="nav_name">Onaylanmış Stajlar</span> </a>
                    
                </div>
                </div> <a href="uyecikis.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Çıkış Yap</span> </a>
        </nav>
    </div>
    <div class="row">
        <div class="col-8" style="margin-top: 80px;">
            <h3>Sınıf Listeleri</h3>
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
                    <td>Sınıf ID</td>
                    <td>Sınıf Bolum</td>
                    <td>Bolum Adı</td>
                    <td>Başvuru Sayısı</td>
                    <td>Sınıf Mevcudu</td>
                </tr>
            </thead>
            <?php
$bolum_sor=$VeritabaniBaglantisi->prepare("SELECT * FROM baskanlar WHERE baskan_id=?");
$bolum_sor->execute(array($girenBaskan));
$bolum_bilgisor=$bolum_sor->fetch(PDO::FETCH_ASSOC); #baskan_bolum_id çekildi

$sinif_sor = $VeritabaniBaglantisi->prepare("SELECT *                               
FROM siniflar JOIN bolumler ON bolumler.bolum_kodu  = siniflar.sinif_bolum_kodu 
JOIN baskanlar ON baskanlar.baskan_bolum_kodu  = siniflar.sinif_bolum_kodu 
WHERE siniflar.sinif_bolum_kodu=? ORDER BY siniflar.sinif_id ASC");


       $sinif_sor->execute(array($bolum_bilgisor['baskan_bolum_kodu']));
            foreach ($sinif_sor as $row) {
                $sinif_mevcud = $VeritabaniBaglantisi->prepare("SELECT COUNT(*) AS Sinif_mevcudu FROM ogrenciler where Ogrenci_sinif_id=? ");
                $sinif_mevcud->execute(array($row['sinif_id']));
                $sinifCount = $sinif_mevcud->fetch(PDO::FETCH_ASSOC);
                $ogrenci_sayisi = $VeritabaniBaglantisi->prepare("SELECT COUNT(*) AS Ogrenci_sayisi FROM ogrenciler WHERE OgrenciStajGonderim=? AND Ogrenci_sinif_id=? ");
                $ogrenci_sayisi->execute(array(1, $row['sinif_id']));
                $ogrCount = $ogrenci_sayisi->fetch(PDO::FETCH_ASSOC);
            ?>

                <tr>
                    <td><a href="ogrenci_listesi.php?ID=<?php echo $row['sinif_id']; ?>" style="text-decoration: none; color:white;"><?php echo $row['sinif_id']; ?></a></td>
                    <td><?php echo $row['sinif_adi']; ?></td>
                    <td><?php echo $row['bolum_adi']; ?></td>
                    <td><?php echo $ogrCount['Ogrenci_sayisi']; ?></td>
                    <td><?php echo $sinifCount['Sinif_mevcudu']; ?></td>
                </tr>

            <?php } ?>
        </table>
    </div>








    <?php
    include '../Include/footer.php';
    ?>