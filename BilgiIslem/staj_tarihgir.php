<?php
include '../Include/Header.php';
Include '../ayarlar/fonksiyonlar.php'; 
$girenBilgiİslem = $_SESSION['BilgiİslemID'];
if (isset($_POST['TarihGonder'])) {
    $BaslangicTarih = Guvenlik($_POST['BaslangicTarihi']);
    $BitisTarihi = Guvenlik($_POST['BitisTarihi']);
    $TarihEkle = $VeritabaniBaglantisi->prepare("UPDATE bilgi_islem SET StajBaslangicTarihi=?, StajBitisTarihi=? WHERE Bilgi_islem_id=? ");
    $TarihEkle->execute(array($BaslangicTarih, $BitisTarihi, $girenBilgiİslem));
    $EklemeSayisi = $TarihEkle->rowCount();
    if ($EklemeSayisi == 0) {
        header("Location:staj_tarihgir.php?update=false");
        exit();
    } #form gönderildiği zaman staj başuru ve staj gonderim sütunlarını 1 yap
}
$TarihGetir = $VeritabaniBaglantisi->prepare("SELECT * FROM bilgi_islem  WHERE Bilgi_islem_id=? ");
    $TarihGetir->execute(array($girenBilgiİslem));
    $tarihGetirYazı = $TarihGetir->FETCH(PDO::FETCH_ASSOC);
?>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
        <div> <a href="AnaPanel_BilgiIslem.php" class="nav_logo"><span class="nav_logo-name"><img src="../resimler/ktun_logo_koyu_zemin.gif" height="40"></span> </a>
                <div class="nav_list"> <a href="AnaPanel_BilgiIslem.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-house-door nav_icon'></i> <span class="nav_name">Anasayfa</span> </a>
                    <a href="Ogrenci_ekle.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Öğrenci Ekle</span> </a>
                    <a href="Danisman_ekle.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-person-square nav_icon'></i> <span class="nav_name">Danışman Ekle</span> </a>
                    <a href="BolümBaskani_ekle.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-person-workspace nav_icon'></i> <span class="nav_name">Bölüm Başkanı Ekle</span> </a>
                    <a href="Bolüm_ekle.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-bookmark nav_icon'></i> <span class="nav_name">Bölüm Ekle</span> </a>
                    <a href="staj_tarihgir.php" class="nav_link active" style="text-decoration:none;"> <i class='bi bi-calendar2-date nav_icon'></i> <span class="nav_name">Başlangıç-Bitiş<br>Tarihi gir</span> </a>
                    <a href="danisman_ata.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-arrow-right-square nav_icon'></i> <span class="nav_name">Sınıfa Danışman ata</span> </a>
                </div>
                </div> <a href="uyecikis.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Çıkış Yap</span> </a>
        </nav>
    </div>
    <form method="POST">
        <div class="row">
            <div class="col-8" style="margin-top: 80px;">
                <h3>Başlangıç-Bitiş Tarihi gir</h3>
            </div>
            <div style="border-top:2px solid blue; padding: 20px;"></div>
            <div>
            En Son staj tarihleri <b><?php echo $tarihGetirYazı['StajBaslangicTarihi'] . " ile " . $tarihGetirYazı['StajBitisTarihi'] ?></b> arasındaydı    <br><br>
            </div>

            <div class="col-6">
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="floatingInput" name="BaslangicTarihi">
                    <label for="floatingInput"><b>Başlangıç Tarihi</b></label>
                </div>
            </div>
            <div class="col-6">
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="floatingInput" name="BitisTarihi">
                    <label for="floatingInput"><b>Bitiş Tarihi</b></label>
                </div>
            </div>
            <input class="btn" type="submit" name="TarihGonder" value="Tarih Ayarla" style="background-color: #3A5BA0; color: white; border-radius: 15px; width: 200px;">
    </form>
    </div>







    <?php
    include '../Include/footer.php';
    ?>