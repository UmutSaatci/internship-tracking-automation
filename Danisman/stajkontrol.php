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
        <div class="nav_list"> <a href="AnaPanel_Danisman.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-house-door  nav_icon'></i> <span class="nav_name">Anasayfa</span> </a>
          <a href="sinif_listeleri.php" class="nav_link active" style="text-decoration:none;"> <i class='bi bi-list-ul nav_icon'></i> <span class="nav_name">Sınıf Listeleri</span> </a>
          <a href="onay_bekleyen_stajlar.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-clock-history nav_icon'></i> <span class="nav_name" style="text-decoration: center;">Onay Bekleyen<br>Stajlar</span> </a>
          <a href="onaylanmis_stajlar.php" class="nav_link" style="text-decoration:none; text-align: center;"> <i class='bi bi-person-check nav_icon'></i> <span class="nav_name">Onaylanmış Stajlar</span> </a>
          <a href="gönderilen_staj_dosyaları.php" class="nav_link" style="text-decoration:none; text-align: center;"> <i class="bi bi-journal-check nav_icon"></i> <span class="nav_name">Staj Dosyaları</span> </a>

        </div>
      </div> <a href="#" class="nav_link" style="text-decoration:none;"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Çıkış Yap</span> </a>
    </nav>
  </div>
  <div class="row">
    <div class="col-8" style="margin-top: 80px;">
      <h3>Staj Kontrol</h3>
    </div>
    <div class="col-4" style="margin-top: 80px; text-align: right;">
      <form action="ogrenci_bul.php" method="GET" role="form" class="d-flex" style="margin-left: 20px; width:300px;">
        <input class="form-control me-2" name="arananOgrenci" type="search" required="required" style="border-radius: 10px; text-align: center; background-color: black; color: white;" placeholder="Öğrenci Ara" aria-label="Search">
        <button class="btn" name="arama" type="submit"><b>Bul</b></button>
      </form>
    </div>
  </div>
  <div style="border-top:2px solid blue; padding: 20px;">
    <?php
    $stajdurumu = $VeritabaniBaglantisi->prepare("SELECT
    *
  FROM
    stajbasvurudetay
    INNER JOIN
    il
    ON 
      stajbasvurudetay.OgrenciIl = il.il_no
    INNER JOIN
    ilce
    ON 
      stajbasvurudetay.OgrenciIlce = ilce.ilce_no
  WHERE
    OgrenciID = ? ORDER BY OgrenciID ASC");
    $stajdurumu->execute(array($GelenID));
    $stajkontrol = $stajdurumu->fetch(PDO::FETCH_ASSOC);

    ?>


    <form method="POST">
      <div>
        <div class="row">

          <div class="col-4" style="text-align:right;"><img src="../resimler/logoo.png" height="120"></div>
          <div class="col-4" style="font-size:16px; text-align:center; padding-right:50px;"><b>T. C.
              KONYA TEKNİK ÜNİVERSİTESİ<br>
              TEKNİK BİLİMLER MESLEK YÜKSEKOKULU<br>
              2019-2020 YAZ DÖNEMİ (PANDEMİ DÖNEMİ)<br>
              ZORUNLU STAJ BAŞVURU FORMU<br> VE
              İŞ YERİ STAJ SÖZLEŞMESİ<br><br> İLGİLİ MAKAMA</b></div>
          <div class="col-4"><img src="../resimler/<?php echo $stajkontrol['Ogrenci_Vesikalık']; ?>" style="height:120px; width:110px;">
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <p style="margin:0 200px 0 200px;">Aşağıda kimlik bilgileri verilen öğrencimiz kurumunuzda/işyerinizde staj (zorunlu) yapma
              talebinde bulunmuştur. 5510 sayılı Kanunun 5/b maddesi ve Sosyal Güvenlik Kurumunun 2011/36 sayılı
              sayılı genelgesi gereğince <b>iş kazası ve meslek hastalığı sigortası (kısa vadeli sigorta kolları primi)
                üniversitemiz tarafından yapılacaktır.</b> Öğrencimizin <b><u>zorunlu stajını</u></b> kuruluşunuzda/işyerinizde
              yapmasında göstereceğiniz ilgiye teşekkür eder, saygılar sunarız. </p>
          </div>
        </div>

        <div class="row mt-5" style="padding:0 200px 0 200px;">
          <h6>Öğrencinin Okul ve Nüfus Kayıt Bilgileri</h6>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="OgrenciIsim" value="<?php echo $stajkontrol['OgrenciIsim']; ?>" style="height:50px;" readonly>
              <label for="floatingInput"><b>İsim</b></label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingInput" name="OgrenciMail" value="<?php echo $stajkontrol['OgrenciMail']; ?>" style="height:50px;" readonly>
              <label for="floatingInput"><b>Email</b></label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="OgrenciSoyisim" value="<?php echo $stajkontrol['OgrenciSoyisim']; ?>" style="height:50px;" readonly>
              <label for="floatingInput"><b>Soyadı</b></label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="OgrenciTelefon" value="<?php echo $stajkontrol['OgrenciTelefon']; ?>" style="height:50px;" readonly>
              <label for="floatingInput"><b>Telefon</b></label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="OgrenciOkulNo" value="<?php echo $stajkontrol['OgrenciOkulNo']; ?>" style="height:50px;" readonly>
              <label for="floatingInput"><b>Öğrenci No</b></label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="OgrenciSSKNo" value="<?php echo $stajkontrol['OgrenciSSKNo']; ?>" style="height:50px;" readonly>
              <label for="floatingInput"><b>S.S.K. No.</b></label>
            </div>
          </div>
          <div class="col-12">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="OgrenciBolumAdı" value="<?php echo $stajkontrol['OgrenciBolumAdı']; ?>" style="height:50px;" readonly>
              <label for="floatingInput"><b>Bölüm Adı</b></label>
            </div>
          </div>
          <div class="col-9">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="OgrenciProgramSınıf" value="<?php echo $stajkontrol['OgrenciProgramSınıf']; ?>" style="height:50px;" readonly>
              <label for="floatingInput"><b>Program/Sınıf</b></label>
            </div>
          </div>
          <div class="col-3">
            <div class="form-check">
              <?php echo "Staj Dönemi";
              echo " : ";
              echo $stajkontrol['OgrenciStajDonem'] ?>

            </div>
          </div>
          <div class="col-12">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="OgrenciIkametgahAdres" value="<?php echo $stajkontrol['OgrenciIkametgahAdres']; ?>" style="height:50px;" readonly>
              <label for="floatingInput"><b>İkametgah Adresi</b></label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="OgrenciTC" value="<?php echo $stajkontrol['OgrenciTC']; ?>" required="required" style="height:50px;" readonly>
              <label for="floatingInput"><b>TC Kimlik Numarası</b></label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <select class="form-select" aria-label="Default select example" style="padding-top:17px; height:50px" disabled>
                <option selected><?php echo $stajkontrol['il_isim']; ?></option>

              </select>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="OgrenciTCSeriNo" value="<?php echo $stajkontrol['OgrenciTCSeriNo']; ?>" required="required" style="height:50px;" readonly>
              <label for="floatingInput"><b>Nüfus Cüzdanı Seri Numarası</b></label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <select class="form-select" aria-label="Default select example" style="padding-top:17px; height:50px" disabled>
                <option selected><?php echo $stajkontrol['ilce_isim']; ?></option>

              </select>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="OgrenciBabaAdi" value="<?php echo $stajkontrol['OgrenciBabaAdi']; ?>" required="required" style="height:50px;" readonly>
              <label for="floatingInput"><b>Baba Adı</b></label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="OgrenciKoyMahalle" value="<?php echo $stajkontrol['OgrenciKoyMahalle']; ?>" required="required" style="height:50px;" readonly>
              <label for="floatingInput"><b>Mahalle - Köy</b></label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="OgrenciAnneAdi" value="<?php echo $stajkontrol['OgrenciAnneAdi']; ?>" required="required" style="height:50px;" readonly>
              <label for="floatingInput"><b>Anne Adı</b></label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="OgrenciCiltNo" value="<?php echo $stajkontrol['OgrenciCiltNo']; ?>" required="required" style="height:50px;" readonly>
              <label for="floatingInput"><b>Cilt No</b></label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="OgrenciDogumYer" value="<?php echo $stajkontrol['OgrenciDogumYer']; ?>" required="required" style="height:50px;" readonly>
              <label for="floatingInput"><b>Doğum Yeri</b></label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="OgrenciAileSiraNo" value="<?php echo $stajkontrol['OgrenciAileSiraNo']; ?>" required="required" style="height:50px;" readonly>
              <label for="floatingInput"><b>Aile Sıra No</b></label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="date" class="form-control" id="floatingInput" value="<?php echo $stajkontrol['OgrenciDogumTarihi']; ?>" name="OgrenciDogumTarihi" style="height:50px;" readonly>
              <label for="floatingInput"><b>Doğum Tarih</b></label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="OgrenciSiraNo" value="<?php echo $stajkontrol['OgrenciSiraNo']; ?>" required="required" style="height:50px;" readonly>
              <label for="floatingInput"><b>Sıra No</b></label>
            </div>
          </div>
          <h6 style="margin-top:15px;">Staj Yapılacak Kurumun / Kuruluşun</h6>
          <div class="col-12">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="SirketAdi" value="<?php echo $stajkontrol['SirketAdi']; ?>" required="required" style="height:50px;" readonly>
              <label for="floatingInput"><b>Adı</b></label>
            </div>
          </div>
          <div class="col-12">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="SirketAdres" value="<?php echo $stajkontrol['SirketAdres']; ?>" required="required" style="height:50px;" readonly>
              <label for="floatingInput"><b>Adresi</b></label>
            </div>
          </div>
          <div class="col-12">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="SirketHizmetAlani" value="<?php echo $stajkontrol['SirketHizmetAlani']; ?>" required="required" style="height:50px;" readonly>
              <label for="floatingInput"><b>Üretim/Hizmet Alanı</b></label>
            </div>
          </div>
          <div class="col-5"><label>
              <?php
              $tarihCek = $VeritabaniBaglantisi->prepare("SELECT StajBaslangicTarihi, StajBitisTarihi FROM bilgi_islem");
              $tarihCek->execute();
              $tarihGetir = $tarihCek->fetch(PDO::FETCH_ASSOC);
              ?>
              <b>Başlangıç Tarihi: <?php echo $tarihGetir['StajBaslangicTarihi'] ?> </b>

            </label></div>
          <div class="col-4"><label>
              <b>Bitiş Tarihi: <?php echo $tarihGetir['StajBitisTarihi'] ?></b>
              <!--Hocadan Alınacak-->

            </label></div>

          <div class="col-3" style="margin-top:0px;">
            <b>Süre / İş Günü : 30</b>
          </div>
          <div class="col-12">
            <div class="form-floating mt-3 mb-3">
              <input type="text" class="form-control" id="floatingInput" name="SirketToplamPersonel" value="<?php echo $stajkontrol['SirketToplamPersonel']; ?>" required="required" style="height:50px;" readonly>
              <label for="floatingInput"><b>Kurumda / İşletmede çalışan toplam personel sayısı</b></label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="SirketTelefonNo" value="<?php echo $stajkontrol['SirketTelefonNo']; ?>" required="required" style="height:50px;" readonly>
              <label for="floatingInput"><b>Telefon Numarası</b></label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="SirketFaksNo" value="<?php echo $stajkontrol['SirketFaksNo']; ?>" required="required" style="height:50px;" readonly>
              <label for="floatingInput"><b>Faks Numarası</b></label>
            </div>
          </div>
          <div class="col-12">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="SirketYetkiliAdSoyadGorevUnvan" value="<?php echo $stajkontrol['SirketYetkiliAdSoyadGorevUnvan']; ?>" required="required" style="height:50px;" readonly>
              <label for="floatingInput"><b>Yetkilinin Adı Soyadı, Görevi ve Ünvanı</b></label>
            </div>
          </div>

          <div class="col-8">
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingInput" name="SirketMail" value="<?php echo $stajkontrol['SirketMail']; ?>" required="required" style="height:50px;" readonly>
              <label for="floatingInput"><b>E-Posta</b></label>
            </div>
          </div>
          <div class="col-4">Şirket İmza<img src="../resimler/<?php echo $stajkontrol['Sirketİmza']; ?>" style="height:120px; width:200px;"></div>
          <div class="col-8">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" name="SirketWebAdres" value="<?php echo $stajkontrol['SirketWebAdres']; ?>" required="required" style="height:50px;" readonly>
              <label for="floatingInput"><b>Web Adresi</b></label>
            </div>
          </div>
          <div class="col-4">Öğrenci İmza<img src="../resimler/<?php echo $stajkontrol['OgrenciImza']; ?>" style="height:120px; width:200px;"></div>
        </div>
      </div>

      <hr>
      </hr>
      <div>
        <div class="row">
          <div class="col-4" style="text-align:right;"></div>
          <div class="col-12">
            <p style="margin:0 200px 0 200px;"><b>GENEL HÜKÜMLER</b><br><br> MADDE 1- Bu sözleşme, 3308 sayılı Mesleki Eğitim Kanununa uygun olarak, mesleki
              ve teknik eğitim yapan program öğrencilerinin işletmelerde yapılacak iş yeri stajının esaslarını
              düzenlemek amacıyla Konya Teknik Üniversitesi Teknik Bilimler Meslek Yüksekokulu
              Müdürlüğü, işveren (veya vekili) ve öğrenci arasında imzalanır.<br>
              MADDE 2- Üç nüsha olarak düzenlenen ve taraflarca imzalanan bu sözleşmenin, bir
              nüshası Konya Teknik Üniversitesi Teknik Bilimler Meslek Yüksekokulu Müdürlüğünde, bir
              nüshası işletmede, bir nüshası öğrencide bulunur. <br>
              MADDE 3- Staj, Konya Teknik Üniversitesi Akademik Takvimine göre planlanır ve yapılır. <br>
              MADDE 4- Öğrencilerin iş yeri stajı sırasında, iş yeri kusurundan dolayı meydana
              gelebilecek iş kazaları ve meslek hastalıklarından işveren /işveren vekili sorumludur.<br>
              MADDE 5- Staj, Konya Üniversitesi Meslek Yüksekokulları Staj Yönergesi, ilgili birimin
              Staj Yönergesi ve 3308 sayılı Mesleki Eğitim Kanunu hükümlerine göre yürütülür.<br>
              MADDE 6- Konya Teknik Üniversitesi akademik takvimine uygun olarak stajın başladığı
              tarihten itibaren yürürlüğe girmek üzere taraflarca imzalanan bu sözleşme, öğrencilerin iş yeri
              stajını tamamladığı tarihe kadar geçerlidir.<br><br><br>
              <b>SÖZLEŞMENİN FESHİ</b><br><br>
              MADDE 7- Sözleşme; <br>
              a. İş yerinin çeşitli sebeplerle kapatılması,<br>
              b. İş yeri sahibinin değişmesi halinde yeni iş yerinin aynı mesleği/üretimi sürdürememesi,<br>
              c. Öğrencilerin Yükseköğretim Kurumları Öğrenci Disiplin Yönetmeliği hükümlerine
              göre uzaklaştırma cezası aldığı sürece veya çıkarma cezası alarak ilişiğinin kesilmesi
              durumunda sözleşme feshedilir.<br><br><br>
              <b>ÜCRET VE İZİN</b><br><br>
              MADDE 8- 3308 sayılı Kanun'un 25 inci maddesi birinci fıkrasına göre öğrencilere,
              işletmelerde iş yeri eğitimi devam ettiği sürece yürürlükteki aylık asgari ücret net tutarının,
              yirmi ve üzerinde personel çalıştıran iş yerlerinde %30’undan, yirmiden az personel çalıştıran
              iş yerlerinde %15’inden az olmamak üzere ücret ödenir. Ücret başlangıçta <input type="text" placeholder="Alacağınız ücreti girin.." readonly>
              TL’dir. Öğrenciye ödenecek ücret, her türlü vergiden muaftır.<br>Asgari ücrette artış olması hâlinde, bu artışlar aynı oranda öğrencilerin ücretlerine
              yansıtılır. <br>
              MADDE 9- Öğrencilerin, biriminin Staj Yönergesinde yer alan devam zorunluluğunu
              (sınavları hariç) yerine getirmeleri gerekir.<br><br><br>
              <b>SİGORTA</b><br><br>
              MADDE 10- Öğrenciler, bu sözleşmenin akdedilmesiyle işletmelerde iş yeri stajına devam
              ettikleri sürece 5510 sayılı Sosyal Sigortalar Kanunu’nun 4’üncü maddesinin birinci fıkrasının
              (a) bendine göre iş kazası ve meslek hastalığı sigortası, Konya Teknik Üniversitesi Teknik
              Bilimler Meslek Yüksekokulu Müdürlüğünce yaptırılır.<br>
              MADDE 11- Konya Teknik Üniversitesi Teknik Bilimler Meslek Yüksekokulu
              Müdürlüğünce ödenmesi gereken sigorta primleri, Sosyal Güvenlik Kurumunun belirlediği
              oranlara göre, Sosyal Güvenlik Kurumuna ödenir veya bu Kurumun hesabına aktarılır.<br>
              MADDE 12- Sigorta ve prim ödemeyle ilgili belgeler, Konya Teknik Üniversitesi Teknik
              Bilimler Meslek Yüksekokulu Müdürlüğünce saklanır.<br><br><br>
              <b>ÖĞRENCİNİN DİSİPLİN, DEVAM VE BAŞARI DURUMU</b><br><br>
              MADDE 13- Öğrenciler, staj takviminde belirtilen sürelerde, işletmelere devam etmek
              zorundadırlar. İşletmelerde iş yeri stajına mazeretsiz olarak devam etmeyen öğrencilerin
              ücretleri kesilir. Bu konuda işletmeler yetkilidir. <br>
              MADDE 14- İşletme yetkilileri, mazeretsiz olarak üç (3) iş günü staja gelmeyen öğrenciyi,
              en geç beş (5) iş günü içinde Konya Teknik Üniversitesi Teknik Bilimler Meslek Yüksekokulu
              Müdürlüğüne bildirir.<br>
              MADDE 15- Öğrencilerin işletmelerde disiplin soruşturmasını gerektirecek davranışlarda
              bulunmaları halinde, bu durum işletme tarafından Konya Teknik Üniversitesi Teknik Bilimler
              Meslek Yüksekokulu Müdürlüğüne yazılı olarak bildirilir. Disiplin işlemi, Konya Teknik
              Üniversitesi Teknik Bilimler Meslek Yüksekokulu Müdürlüğü tarafından Yükseköğretim
              Kurumları Öğrenci Disiplin Yönetmeliği hükümlerine göre yürütülür. Sonuç, işletmeye yazılı
              olarak bildirilir. <br>
              MADDE 16- İşletmelerde staj yapan öğrencilerin başarı durumu, Konya Teknik
              Üniversitesi Öğrenci Staj Yönetmeliği ile ilgili birimin Staj Yönergesi hükümlerine göre
              belirlenir.<br><br><br>
              <b>TARAFLARIN DİĞER GÖREV VE SORUMLULUKLARI</b><br><br>
              MADDE 17- <b>İş yeri stajı yaptıracak işletmelerin sorumlulukları: </b><br>
              a. Öğrencilerin stajını Konya Teknik Üniversitesi Akademik Takvimine uygun olarak yaptır<br>
              b. İş yeri stajının, Konya Teknik Üniversitesi Teknik Bilimler Meslek Yüksekokulu Staj ve
              Eğitim Uygulama Kurullarınca belirlenen yerde yapılmasını sağlamak, <br>
              c. Stajın yapılacağı programlarda, öğrencilerin iş yeri stajından sorumlu olmak üzere, yeter
              sayıda eğitim personelini görevlendirmek,<br>
              d. İşletmede iş yeri stajı yapan öğrencilere, 3308 sayılı Kanunun 25 inci maddesi birinci
              fıkrasına göre ücret miktarı, ücret artışı vb. konularda iş yeri stajı sözleşmesi imzalamak,<br>
              e. Öğrencilerin devam durumlarını izleyerek devamsızlıklarını ve hastalık izinlerini, süresi
              içinde Konya Teknik Üniversitesi Teknik Bilimler Meslek Yüksekokulu Müdürlüğüne bildirmek, <br>
              f. Öğrencilerin stajına ait bilgileri içeren formlarını, staj bitiminde kapalı zarf içinde ilgili
              Konya Teknik Üniversitesi Teknik Bilimler Meslek Yüksekokulu Müdürlüğüne göndermek, <br>
              g. İş yeri stajında öğrencilere devamsızlıktan sayılmak ve mevzuatla belirlenen azami
              devamsızlık süresini geçmemek üzere, ücretsiz mazeret izni vermek, <br>
              h. Öğrencilerin iş kazaları ve meslek hastalıklarından korunması için gerekli önlemleri almak
              ve tedavileri için gerekli işlemleri yapmak. <u>Öğrenci ile ilgili bir iş kazasının vuku bulması halinde
                kazanın olduğu gün dahil en geç 1 iş günü içinde Konya Teknik Üniversitesi Teknik Bilimler
                Meslek Yüksekokulu Müdürlüğüne yazılı olarak bildirmek.</u><br>
              MADDE 18- <b>Konya Teknik Üniversitesi Teknik Bilimler Meslek Yüksekokulu
                Müdürlüğünün görev ve sorumlulukları:</b>
              a. 3308 sayılı Kanunun 25 inci maddesi birinci fıkrasına göre öğrencilerle birlikte
              işletmelerle ücret miktarı, ücret artışı vb. konularda iş yeri eğitimi sözleşmesi imzalamak. <br>
              b. İş yeri stajı yapılacak programlarda öğrencilerin işletmede yapacakları etkinliklerle ilgili
              formların staj başlangıcında işletmelere verilmesini sağlamak, <br>
              c. Stajın işletme tarafından görevlendirilecek personel tarafından yaptırılmasını sağlamak,<br>
              d. Stajının, ilgili meslek alanlarına uygun olarak yapılmasını sağlamak,<br>
              e. Öğrencilerin mazeret izinleri ve devam-devamsızlık durumlarının izlenmesini sağlamak,<br>
              f. Öğrencilerin sigorta primlerine ait işlemleri Yönetmelik esaslarına göre yürütmek,<br>
              g. İşletmelerde yapılan iş yeri stajında amaçlanan hedeflere ulaşılması için işletme
              yetkilileriyle iş birliği yaparak gerekli önlemleri almak,<br>
              MADDE 19- <b>İş yeri eğitimi gören öğrencilerin görev ve sorumlulukları:</b><br>
              a. İş yerinin şartlarına ve çalışma düzenine uymak, staja düzenli olarak devam etmek,<br>
              b. İş yerine ait özel bilgileri üçüncü şahıslara iletmemek,<br>
              c. Sendikal etkinliklere katılmamak,<br>
              d. Staj süresince iş yerinde gördüğü eğitimle ilgili bilgileri, izlenimlerini Staj dosyasına rapor
              etmek ve ilgili formları doldurmak, <br><br><br>
              <b><i>DİĞER HUSUSLAR</i></b><br><br>
              MADDE 20- İşletmelerde iş yeri stajı yapan öğrenciler hakkında bu sözleşmede yer
              almayan diğer hususlarda, ilgili mevzuat hükümlerine göre işlem yapılır. <br>

              MADDE 21- İşletme tarafından öğrenci aşağıdaki sosyal haklardan yararlandırılacaktır.<br>

              <label for="exampleFormControlInput1" class="form-label"></label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="İşletme tarafından sağlanan sosyal haklar" readonly>
              <label for="exampleFormControlInput1" class="form-label"></label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="İşletme tarafından sağlanan sosyal haklar" readonly>
              <label for="exampleFormControlInput1" class="form-label"></label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="İşletme tarafından sağlanan sosyal haklar" readonly><br>
              MADDE 22- Staj uygulaması esnasında staj yönergesinde belirtilen esaslara göre,
              yönergedeki süreleri aşmadan rapor, izin kullanan öğrenciler, rapor/izin olarak kullandığı süreyi
              (Stajın son gününe kadar) yazılı olarak okula bildirmek (DİLEKÇE ile) ve bu süreyi staj sonuna
              eklemek zorundadır. Yazılı olarak bildirim yapılmadığı takdirde iş kazası ve meslek hastalığı
              sigortası normal staj süresi bitiminde sonlandırılır.<br><br><br>


              <b>YÜRÜRLÜK</b><br>
              MADDE 23- Staj başlangıç tarihi olan
              <?php echo $tarihGetir['StajBaslangicTarihi'] ?> tarihinde yürürlüğe girmek üzere
              taraflarca imzalanan bu sözleşme stajın tamamlandığı
              <?php echo $tarihGetir['StajBitisTarihi'] ?> tarihe kadar geçerlidir.
          </div>
          <div class="row mt-5" style="padding:0 200px 0 200px;">

            <div class="col-12">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="SirketAdi" value="<?php echo $stajkontrol['SirketAdi']; ?>" required="required" style="height:50px;" readonly>
                <label for="floatingInput"><b>İşletme Adı</b></label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" required="required" value="KONYA TEKNİK ÜNİVERSİTESİ (KTÜN) 
TEKNİK BİLİMLER MESLEK YÜKSEKOKULU" style="height:50px;" disabled readonly>
                <label for="floatingInput"><b>Meslek Yüksekokulu Adı</b></label>

              </div>
            </div>

            <div class="col-6"><b>ÖĞRENCİ</b></div>
            <div class="col-6"><b>İŞVEREN VEYA VEKİLİ</b></div>

            <div class="col-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" value="<?php echo $stajkontrol['OgrenciIsim'];
                                                                                  echo " ";
                                                                                  echo $stajkontrol['OgrenciSoyisim']; ?>" required="required" style="height:50px;" readonly>
                <label for="floatingInput"><b>Adı Soyadı:</b></label>
              </div>
            </div>
            <div class="col-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="SirketYetkiliAdSoyadGorevUnvan" value="<?php echo $stajkontrol['SirketYetkiliAdSoyadGorevUnvan']; ?>" required="required" style="height:50px;" readonly>
                <label for="floatingInput"><b>Adı Soyadı:</b></label>
              </div>
            </div>
            <div class="col-6"><img src="../resimler/<?php echo $stajkontrol['OgrenciImza']; ?>" style="height:120px; width:200px;"></div>
            <div class="col-6"><img src="../resimler/<?php echo $stajkontrol['Sirketİmza']; ?>" style="height:120px; width:200px;"></div>
            <div class="col-6"></div>
            <div class="col-6">
              <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" id="floatingInput" value="<?php echo $stajkontrol['SirketYetkiliGorev']; ?>" required="required" style="height:50px;" readonly>
                <label for="floatingInput"><b>Görevi:</b></label>
              </div>
            </div>


            <div class="col-6">
              <div class="form-floating mb-3">
                <input type="date" class="form-control" id="floatingInput" value="<?php echo $stajkontrol['OgrenciİmzaTarih']; ?>" name="OgrenciİmzaTarih" readonly>
                <label for="floatingInput"><b>Tarih</b></label>
              </div>
            </div>
            <div class="col-6">
              <div class="form-floating mb-3">
                <input type="date" class="form-control" id="floatingInput" value="<?php echo $stajkontrol['SirketİmzaTarih'] ?>" name="SirketİmzaTarih" readonly>
                <label for="floatingInput"><b>Tarih</b></label>
              </div>
            </div>


            <br>
            <br>
            <hr>
            </hr>
            <?php $Ücret = $VeritabaniBaglantisi->prepare("SELECT * FROM stajbasvurudetay WHERE OgrenciID=?");
            $Ücret->execute(array($GelenID));
            $Ücret2 = $Ücret->fetch(PDO::FETCH_ASSOC); ?>

            <div class="row">

              <?php if ($Ücret2['ÜcretAliyorMu'] == "Alıyor") { ?>
                <div class="col-4" style="text-align:left;"><img src="../resimler/logoo.png" height="120"></div>
                <div class="col-8" style="font-size:16px; text-align:center; padding-right:40px; margin-top:30px;"><b>
                    KONYA TEKNİK ÜNİVERSİTESİ<br>
                    TEKNİK BİLİMLER MESLEK YÜKSEKOKULU<br>
                    STAJER ÜCRETLERİNE İŞSİZLİK FONU KATKISI BİLGİ FORMU</b></div>
                <div class="col-4" style="text-align:right;"></div>
                <div class="col-12">
                  <p style="margin:10px 0px 0px 110px;">3308 Sayılı Mesleki Eğitim Kanununa göre işletmelerde Mesleki Eğitim Gören Öğrencilerin</p>
                  <p style="margin:0px 0px 0px 0px;">ücretlerinin bir kısmının işsizlik sigortası fonundan karşılanmasına ilişkin usul ve esasları kapsamında staj
                    yapan ve ücret alan öğrencilerin işyerlerine devlet tarafından “işletmede yirmiden az personel çalışıyor
                    ise asgari ücretin net tutarının % 30’unun üçte ikisi, yirmi ve üzeri personel çalışıyor ise asgari ücretin net
                    tutarının % 30’unun üçte biri” devlet katkısı olarak yatırılacaktır. Bu kapsamda aşağıdaki bilgilerin
                    doldurulması ve Meslek Yüksekokulumuza ulaştırılması gerekmektedir</p><br><br>
                  <b>NOT :</b><br>
                  <p style="margin:10px 0px 0px 50px;">
                    • Kamu kurum ve kuruluşları bu kapsam dışındadır. Kamu kurum ve kuruluşlarında staj yapan
                    öğrenciler için bu formun doldurulmasına gerek yoktur.<br>
                    • Öğrenci işletmeden ücret almıyor ise bu formun doldurulmasına gerek yoktur.
                  <div class="row mt-5">
                    <h6>ÖĞRENCİYE AİT BİLGİLER</h6>
                    <div class="col-12">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" value="<?php echo $stajkontrol['OgrenciIsim'];
                                                                                          echo " ";
                                                                                          echo $stajkontrol['OgrenciSoyisim']; ?>" required="required" style="height:50px;" readonly>
                        <label for="floatingInput"><b>Adı Soyadı</b></label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="OgrenciTC" value="<?php echo $stajkontrol['OgrenciTC']; ?>" required="required" style="height:50px;" readonly>
                        <label for="floatingInput"><b>TC Kimlik No</b></label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="floatingInput" value="<?php echo $stajkontrol['OgrenciDogumTarihi']; ?>" readonly>
                        <label for="floatingInput"><b>Doğum Tarih</b></label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="OgrenciOkulNo" value="<?php echo $stajkontrol['OgrenciOkulNo']; ?>" required="required" style="height:50px;" readonly>
                        <label for="floatingInput"><b>Öğrenci Numarası</b></label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="OgrenciTelefon" value="<?php echo $stajkontrol['OgrenciTelefon']; ?>" required="required" style="height:50px;" readonly>
                        <label for="floatingInput"><b>Telefon Numarası</b></label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="OgrenciBolumAdı" value="<?php echo $stajkontrol['OgrenciBolumAdı']; ?>" required="required" style="height:50px;" readonly>
                        <label for="floatingInput"><b>Bölüm/Program</b></label>
                      </div>
                    </div>

                    <h6>İŞLETMEYE AİT BİLGİLER</h6>
                    <div class="col-12">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="SirketAdi" value="<?php echo $stajkontrol['SirketAdi']; ?>" required="required" style="height:50px;" readonly>
                        <label for="floatingInput"><b>İşletmenin/Firmanın Adı</b></label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="SirketToplamPersonel" value="<?php echo $stajkontrol['SirketToplamPersonel']; ?>" required="required" style="height:50px;" readonly>
                        <label for="floatingInput"><b>Çalışan Personel Sayısı</b></label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="SirketTelefonNo" value="<?php echo $stajkontrol['SirketTelefonNo']; ?>" required="required" style="height:50px;" readonly>
                        <label for="floatingInput"><b>Telefon</b></label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="SirketFaksNo" value="<?php echo $stajkontrol['SirketFaksNo']; ?>" required="required" style="height:50px;" readonly>
                        <label for="floatingInput"><b>Fax</b></label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="SirketMail" value="<?php echo $stajkontrol['SirketMail']; ?>" required="required" style="height:50px;" readonly>
                        <label for="floatingInput"><b>E-Posta</b></label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-floating mb-3">
                        <label for="floatingInput"><b>Adres</b></label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="SirketIbanNo" value="<?php echo $stajkontrol['SirketIbanNo']; ?>" required="required" style="height:50px;" readonly>
                        <label for="floatingInput"><b>İşyeri Banka İBAN Numarası</b></label>
                      </div>
                    </div>
                    <br>

                  <?php } else if ($Ücret2['ÜcretAliyorMu'] == "Almıyor")

                  echo "Öğrenci Ücret almıyor."
                  ?>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-floating mt-3">
                        <input type="date" class="form-control" id="floatingInput" value="<?php echo $stajkontrol['BelgeDoldurmaTarihi']; ?>" name="BelgeDoldurmaTarihi" readonly>
                        <label for="floatingInput"><b>Belge Doldurma Tarihi</b></label>
                      </div>
                    </div>
                  </div>
                  </div>
                  <div class="row" style="margin-left:310px;">
                  </div>
                  <div class="row mt-5">
                    <hr>
                    </hr>
                    <?php $SaglikHizmeti = $VeritabaniBaglantisi->prepare("SELECT * FROM stajbasvurudetay WHERE OgrenciID=?");
                    $SaglikHizmeti->execute(array($GelenID));
                    $SaglikHizmeti2 = $SaglikHizmeti->fetch(PDO::FETCH_ASSOC);
                    if ($SaglikHizmeti2['SaglikHizmeti'] == 1) { ?>
                      <h4 style="text-align:center;"> BEYAN VE TAAHHÜTNAME
                        ( SAĞLIK HİZMETİ ALAN )</h3>
                        <div class="col-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Konya Teknik Üniversitesi Teknik Bilimler Meslek Yüksekokulu’nda
                          <b><?php echo $stajkontrol['OgrenciBolumAdı'];
                              echo " ";  ?> </b> Bölümü
                          <b><?php echo $stajkontrol['OgrenciProgramSınıf'];
                              echo " ";  ?> </b> Programı öğrencisiyim.
                          <b><?php echo $stajkontrol['SirketAdi'];
                              echo " ";  ?> </b> biriminde / işyerinde
                          Stajyer Öğrenci olarak 5510 sayılı Kanunun 5/b maddesi uyarınca çalışmak istiyorum.
                          Ailemden, annem/babam üzerinden genel sağlık sigortası kapsamında sağlık hizmeti alıyorum.
                          Bu nedenle kısmi zamanlı çalışmam veya stajım boyunca genel sağlık sigortası kapsamında
                          olmayı kabul etmiyorum.
                          Beyanımın doğruluğunu, durumumda değişiklik olması durumunda değişikliği hemen
                          bildireceğimi kabul eder, beyanımın hatalı veya eksik olmasından kaynaklanacak prim, idari para
                          cezası, gecikme zammı ve gecikme faizinin tarafımca ödeneceğini taahhüt ederim
                        </div>
                        <div class="col-12">
                          <br>
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="OgrenciIsim" value="<?php echo $stajkontrol['OgrenciIsim'];
                                                                                                                  echo " ";
                                                                                                                  echo $stajkontrol['OgrenciSoyisim']; ?>" style="height:50px;" readonly>
                            <label for="floatingInput"><b>İsim</b></label>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="OgrenciTC" value="<?php echo $stajkontrol['OgrenciTC']; ?>" required="required" style="height:50px;" readonly>
                            <label for="floatingInput"><b>TC Kimlik Numarası</b></label>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="OgrenciOkulNo" value="<?php echo $stajkontrol['OgrenciOkulNo']; ?>" style="height:50px;" readonly>
                            <label for="floatingInput"><b>Öğrenci No</b></label>
                          </div>
                        </div>
                  </div>
                <?php } else { ?>
                  <h4 style="text-align:center;"> BEYAN VE TAAHHÜTNAME
                    ( SAĞLIK HİZMETİ ALMAYAN )</h3>
                    <div class="col-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Konya Teknik Üniversitesi Teknik Bilimler Meslek Yüksekokulu’nda
                      <b><?php echo $stajkontrol['OgrenciBolumAdı'];
                          echo " ";  ?> </b> Bölümü
                      <b><?php echo $stajkontrol['OgrenciProgramSınıf'];
                          echo " ";  ?> </b> Programı öğrencisiyim.
                      <b><?php echo $stajkontrol['SirketAdi'];
                          echo " ";  ?> </b> biriminde / işyerinde
                      Stajyer Öğrenci olarak 5510 sayılı Kanunun 5/b maddesi uyarınca çalışmak istiyorum.
                      Ailemden, annem/babam üzerinden genel sağlık sigortası kapsamında sağlık hizmeti almıyorum.
                      Bu nedenle kısmi zamanlı çalışmam veya stajım boyunca genel sağlık sigortası kapsamında
                      olmayı kabul ediyorum.
                      Beyanımın doğruluğunu, durumumda değişiklik olması durumunda değişikliği hemen
                      bildireceğimi kabul eder, beyanımın hatalı veya eksik olmasından kaynaklanacak prim, idari para
                      cezası, gecikme zammı ve gecikme faizinin tarafımca ödeneceğini taahhüt ederim
                    </div>
                    <div class="col-12">
                      <br>
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="OgrenciIsim" value="<?php echo $stajkontrol['OgrenciIsim'];
                                                                                                              echo " ";
                                                                                                              echo $stajkontrol['OgrenciSoyisim']; ?>" style="height:50px;" readonly>
                        <label for="floatingInput"><b>İsim</b></label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="OgrenciTC" value="<?php echo $stajkontrol['OgrenciTC']; ?>" required="required" style="height:50px;" readonly>
                        <label for="floatingInput"><b>TC Kimlik Numarası</b></label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="OgrenciOkulNo" value="<?php echo $stajkontrol['OgrenciOkulNo']; ?>" style="height:50px;" readonly>
                        <label for="floatingInput"><b>Öğrenci No</b></label>
                      </div>
                    </div>
                </div>
              <?php } ?>


              <br>
              <br>
              <hr>
              </hr>

            </div>
          </div>
    </form>
  </div>


  <?php
  include '../Include/footer.php';
  ?>