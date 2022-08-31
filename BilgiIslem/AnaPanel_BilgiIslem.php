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
    <div style="margin-top: 80px;">
        <h3>Anasayfa</h3>
    </div>
    <div style="border-top:2px solid blue; padding: 20px;">  
    <div class="row">
            <div class="col-8" >  
                <p><b>Staj Takip Otomasyonu Kullanımı Hakkında</b>
               
            </p>
            <p style="font-size:14px;"> Sayın İdareciler..</p>
            <p style="font-size:14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Staj takip otomasyonu öğrenciler, danışmanlar, bölüm başkanları ve okulumuzun idaresinin 
                işini kolaylaştırmak için yazılmış bir web sitesi yazılımıdır.İlk olarak öğrencilerimizin bir başvuru formu göndermesi gerekir.
                Öğrencilerin gönderdikleri başvuru formları danışman hocalarının sayfasına düşer ve gerekli kontrolleri sağlanıp
                başvuru formlarını onaylar veya onaylamaz.Staj başvurusu onaylanmayan öğrenciler <i><b>Staj Formu</b></i> adlı sayfada staj başvurularının onaylanmadığını görebilir.
                Onaylanan formlar Bölüm başkanlarına ulaşır Bölüm başkanı da danışman hoca gibi gerekli kontrolleri 
                sağlayıp bir bildirim gönderir eğer başvuru onaylanırsa öğrenci yine <i><b>Staj Formu</b></i> adlı sayfadan yaptığı başvurunun onaylandığını görebilir.
                Aynı zamanda öğrenciler bu sayfa üzerinden başvurularının değerlendirme aşamasında olduğunu da görebilir.
                </p>
                <p style="font-size:14px;">İdare paneli kullanıcıları Kayıtlarını yaptıran öğrencileri ekleyebilir, yeni tayin olan danışmanları ekleyebilir, 
                yeni tayin olan bölüm başkanlarını ekleyebilir, sınıflara danışman atayabilir ve staj başlangıç ve bitiş tarihlerini girebilir.
                  <br>Kayıt yaptıran öğrencileri eklerken açılır panelde bulunan <a href="Ogrenci_ekle.php">Öğrenci Ekle</a> sayfası kullanılır.
                  <br>Yeni tayin olan danışman eklerken açılır panelde bulunan <a href="Danisman_ekle.php">Danışman Ekle</a> sayfası kullanılır.
                  <br>Yeni tayin olan bölüm başkanı eklerken açılır panelde bulunan <a href="BolümBaskani_ekle.php">Bölüm Başkanı Ekle</a> sayfası kullanılır.
                  <br>Fakülteye yeni bölüm eklendiğinde <a href="Bolüm_ekle.php">Bölüm Ekle</a> sayfası kullanılır.
                  <br>Staj Sürelerindeki başlangıç tarihi ve bitiş tarihi <a href="Staj_tarihgir.php">Başlangıç-Bitiş Tarihi gir</a> sayfasından belirlenir.
                  <br>Sınıflara Danışman atamak için <a href="danisman_ata.php">Danışman ata</a> sayfası kullanılır.

            </p>
            </div>
    </div>
    <?php
    include '../Include/footer.php';
    ?>