<?php
include '../Include/Header.php';
Include '../ayarlar/fonksiyonlar.php'; 

/* $gelenSayfa = $_SERVER['HTTP_REFERER']; //önceki sayfanın adresi alındı
echo $gelenSayfa;
 if(strstr($gelenSayfa,"Ogrenci_ekle.php?Durum=Onay")){ //önceki sayfanın içerisinde Ogrenci_ekle.php?Durum=Onay geçiyor ise SweetAlert gönderildi.
    echo '<script>Swal.fire("Ekleme Başarılı", "Öğrenci kayıt/kayıtları başarıyla eklendi.", "success"); </script>';
}
else if(strstr($gelenSayfa,"Ogrenci_ekle.php?Durum=Red")){
    echo '<script>Swal.fire("Ekleme Başarısız", "Öğrenci kayıt/kayıtları eklenirken bir hata oluştu.", "unsuccesfull"); </script>';
} */
if (isset($_POST['ÖgrenciEkle'])) {
    $OgrenciIsim = Guvenlik($_POST['OgrenciIsim']);
    $OgrenciSoyisim = Guvenlik($_POST['OgrenciSoyisim']);
    $OgrenciMail = Guvenlik($_POST['OgrenciMail']);
    $OgrenciNo = Guvenlik($_POST['OgrenciOkulNo']);
    $OgrenciSifre = Guvenlik(substr($OgrenciNo , -4));
    $OgrenciCinsiyet = Guvenlik($_POST['OgrenciCinsiyet']);
    $OgrenciTelno = Guvenlik($_POST['OgrenciTelefon']);
    $OgrenciBolüm = Guvenlik($_POST['bolumler']);
    $OgrenciTC = $_POST['TCKimlik'];
    //$OgrenciDanisman = $_POST['danismanlar'];
    $OgrenciSinif = Guvenlik($_POST['sinif']);
    $DanismanBul = $VeritabaniBaglantisi->prepare("SELECT * FROM siniflar WHERE sinif_id=?");
    $DanismanBul->execute(array($OgrenciSinif));
    $DanismanBul2=$DanismanBul->fetch(PDO::FETCH_ASSOC);
    $OgrenciEkle = $VeritabaniBaglantisi->prepare("INSERT INTO ogrenciler (Ogrenci_TC, Ogrenci_adi, Ogrenci_soyadi, Ogrenci_Email, 
    Ogrenci_Sifre, Ogrenci_cinsiyet, Ogrenci_Telefon, Ogrenci_no, Ogrenci_sinif_id, Danisman_SicilNo, Ogrenci_bolum_kodu, Durumu, Silinme_Durumu) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $OgrenciEkle->execute(array($OgrenciTC, $OgrenciIsim, $OgrenciSoyisim, $OgrenciMail, $OgrenciSifre, $OgrenciCinsiyet, $OgrenciTelno, $OgrenciNo, $OgrenciSinif, $DanismanBul2['Danisman_SicilNo'], $OgrenciBolüm,1,0));
    $OgreciEklemeSayisi    =  $OgrenciEkle->rowCount();
    if ($OgreciEklemeSayisi == 0) {
        header("Location:Ogrenci_ekle.php?durum=false");
        exit();
    } else {
        header("Location:Ogrenci_ekle.php");
    }
}


?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#sinif").hide();
        $("#bolumler").change(function() {

            var bolumId = $(this).val();
            $.ajax({
                type: "POST",
                url: "ajax2.php",
                data: {
                    "bolumler": bolumId
                },
                success: function(e) {
                    $("#sinif").show();
                    $("#sinif").html(e);
                }

            });
        })
    });
   /* $(document).ready(function() {
        $("#danismanlar").hide();
        $("#bolumler").change(function() {

            var bolumId = $(this).val();
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    "bolumler": bolumId
                },
                success: function(e) {
                    $("#danismanlar").show();
                    $("#danismanlar").html(e);
                }

            });
        })
    }); */
</script>



<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>

    </header>


    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
        <div> <a href="AnaPanel_BilgiIslem.php" class="nav_logo"><span class="nav_logo-name"><img src="../resimler/ktun_logo_koyu_zemin.gif" height="40"></span> </a>
                <div class="nav_list"> <a href="AnaPanel_BilgiIslem.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-house-door nav_icon'></i> <span class="nav_name">Anasayfa</span> </a>
                    <a href="Ogrenci_ekle.php" class="nav_link active" style="text-decoration:none;"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Öğrenci Ekle</span> </a>
                    <a href="Danisman_ekle.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-person-square nav_icon'></i> <span class="nav_name">Danışman Ekle</span> </a>
                    <a href="BolümBaskani_ekle.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-person-workspace nav_icon'></i> <span class="nav_name">Bölüm Başkanı Ekle</span> </a>
                    <a href="Bolüm_ekle.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-bookmark nav_icon'></i> <span class="nav_name">Bölüm Ekle</span> </a>
                    <a href="staj_tarihgir.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-calendar2-date nav_icon'></i> <span class="nav_name">Başlangıç-Bitiş<br>Tarihi gir</span> </a>
                    <a href="danisman_ata.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-arrow-right-square nav_icon'></i> <span class="nav_name">Sınıfa Danışman ata</span> </a>
                </div>
                </div> <a href="uyecikis.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Çıkış Yap</span> </a>
        </nav>
    </div>
    <div style="margin-top: 80px;">
        <h3>Öğrenci Ekle</h3>
    </div>

    <form method="POST">
        <div style="border-top:2px solid blue; padding: 20px;">
            <div class="row">
            <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="text" pattern="^[1-9]{1}[0-9]{9}[02468]{1}$" class="form-control" id="floatingInput" name="TCKimlik" required="required" style="height:50px;" maxlength="11">
                        <label for="floatingInput"><b>TC Kimlik No</b></label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="OgrenciIsim" required="required" style="height:50px;">
                        <label for="floatingInput"><b>İsim</b></label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="OgrenciSoyisim" required="required" style="height:50px;">
                        <label for="floatingInput"><b>Soyisim</b></label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" class="form-control" id="floatingInput" name="OgrenciMail" required="required" style="height:50px;">
                        <label for="floatingInput"><b>Email</b></label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="text" pattern="\d*" class="form-control" id="floatingInput" name="OgrenciOkulNo" required="required" style="height:50px;" maxlength="9">
                        <label for="floatingInput"><b>Öğrenci No</b></label>
                    </div>
                </div> 
                <div class="col-6">
                <div class="form-floating mb-3">
                <select class="form-select" name="OgrenciCinsiyet" aria-label="Default select example">
                <option selected>Cinsiyet Seçiniz</option>
                <option value="Erkek">Erkek </option>
                <option value="Kadın">Kadın </option>
                <option value="Belirtmek istenmiyor ">Belirtmek istenmiyor </option>
                </select>
                </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="tel" pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$" class="form-control" id="floatingInput" name="OgrenciTelefon" required="required" style="height:50px;">
                        <label for="floatingInput"><b>Telefon</b></label>
                    </div>
                </div>                           
                <div class="col-6">
                    <select class="form-select form-select-sm mb-3" name="bolumler" id="bolumler" aria-label=".form-select-sm example" style="height:50px;">
                        <option selected>Bölüm Seçin</option>
                        <?php $bolüm_sor = $VeritabaniBaglantisi->prepare("SELECT * FROM bolumler");
                        $bolüm_sor->execute();
                        $bolümler = $bolüm_sor->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($bolümler as $bolüm) {
                        ?>
                            <option value="<?php echo $bolüm['bolum_kodu']; ?>"><?php echo $bolüm['bolum_adi']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-6" id="sinif">

                </div>
                
                <div class="col-6" id="danismanlar">

                </div>
            </div>
            <input class="btn" type="submit" name="ÖgrenciEkle" value="Öğrenci Kaydet" style="background-color: #3A5BA0; color: white; border-radius: 15px; width: 200px; margin-left:10px;">
         </form>
              <div class="row mt-5">
               
                    <div class="outer-container">
        <form action="excel_ogrenci_ekle.php" method="post"
        name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
        Örnek şablonu indirmek için <a href="../resimler/OgrenciSablonu.xlsx" download>Tıklayın</a> <br><br>
        <div>
        <div class="row">
            <label>Excel Dosyasını 
            Seç</label> 
            <div class="col-4">
  <input class="form-control" type="file" id="file" name="file" accept=".xls,.xlsx" required>
</div>
            <input class="btn" id="submit" type="submit" name="import" value="Aktar" style="background-color: #3A5BA0; color: white; border-radius: 5px; width: 70px;">

        </div>
        </div>

    </form>

</div>
<div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>

                </div>
    <?php
    include '../Include/footer.php';
    ?>