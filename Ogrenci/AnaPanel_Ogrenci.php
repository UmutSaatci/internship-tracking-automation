<?php
include '../Include/Header.php';
$girenögrenci = $_SESSION['ÖgrenciID'];
?>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="AnaPanel_Ogrenci.php" class="nav_logo"><span class="nav_logo-name"><img src="../resimler/ktun_logo_koyu_zemin.gif" height="40"></span> </a>
                <div class="nav_list"> <a href="AnaPanel_Ogrenci.php" class="nav_link active" style="text-decoration:none;"> <i class='bi bi-house-door nav_icon'></i> <span class="nav_name">Anasayfa</span> </a>
                    <a href="kisisel_bilgiler.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-card-checklist nav_icon'></i> <span class="nav_name">Kişisel Bilgiler</span> </a>
                    <a href="staj_formu.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-ui-checks nav_icon'></i> <span class="nav_name">Staj Formu</span> </a>
                    <a href="Staj_DurumKontrol.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-eye nav_icon'></i> <span class="nav_name">Staj Onay Durumu</span> </a>
                    <a href="stajdosyası.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-journal-text nav_icon'></i> <span class="nav_name">Staj Dosya <br>Yükle</span> </a>
                </div>
            </div> <a href="uyecikis.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Çıkış Yap</span> </a>
        </nav>
    </div>
    <div style="margin-top: 80px;">
        <h3>Anasayfa</h3>
    </div>
    <div style="border-top:2px solid blue; padding: 20px;">
        <div class="row">
            <div class="col-6">
                <div class="row" style="border:1px solid rgb(175, 172, 172); padding: 20px; border-radius: 15px;">
                    <div class="col-3 mt-5"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="5em" height="5em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd" d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11s11-4.925 11-11S18.075 1 12 1Zm-.5 5a1 1 0 1 0 0 2h.5a1 1 0 1 0 0-2h-.5ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <?php
                    $ogrenci_sor = $VeritabaniBaglantisi->prepare("SELECT
                    siniflar.sinif_adi, 
                    ogrenciler.Ogrenci_adi, 
                    ogrenciler.Danisman_SicilNo,
                    ogrenciler.Ogrenci_soyadi, 
                    ogrenciler.Ogrenci_Email, 
                    ogrenciler.Ogrenci_no, 
                    bolumler.bolum_adi FROM ogrenciler INNER JOIN siniflar ON ogrenciler.Ogrenci_sinif_id = siniflar.sinif_id
                    INNER JOIN bolumler ON ogrenciler.Ogrenci_bolum_kodu = bolumler.bolum_kodu WHERE Ogrenci_id=?");
                    $ogrenci_sor->execute(array($girenögrenci));
                    $Ogrenci_bilgileri = $ogrenci_sor->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="col-9">
                        <p style="line-height: 15px; font-size:14px;"><b>Ad Soyad:</b><?php echo " ";
                                                                                        echo $Ogrenci_bilgileri['Ogrenci_adi'];
                                                                                        echo " ";
                                                                                        echo $Ogrenci_bilgileri['Ogrenci_soyadi'] ?></p>
                        <p style="line-height: 15px; font-size:14px;"><b>Öğrenci No:</b><?php echo " ";
                                                                                        echo $Ogrenci_bilgileri['Ogrenci_no']; ?></p>
                        <p style="line-height: 15px; font-size:14px;"><b>Sınıf:</b><?php echo " ";
                                                                                    echo $Ogrenci_bilgileri['sinif_adi']; ?></p>
                        <p style="line-height: 15px; font-size:14px;"><b>Mail:</b> <?php echo $Ogrenci_bilgileri['Ogrenci_Email'] ?></p>
                        <p style="line-height:20px; font-size:14px;"><b>Program:</b> Teknik Bilimler Meslek Yüksekokulu / <?php echo " ";
                                                                                                                            echo $Ogrenci_bilgileri['bolum_adi']; ?></p>
                    </div>

                </div>
            </div>

            <?php $danisman_sor = $VeritabaniBaglantisi->prepare("SELECT
	danismanlar.danisman_adi, 
	danismanlar.danisman_soyadi, 
	danismanlar.danisman_email,
    danismanlar.danisman_resim FROM danismanlar INNER JOIN ogrenciler ON danismanlar.danisman_sicilNo = ogrenciler.Danisman_SicilNo WHERE ogrenciler.Danisman_SicilNo=?");
            $danisman_sor->execute(array($Ogrenci_bilgileri['Danisman_SicilNo']));
            $Danisman_bilgileri = $danisman_sor->fetch(PDO::FETCH_ASSOC);  ?>
            <div class="col-6">
                <div class="row" style="border:1px solid rgb(175, 172, 172); padding: 20px; border-radius: 15px;">
                    <div class="col-4 mt-4 pb-4"><img src="../resimler/<?php echo $Danisman_bilgileri['danisman_resim']; ?>" height="112" style="border-radius:15px;"></div>
                    <div class="col-8 mt-3">
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
    <div style="border-top:2px solid blue; padding: 20px;">
        <div class="row">
            <div class="col-8">
                <p><b>Staj Takip Otomasyonu Kullanımı Hakkında</b>

                </p>
                <p style="font-size:14px;"> Sayın öğrenciler..</p>
                <p style="font-size:14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Staj takip otomasyonu öğrenciler, danışmanlar, bölüm başkanları ve okulumuzun idaresinin
                    işini kolaylaştırmak için yazılmış bir web sitesi yazılımıdır.İlk olarak bir başvuru formu göndermeniz gerekiyor.Gönderdiğiniz başvuru formu sınıfınız danışman
                    hocasına ulaşır danışman hoca bu kısımda gönderdiğiniz formu, imza resimlerini, fotoğraflarınızı kontrol edip staj formunuza onay veya red verir.
                    Danışman hoca reddettiğinde gönderdiğiniz form silinir ve tekrardan bir form göndermeniz gerekir.
                    Danışman hoca staj formunu onayladığında ise gönderilen form bölüm başkanına ulaşır ve bölüm başkanı yine gerekli kontrolleri
                    sağlar ve onay veya red verir.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Staj formunun onaylanıp onaylanmadığını <a href="Staj_DurumKontrol.php">Staj Kontrol</a> sayfasından görünebilir.Bu sayfada eğer
                    <br><b>"Staj başvurunuz onaylanmıştır"</b> şeklinde bir mesaj var ise Danışman hocanız ve bölüm başkanınız başvurunuzu onaylanmış demektir.Eğer <b>"Staj başvurunuz değerlendirme sürecinde" </b>
                    şeklinde bir mesaj var ise gönderilen form Danışman hocanız ve Bölüm başkanınız tarafından kontrol ediliyor demektir.Son olarak <b>"Staj başvurunuz reddedilmiştir"</b> şeklinde mesaj görüyorsanız
                    staj başvurunuz, danışman hocanız veya Bölüm başkanınız tarafından reddedilmiş demektir böyle bir durumda yeni bir staj formu gönderip tekrar başvuru sürecinden geçilmesi gerekir.
                </p>
                <p style="line-height: 15px;font-size:14px;">Öğrenciler, kayıtlı kişisel bilgilerini(Mail adresi, telefon numarası, ikametgah adresi) gibi bilgileri <a href="../Ogrenci/kisisel_bilgiler.php">Kişisel bilgiler</a> sayfasından düzenleyebilir.</p>
                <p style="line-height: 5px;font-size:14px;">Öğrenciler, Eğer göndermemişlerse <a href="../Ogrenci/staj_formu.php">Staj Formu</a> sayfasından formlarını gönderebilir.</p>

            </div>
        </div>
        <?php
        include '../Include/footer.php';
        ?>