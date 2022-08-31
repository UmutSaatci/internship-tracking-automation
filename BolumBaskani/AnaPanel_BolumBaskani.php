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
                <div class="nav_list"> <a href="AnaPanel_BolumBaskani.php" class="nav_link active" style="text-decoration:none;"> <i class='bi bi-house-door nav_icon'></i> <span class="nav_name">Anasayfa</span> </a>
                    <a href="sinif_listesi.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-list-ul nav_icon'></i> <span class="nav_name">Sınıf Listeleri</span> </a>
                    <a href="onay_bekleyen_stajlar.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-clock-history nav_icon'></i> <span class="nav_name">Onay Bekleyen<br>Stajlar</span> </a>
                    <a href="onaylanmis_stajlar.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-person-check nav_icon'></i> <span class="nav_name">Onaylanmış Stajlar</span> </a>
                    
                </div>
            </div> <a href="#" class="nav_link" style="text-decoration:none;"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Çıkış Yap</span> </a>
        </nav>
    </div>
    <?php 
        $baskan_sor=$VeritabaniBaglantisi->prepare("SELECT
        *, 
        baskanlar.baskan_adi, 
        baskanlar.baskan_soyadi, 
        baskanlar.baskan_mail, 
        bolumler.bolum_adi
    FROM
        bolumler
        INNER JOIN
        baskanlar
        ON 
            bolumler.bolum_kodu = baskanlar.baskan_bolum_kodu
        INNER JOIN
        siniflar
        ON 
            bolumler.bolum_kodu = siniflar.sinif_bolum_kodu WHERE baskan_id=?");
            $baskan_sor->execute(array($girenBaskan));
            $Baskan_bilgileri = $baskan_sor->fetch(PDO::FETCH_ASSOC);
        ?>
    <div style="margin-top: 80px;"><h3>Anasayfa</h3></div>
 <div style="border-top:2px solid blue; padding: 20px;">
        <div class="row">
            <div class="col-6">
                <div class="row" style="border:1px solid rgb(175, 172, 172); padding: 20px; border-radius: 15px;">
                    <div class="col-4"><img src="../resimler/<?php echo $Baskan_bilgileri['baskan_resim']; ?>" height="110" width="90" style="border-radius:15px;"></div>
                    <div class="col-8">
                        <p style="line-height: 15px; font-size:14px;"><b>Ad Soyad:</b><?php echo " ";
                                                                                        echo $Baskan_bilgileri['baskan_adi'];
                                                                                        echo " ";
                                                                                        echo $Baskan_bilgileri['baskan_soyadi']; ?></p>
                        <p style="line-height: 15px; font-size:14px;"><b>Mail:</b><?php echo " ";
                                                                                        echo $Baskan_bilgileri['baskan_mail']; ?></p>
                        <p style="line-height: 15px; font-size:14px;"><b>Bölüm:</b><?php echo " ";
                                                                                    echo $Baskan_bilgileri['bolum_adi']; ?></p>
                            

                    </div>
                </div>
            </div>
            <?php $ogrenci_sayisi = $VeritabaniBaglantisi->prepare("SELECT COUNT(*) AS Ogrenci_sayisi FROM ogrenciler WHERE Ogrenci_bolum_kodu=?");
                $ogrenci_sayisi ->execute(array($Baskan_bilgileri['bolum_kodu']));
                $Ogrenci_sayilari = $ogrenci_sayisi->fetch(PDO::FETCH_ASSOC);
                #----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                $sinif_sayisi = $VeritabaniBaglantisi->prepare("SELECT COUNT(*) AS Sinif_sayisi FROM siniflar WHERE sinif_bolum_kodu=?");
                $sinif_sayisi ->execute(array($Baskan_bilgileri['bolum_kodu']));
                $Sinif_sayilari = $sinif_sayisi->fetch(PDO::FETCH_ASSOC);
                #----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                $form_sayisi = $VeritabaniBaglantisi->prepare("SELECT COUNT(*) AS Form_sayisi FROM ogrenciler WHERE Ogrenci_danisman_id=? and OgrenciStajGonderim=? and StajOnay=?");
                $form_sayisi ->execute(array($Baskan_bilgileri['bolum_kodu'],1,1));
                $Form_sayilari = $form_sayisi->fetch(PDO::FETCH_ASSOC);
                #----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                $onaylanan_form_sayisi = $VeritabaniBaglantisi->prepare("SELECT COUNT(*) AS Onaylanan_Form_sayisi FROM ogrenciler WHERE Ogrenci_bolum_kodu=? and StajOnay=? and StajOnayBaskan=?");
                $onaylanan_form_sayisi ->execute(array($Baskan_bilgileri['bolum_kodu'],1,1));
                $Onaylanan_Form_sayilari = $onaylanan_form_sayisi->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="col-6">
                <div class="row" style="border:1px solid rgb(175, 172, 172); padding: 20px; border-radius: 15px;">
                    <div class="col-3 mt-3"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="5em" height="5em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd" d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11s11-4.925 11-11S18.075 1 12 1Zm-.5 5a1 1 0 1 0 0 2h.5a1 1 0 1 0 0-2h-.5ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="col-9">
                        <p style="line-height: 10px; font-size:14px;"><b>ÖZET BİLGİLER</b></p>
                        <p style="line-height: 5px; font-size:14px;"><b>Bölümdeki Toplam Sınıf Sayısı: </b><?php echo " ";
                                            echo $Sinif_sayilari['Sinif_sayisi'];
                                             ?></p>
                        <p style="line-height: 5px; font-size:14px;"><b>Bölümdeki Toplam Öğrenci Sayısı: </b><?php echo " ";
                                         echo $Ogrenci_sayilari['Ogrenci_sayisi']; ?></p>
                        <p style="line-height: 5px; font-size:14px;"><b>Gönderilen Form Sayısı: </b><?php echo " ";
                                         echo $Form_sayilari['Form_sayisi']; ?></p>   
                        <p style="line-height: 5px; font-size:14px;"><b>Onaylanan Form Sayısı: </b><?php echo " ";
                                         echo $Onaylanan_Form_sayilari['Onaylanan_Form_sayisi']; ?></p>              
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div style="border-top:2px solid blue; padding: 20px;">  
    <div class="row">
            <div class="col-8" >  
                <p><b>Staj Takip Otomasyonu Kullanımı Hakkında</b>
               
            </p>
            <p style="font-size:14px;"> Sayın Bölüm Başkanları..</p>
            <p style="font-size:14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Staj takip otomasyonu öğrenciler, danışmanlar, bölüm başkanları ve okulumuzun idaresinin 
                işini kolaylaştırmak için yazılmış bir web sitesi yazılımıdır.İlk olarak öğrencilerimizin bir başvuru formu göndermesi gerekir.
                Öğrencilerin gönderdikleri başvuru formları danışman hocalarının sayfasına düşer ve gerekli kontrolleri sağlanıp
                başvuru formlarını onaylar veya onaylamaz.Staj başvurusu onaylanmayan öğrenciler <i><b>Staj Formu</b></i> adlı sayfada staj başvurularının onaylanmadığını görebilir.
                Onaylanan formlar sizlere yani Bölüm başkanlarına ulaşır Bölüm başkanı da danışman hoca gibi gerekli kontrolleri 
                sağlayıp bir bildirim gönderir eğer başvuru onaylanırsa öğrenci yine <i><b>Staj Formu</b></i> adlı sayfadan yaptığı başvurunun onaylandığını görebilir.Aynı zamanda öğrenciler bu sayfa üzerinden başvurularının değerlendirme aşamasında olduğunu da görebilir.
                </p>
                <p style="line-height: 15px;font-size:14px;">Bölüm Başkanları, bölümde bulunan tüm sınıfların listesini, sınıf mevcudunu ve kaç kişinin form gönderdiğini <a href="../BolumBaskani/sinif_listesi.php"> Sınıf listeleri</a> sayfasından görebilir.</p>
                <p style="line-height: 5px;font-size:14px;">Bölüm Başkanları, <a href="../BolumBaskani/onay_bekleyen_stajlar.php">Onay bekleyen stajlar</a> sayfası üzerinden gönderilen staj formlarını inceleyebilir, onaylayabilir veya reddedebilir.</p>
                <p style="line-height: 15px;font-size:14px;">Bölüm Başkanları, <a href="../BolumBaskani/onaylanmis_stajlar.php">Onaylanmış stajlar</a> sayfası üzerinden onayladıkları staj başvurularını tekrar kontrol edip, öğrenciden gelen geri istek üzerine staj formunu iptal edebilir.</p>
            </div>
    </div>