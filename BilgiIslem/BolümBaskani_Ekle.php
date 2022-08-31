<?php
include '../Include/Header.php';
Include '../ayarlar/fonksiyonlar.php'; 
    if (isset($_POST['BaskanEkle'])) {
        $BaskanIsim = Guvenlik($_POST['BaskanIsim']);
        $BaskanSoyisim = Guvenlik($_POST['BaskanSoyisim']);
        $BaskanMail = Guvenlik($_POST['BaskanMail']);
        $BaskanSifre = Guvenlik($_POST['BaskanSifre']);
        $BaskanTelno = Guvenlik($_POST['BaskanTelno']);
        $BaskanBolüm = Guvenlik($_POST['BaskanBolüm']);
        $BaskanEkle = $VeritabaniBaglantisi->prepare("INSERT INTO baskanlar (baskan_adi, baskan_soyadi, baskan_mail, 
    baskan_Sifre, baskan_telno, baskan_bolum_kodu, Durumu, Silinme_Durumu) values (?, ?, ?, ?, ?, ?, ?, ?)");
        $BaskanEkle->execute(array($BaskanIsim, $BaskanSoyisim, $BaskanMail, $BaskanSifre, $BaskanTelno, $BaskanBolüm, 3, 0));
        $BaskanEklemeSayisi    =  $BaskanEkle->rowCount();
        if ($BaskanEklemeSayisi == 0) {
            header("Location:BolümBaskani_ekle.php?durum=false");
            exit();
        } else {
            header("Location:BolümBaskani_ekle.php");
        }
    }
?>
<?php ## if ($baskansayisiHesapla>=1) {
  ##  echo "Bu bölümde zaten bir başkan var";
 ##   exit();
   ## header("Location:BolümBaskani_Ekle.php");  
## } else { ?>
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
                    <a href="BolümBaskani_ekle.php" class="nav_link active" style="text-decoration:none;"> <i class='bi bi-person-workspace nav_icon'></i> <span class="nav_name">Bölüm Başkanı Ekle</span> </a>
                    <a href="Bolüm_ekle.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-bookmark nav_icon'></i> <span class="nav_name">Bölüm Ekle</span> </a>
                    <a href="staj_tarihgir.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-calendar2-date nav_icon'></i> <span class="nav_name">Başlangıç-Bitiş<br>Tarihi gir</span> </a>
                    <a href="danisman_ata.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-arrow-right-square nav_icon'></i> <span class="nav_name">Sınıfa Danışman ata</span> </a>
                    </div>
                </div> <a href="uyecikis.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Çıkış Yap</span> </a>
            </nav>
        </div>
        <div style="margin-top: 80px;">
            <h3>Bölüm Başkanı Ekle</h3>
        </div>

        <form method="POST">
            <div style="border-top:2px solid blue; padding: 20px;">
                <div class="row">
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="BaskanIsim" required="required" style="height:50px;">
                            <label for="floatingInput"><b>İsim</b></label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="BaskanSoyisim" required="required" style="height:50px;">
                            <label for="floatingInput"><b>Soyisim</b></label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" class="form-control" id="floatingInput" name="BaskanMail" required="required" style="height:50px;">
                            <label for="floatingInput"><b>Email</b></label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingInput" name="BaskanSifre" required="required" style="height:50px;">
                            <label for="floatingInput"><b>Şifre</b></label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="tel" pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$" class="form-control" id="floatingInput" name="BaskanTelno" required="required" style="height:50px;">
                            <label for="floatingInput"><b>Telefon Numarası</b></label>
                        </div>
                    </div>
                    <div class="col-6">
                        <select class="form-select form-select-sm mb-3" name="BaskanBolüm" aria-label=".form-select-sm example" style="height:50px;">
                            <option selected>Bölüm Seçin</option>
                            <?php $bolüm_sor = $VeritabaniBaglantisi->prepare("SELECT * FROM bolumler");
                            $bolüm_sor->execute();
                            $bolümler = $bolüm_sor->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($bolümler as $bolüm) { ?>
                                <option value="<?php echo $bolüm['bolum_kodu']; ?>"><?php echo $bolüm['bolum_adi']; ?> </option>
                            <?php } ?>

                        </select>
                    <?php ## } ?>


                    </div>
                </div>
                 <input class="btn" type="submit" name="BaskanEkle" value="Bölüm Başkanı Kaydet" style="background-color: #3A5BA0; color: white; border-radius: 15px; width: 200px; margin-left:10px;">
        </form>
        <?php
        include '../Include/footer.php';
        ?>