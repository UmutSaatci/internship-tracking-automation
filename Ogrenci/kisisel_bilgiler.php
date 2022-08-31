<?php
include '../Include/Header.php';
include '../ayarlar/fonksiyonlar.php';

$girenögrenci = $_SESSION['ÖgrenciID'];
$OgrenciGetir  =  $VeritabaniBaglantisi->prepare("SELECT * FROM ogrenciler WHERE Ogrenci_id=?");
$OgrenciGetir->execute(array($girenögrenci));
$OgrenciIsim = $OgrenciGetir->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['iptal'])) {
    header("Location:kisisel_bilgiler.php");
}
if (isset($_POST['Guncelle'])) { #FormGonder nameli butona basıldığında ekleme işlemini yap
    $OgrenciTel = Guvenlik($_POST['telno']);
    $OgrenciMail = Guvenlik($_POST['eposta']);
    $OgrenciSifre = Guvenlik($_POST['sifre']);
    $OgrenciGuncelle  =  $VeritabaniBaglantisi->prepare("UPDATE ogrenciler SET Ogrenci_Telefon=?, Ogrenci_Email=?, Ogrenci_Sifre=? WHERE Ogrenci_id=?");
    $OgrenciGuncelle->execute(array($OgrenciTel, $OgrenciMail, $OgrenciSifre, $girenögrenci));
    $Guncellemesayi    =  $OgrenciGuncelle->rowCount();
    if ($Guncellemesayi == 0) {
        header("Location:kisisel_bilgiler.php?durum=false");
        exit();
    }
}

if (isset($_POST['ResimYukle'])) {
    $yukleklasor = "../resimler/"; //yüklenecek klasör
    $tmp_name2 = $_FILES['yukleResim2']['tmp_name']; //geçici dosya adı
    $name2 = $_FILES['yukleResim2']['name'];
    $boyut2 = $_FILES['yukleResim2']['size'];
    $tip2 = $_FILES['yukleResim2']['type'];
    $uzanti2 = substr($name2, -4, 4);
    $randomSayi3 = $OgrenciIsim['Ogrenci_adi'] . $OgrenciIsim['Ogrenci_soyadi'] . rand(1, 15);
    $resimad2 = $randomSayi3 . $uzanti2;

    if (strlen($name2) == 0) {
        echo "Bir dosya seçiniz";
        exit();
    }

    //boyut kontrol
    if ($boyut2 > (1024 * 1024 * 3)) {
        echo "dosya boyutu çok fazla";
        exit();
    }

    //tip kontol
    if ($tip2 != 'image/jpeg' && $tip2 != 'image/png' && $uzanti2 != '.jpg') {
        echo "Yalnızca jpeg veya png formatında olabilir";
    }
    move_uploaded_file($tmp_name2, "$yukleklasor/$resimad2");
    $Resimyukle  =  $VeritabaniBaglantisi->prepare("UPDATE ogrenciler SET Ogrenci_resim=? WHERE Ogrenci_id=?");
    $Resimyukle->execute(array($resimad2, $girenögrenci));
    $Resimyuklesayi    =  $Resimyukle->rowCount();

    header("Location:kisisel_bilgiler.php");
}
if(isset($_POST['ResimDegis'])){ //resim silme 
    $ResimSil  =  $VeritabaniBaglantisi->prepare("UPDATE ogrenciler SET Ogrenci_resim=? WHERE Ogrenci_id=?");
    $ResimSil->execute(array(null, $girenögrenci));
}


?>
<style>
    .hover-overlay-container {
        position: relative;
    }
 
    .hover-overlay-container:hover .overlay-image {
        opacity: 0.3;
    }
 
    .hover-overlay-container:hover .overlay-btn-container {
        opacity: 1;
    }
 
    .hover-overlay-container .overlay-image {
        display: block;
        height: 120px;
        width: 120px;
        opacity: 1;
        transition: .2s;
    }
 
    .hover-overlay-container .overlay-btn-container {
        position: absolute;
        top: 50%;
        left: 30%;
        opacity: 0;
        transition: .5s ease;
        text-align: center;
        transform: translate(-50%, -50%);
    }
 
    .hover-overlay-container .overlay-btn-container .overlay-btn {
        color: #fff;
        font-size: 10px;
        padding: 5px 16px;
        background-color: cornflowerblue;
        text-decoration: none;
    }
</style>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="AnaPanel_Ogrenci.php" class="nav_logo"><span class="nav_logo-name"><img src="../resimler/ktun_logo_koyu_zemin.gif" height="40"></span> </a>
                <div class="nav_list"> <a href="AnaPanel_Ogrenci.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-house-door nav_icon'></i> <span class="nav_name">Anasayfa</span> </a>
                    <a href="kisisel_bilgiler.php" class="nav_link active" style="text-decoration:none;"> <i class='bi bi-card-checklist nav_icon'></i> <span class="nav_name">Kişisel Bilgiler</span> </a>
                    <a href="staj_formu.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-ui-checks nav_icon'></i> <span class="nav_name">Staj Formu</span> </a>
                    <a href="Staj_DurumKontrol.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-eye nav_icon'></i> <span class="nav_name">Staj Onay Durumu</span> </a>
                    <a href="stajdosyası.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-journal-text nav_icon'></i> <span class="nav_name">Staj Dosya <br>Yükle</span> </a>
                </div>
            </div> <a href="uyecikis.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Çıkış Yap</span> </a>
        </nav>
    </div>
    <?php
    $ogrenci_sor = $VeritabaniBaglantisi->prepare("SELECT
                    siniflar.sinif_adi, 
                    ogrenciler.Ogrenci_Sifre,
                    ogrenciler.Ogrenci_adi,       
                    ogrenciler.Ogrenci_soyadi, 
                    ogrenciler.Ogrenci_Email, 
                    ogrenciler.Ogrenci_no, 
                    ogrenciler.Danisman_SicilNo,
                    ogrenciler.Ogrenci_Telefon,
                    ogrenciler.Ogrenci_Email,
                    ogrenciler.Ogrenci_resim
                 FROM ogrenciler INNER JOIN siniflar ON ogrenciler.Ogrenci_sinif_id = siniflar.sinif_id
                WHERE Ogrenci_id=?");
    $ogrenci_sor->execute(array($girenögrenci));
    $Ogrenci_bilgileri = $ogrenci_sor->fetch(PDO::FETCH_ASSOC);
    ?>
    <div style="margin-top: 80px;">
        <h3>Kişisel Bilgiler</h3>
    </div>
    <div style="border-top:2px solid blue; padding: 20px;">
        <div class="row">
            <div class="col-6">
                <div class="row" style="border:1px solid rgb(175, 172, 172); padding: 20px; border-radius: 15px;">
                    <?php if ($Ogrenci_bilgileri['Ogrenci_resim'] != null) { ?>
                        <div class="col-4"> 
                        <div class="hover-overlay-container">  <!--üzerine gelince resim opaklanması başlangıcı-->
                            <img class="overlay-image" src="../resimler/<?php echo $Ogrenci_bilgileri['Ogrenci_resim']; ?>" height="120" width="120" style="border-radius:15px;">
                        <div class="overlay-btn-container">
                            <form action="" method="POST">
                       <button class="overlay-btn" name="ResimDegis">Resmi Sil</button> <!--resmin üzerine gelince button çıkması-->
                       </form>
                        </div>
                    </div>
                        </div>
                    <?php } else {   //resim yoksa buraya kodlar yazılacak 
                    ?>

                        <div class="col-4">
                            <form method="POST" enctype="multipart/form-data">
                                <b>ÖĞRENCİ FOTOĞRAF</b>
                                <div class="mb-3">
                                    <input class="form-control" type="file" name="yukleResim2">
                                </div>
                                <input name="ResimYukle" type="submit" value="Resmi Yükle"/>
                            </form>
                        </div>


                    <?php } ?>
                    <div class="col-8">
                        <p style="line-height: 15px; font-size:14px;"><b>Ad Soyad:</b><?php echo " ";
                                                                                        echo $Ogrenci_bilgileri['Ogrenci_adi'];
                                                                                        echo " ";
                                                                                        echo $Ogrenci_bilgileri['Ogrenci_soyadi']; ?></p>
                        <p style="line-height: 15px; font-size:14px;"><b>Öğrenci No:</b><?php echo " ";
                                                                                        echo $Ogrenci_bilgileri['Ogrenci_no']; ?></p>
                        <p style="line-height: 15px; font-size:14px;"><b>Sınıf:</b><?php echo " ";
                                                                                    echo $Ogrenci_bilgileri['sinif_adi']; ?></p>

                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row" style="border:1px solid rgb(175, 172, 172); padding: 20px; border-radius: 15px;">
                    <div class="col-3 mt-3"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="5em" height="5em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd" d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11s11-4.925 11-11S18.075 1 12 1Zm-.5 5a1 1 0 1 0 0 2h.5a1 1 0 1 0 0-2h-.5ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <?php $danisman_sor = $VeritabaniBaglantisi->prepare("SELECT
	danismanlar.danisman_adi, 
	danismanlar.danisman_soyadi, 
	danismanlar.danisman_email FROM danismanlar INNER JOIN ogrenciler ON danismanlar.danisman_sicilNo = ogrenciler.Danisman_SicilNo WHERE ogrenciler.Danisman_SicilNo=?");
                    $danisman_sor->execute(array($Ogrenci_bilgileri['Danisman_SicilNo']));
                    $Danisman_bilgileri = $danisman_sor->fetch(PDO::FETCH_ASSOC);  ?>

                    <div class="col-9">
                        <p><b>DANIŞMAN BİLGİLERİ</b></p>
                        <p><b>Ad Soyad:</b><?php echo " ";
                                            echo $Danisman_bilgileri['danisman_adi'];
                                            echo " ";
                                            echo $Danisman_bilgileri['danisman_soyadi'] ?></p>
                        <p><b>Mail:</b><?php echo " ";
                                        echo $Danisman_bilgileri['danisman_email']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <h4>İletişim ve Adres Bilgileri</h4>
    <div style="border-top:2px solid blue;">
        <div class="row mt-3">
            <div class="col-6">
                <form method="POST">
                    <div class="form-floating mb-3">
                        <input type="tel" pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$" class="form-control" name="telno" id="floatingInput" value="<?php echo $Ogrenci_bilgileri['Ogrenci_Telefon'] ?>" placeholder="name@example.com" style=" background-color:#EEEEEE;">
                        <label for="floatingInput"><b>Telefon</b></label>
                    </div>
            </div>
            <div class="col-6">
                <div class="form-floating mb-3">
                    <input type="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" class="form-control" name="eposta" id="floatingInput" value="<?php echo $Ogrenci_bilgileri['Ogrenci_Email'] ?>" placeholder="name@example.com" style=" background-color:#EEEEEE;">
                    <label for="floatingInput"><b>E-Posta</b></label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="sifre" id="floatingInput" value="<?php echo $Ogrenci_bilgileri['Ogrenci_Sifre']; ?>" style="background-color:#EEEEEE;">
            <label for="floatingInput"><b>Şifre</b></label>
        </div>
    </div>
    </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px; background-color:#EEEEEE;"></textarea>
                <label for="floatingTextarea2"><b>Adres</b></label>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12" style="text-align:right; padding-right:100px;"><button type="submit" name="iptal" class="btn btn-danger" style="margin-right:30px; width:150px;">İptal</button><button type="submit" name="Guncelle" class="btn btn-success" style="width:150px;">Kaydet</button></div>
        </form>
    </div>

    <?php
    include '../Include/footer.php';
    ?>