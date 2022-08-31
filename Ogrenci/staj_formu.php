<?php
include '../Include/Header.php';
include '../ayarlar/fonksiyonlar.php';
if (isset($_POST['FormGonder'])) { #FormGonder nameli butona basıldığında ekleme işlemini yap
  $OgrenciIsım = Guvenlik($_POST['OgrenciIsim']);
  $OgrenciSoyisim = Guvenlik($_POST['OgrenciSoyisim']);
  $OgrenciMail = Guvenlik($_POST['OgrenciMail']);
  $OgrenciTelefon = Guvenlik($_POST['OgrenciTelefon']);
  $OgrenciSSKNo = Guvenlik($_POST['OgrenciSSKNo']);
  $OgrenciOkulNo = Guvenlik($_POST['OgrenciOkulNo']);
  $OgrenciBolumAdı = Guvenlik($_POST['OgrenciBolumAdı']);
  $OgrenciProgramSınıf = Guvenlik($_POST['OgrenciProgramSınıf']);
  $OgrenciStajDonem = Guvenlik($_POST['staj_donem']);
  $OgrenciIkametgahAdres = Guvenlik($_POST['OgrenciIkametgahAdres']);
  $OgrenciTC = Guvenlik($_POST['OgrenciTC']);
  $OgrenciTCSeriNo = Guvenlik($_POST['OgrenciTCSeriNo']);
  $OgrenciIl = Guvenlik($_POST['il']);

  $OgrenciIlce = Guvenlik($_POST['ilce']);
  if ($OgrenciIlce == "") {
    $OgrenciIlce = 1;
  }
  $OgrenciKoyMahalle = Guvenlik($_POST['OgrenciKoyMahalle']);
  $OgrenciBabaAdi = Guvenlik($_POST['OgrenciBabaAdi']);
  $OgrenciAnneAdi = Guvenlik($_POST['OgrenciAnneAdi']);
  $OgrenciCiltNo = Guvenlik($_POST['OgrenciCiltNo']);
  $OgrenciAileSiraNo = Guvenlik($_POST['OgrenciAileSiraNo']);
  $OgrenciDogumYer = Guvenlik($_POST['OgrenciDogumYer']);
  $OgrenciSiraNo = Guvenlik($_POST['OgrenciSiraNo']);
  $OgrenciDogumTarihi = Guvenlik($_POST['OgrenciDogumTarihi']);
  $SirketAdi = Guvenlik($_POST['SirketAdi']);
  $SirketAdres = Guvenlik($_POST['SirketAdres']);
  $SirketHizmetAlani = Guvenlik($_POST['SirketHizmetAlani']);
  $SirketToplamPersonel = Guvenlik($_POST['SirketToplamPersonel']);
  $SirketTelefonNo = Guvenlik($_POST['SirketTelefonNo']);
  $SirketFaksNo = Guvenlik($_POST['SirketFaksNo']);
  $SirketYetkiliAdSoyadGorevUnvan = Guvenlik($_POST['SirketYetkiliAdSoyadGorevUnvan']);
  $SirketYetkiliGorev = Guvenlik($_POST['SirketYetkiliGorev']);
  $SirketMail = Guvenlik($_POST['SirketMail']);
  $SirketWebAdres = Guvenlik($_POST['SirketWebAdres']);
  $SirketIbanNo = Guvenlik($_POST['SirketIbanNo']);
  $SirketİmzaTarihi = Guvenlik($_POST['SirketİmzaTarih']);
  $OgrenciİmzaTarihi = Guvenlik($_POST['OgrenciİmzaTarih']);
  $ÜcretAliyorMu = Guvenlik($_POST['ücrett']);
  $BelgeDoldurmaTarihi = Guvenlik($_POST['BelgeDoldurmaTarihi']);
  $SaglikHizmeti = Guvenlik($_POST['SaglikHizmeti']);
  $AcikRizaOnay = Guvenlik($_POST['AcikRizaOnay']);



  $yukleklasor = "../resimler/"; //yüklenecek klasör
  $tmp_name = $_FILES['yukleResim']['tmp_name'];
  $name = $_FILES['yukleResim']['name'];
  $boyut = $_FILES['yukleResim']['size'];
  $tip = $_FILES['yukleResim']['type'];
  $uzanti = substr($name, -4, 4);
  $randomSayi1 = rand(10000, 20000);
  $randomSayi2 = rand(30000, 40000);
  $resimad = $randomSayi1 . $randomSayi2 . $uzanti;

  //dosya varmı kontrol
  if (strlen($name) == 0) {
    echo "Bir dosya seçiniz";
    exit();
  }

  //boyut kontrol
  if ($boyut > (1024 * 1024 * 3)) {
    echo "dosya boyutu çok fazla";
    exit();
  }

  //tip kontol
  if ($tip != 'image/jpeg' && $tip != 'image/png' && $uzanti != '.jpg') {
    echo "Yalnızca jpeg veya png formatında olabilir";
  }
  move_uploaded_file($tmp_name, "$yukleklasor/$resimad");


  $tmp_name2 = $_FILES['yukleResim2']['tmp_name']; //geçici dosya adı
  $name2 = $_FILES['yukleResim2']['name'];
  $boyut2 = $_FILES['yukleResim2']['size'];
  $tip2 = $_FILES['yukleResim2']['type'];
  $uzanti2 = substr($name2, -4, 4);
  $randomSayi3 = rand(50000, 60000);
  $randomSayi4 = rand(70000, 80000);
  $resimad2 = $randomSayi3 . $randomSayi4 . $uzanti2;

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


  $tmp_name3 = $_FILES['yukleResim3']['tmp_name'];
  $name3 = $_FILES['yukleResim3']['name'];
  $boyut3 = $_FILES['yukleResim3']['size'];
  $tip3 = $_FILES['yukleResim3']['type'];
  $uzanti3 = substr($name3, -4, 4);
  $randomSayi5 = rand(90000, 100000);
  $randomSayi6 = rand(1100000, 200000);
  $resimad3 = $randomSayi5 . $randomSayi6 . $uzanti3;

  if (strlen($name3) == 0) {
    echo "Bir dosya seçiniz";
    exit();
  }

  //boyut kontrol
  if ($boyut3 > (1024 * 1024 * 3)) {
    echo "dosya boyutu çok fazla";
    exit();
  }

  //tip kontol
  if ($tip3 != 'image/jpeg' && $tip3 != 'image/png' && $uzanti3 != '.jpg') {
    echo "Yalnızca jpeg veya png formatında olabilir";
  }
  move_uploaded_file($tmp_name3, "$yukleklasor/$resimad3");

  $Formekle  =  $VeritabaniBaglantisi->prepare("INSERT INTO stajbasvurudetay (OgrenciID,OgrenciIsim, OgrenciSoyisim,OgrenciMail,OgrenciTelefon,Ogrenci_Vesikalık,OgrenciSSKNo,OgrenciOkulNo,OgrenciBolumAdı,OgrenciProgramSınıf,OgrenciStajDonem,
  OgrenciIkametgahAdres,OgrenciTC,OgrenciTCSeriNo,OgrenciIl,OgrenciIlce,OgrenciKoyMahalle,OgrenciBabaAdi,OgrenciAnneAdi,OgrenciCiltNo,OgrenciAileSiraNo,OgrenciDogumYer,OgrenciSiraNo, OgrenciDogumTarihi,OgrenciİmzaTarih,OgrenciImza,SirketAdi,SirketAdres,SirketHizmetAlani,SirketToplamPersonel,SirketTelefonNo,SirketFaksNo,SirketYetkiliAdSoyadGorevUnvan,SirketYetkiliGorev,SirketİmzaTarih,SirketMail,Sirketİmza,SirketWebAdres, SirketIbanNo,ÜcretAliyorMu, BelgeDoldurmaTarihi, SaglikHizmeti,AcikRizaOnay) values (?,?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $Formekle->execute([
    $_SESSION['ÖgrenciID'], $OgrenciIsım, $OgrenciSoyisim, $OgrenciMail, $OgrenciTelefon, $resimad2, $OgrenciSSKNo, $OgrenciOkulNo, $OgrenciBolumAdı, $OgrenciProgramSınıf,
    $OgrenciStajDonem, $OgrenciIkametgahAdres, $OgrenciTC, $OgrenciTCSeriNo, $OgrenciIl, $OgrenciIlce, $OgrenciKoyMahalle,
    $OgrenciBabaAdi, $OgrenciAnneAdi, $OgrenciCiltNo, $OgrenciAileSiraNo, $OgrenciDogumYer, $OgrenciSiraNo, $OgrenciDogumTarihi, $OgrenciİmzaTarihi, $resimad3, $SirketAdi, $SirketAdres,
    $SirketHizmetAlani, $SirketToplamPersonel, $SirketTelefonNo, $SirketFaksNo, $SirketYetkiliAdSoyadGorevUnvan, $SirketYetkiliGorev, $SirketİmzaTarihi, $SirketMail, $resimad, $SirketWebAdres, $SirketIbanNo, $ÜcretAliyorMu, $BelgeDoldurmaTarihi, $SaglikHizmeti, $AcikRizaOnay
  ]);
  $formeklemesayisi    =  $Formekle->rowCount();
  if ($formeklemesayisi == 0) {
    header("Location:staj_formu.php?durum=false");
    exit();
  }

  $UPDATE = $VeritabaniBaglantisi->prepare("UPDATE ogrenciler SET OgrenciStajBasvuru=?, OgrenciStajGonderim=?, StajOnayBaskan=?, StajOnay=? WHERE Ogrenci_id=?");
  $UPDATE->execute(array(1, 1, 0, 0,  $_SESSION['ÖgrenciID']));
  $update_SAyi = $UPDATE->rowCount();
  if ($update_SAyi == 0) {
    header("Location:staj_formu.php?update=false");
    exit();
  } #form gönderildiği zaman staj başuru ve staj gonderim sütunlarını 1 yap
}
$Kullanici = $VeritabaniBaglantisi->prepare("SELECT
ogrenciler.Ogrenci_adi, 
ogrenciler.Ogrenci_soyadi, 
ogrenciler.Ogrenci_Email, 
ogrenciler.Ogrenci_Telefon, 
ogrenciler.Ogrenci_no, 
ogrenciler.OgrenciStajBasvuru,
ogrenciler.OgrenciStajGonderim,
ogrenciler.Ogrenci_TC,
bolumler.bolum_adi, 
bolumler.bolum_kodu
FROM
ogrenciler
INNER JOIN
bolumler
ON 
ogrenciler.Ogrenci_bolum_kodu = bolumler.bolum_kodu
 WHERE Ogrenci_id=?");
$Kullanici->execute(array($_SESSION['ÖgrenciID']));
$ciktiögrenci = $Kullanici->fetch(PDO::FETCH_ASSOC);
?>

<script type="text/javascript">
  $(document).ready(function() {
    $("#ilce").hide();
    $("#il").change(function() {

      var ilid = $(this).val();
      $.ajax({
        type: "POST",
        url: "ajax.php",
        data: {
          "il": ilid
        },
        success: function(e) {
          $("#ilce").show();
          $("#ilce").html(e);
        }
      });
    })
  });
</script>
<script>
  const myModal = document.getElementById('myModal')
  const myInput = document.getElementById('myInput')

  myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus()
  })
</script>


<body id="body-pd">
  <header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
  </header>
  <div class="l-navbar" id="nav-bar">
    <nav class="nav">
      <div> <a href="AnaPanel_Ogrenci.php" class="nav_logo"><span class="nav_logo-name"><img src="../resimler/ktun_logo_koyu_zemin.gif" height="40"></span> </a>
        <div class="nav_list"> <a href="AnaPanel_Ogrenci.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-house-door nav_icon'></i> <span class="nav_name">Anasayfa</span> </a>
          <a href="kisisel_bilgiler.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-card-checklist nav_icon'></i> <span class="nav_name">Kişisel Bilgiler</span> </a>
          <a href="staj_formu.php" class="nav_link active" style="text-decoration:none;"> <i class='bi bi-ui-checks nav_icon'></i> <span class="nav_name">Staj Formu</span> </a>
          <a href="Staj_DurumKontrol.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-eye nav_icon'></i> <span class="nav_name">Staj Onay Durumu</span> </a>
          <a href="stajdosyası.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-journal-text nav_icon'></i> <span class="nav_name">Staj Dosya <br>Yükle</span> </a>
        </div>
      </div> <a href="uyecikis.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Çıkış Yap</span> </a>
    </nav>
  </div>

  <div style="margin-top: 80px;">
    <h3>Staj Kabul Formu</h3>

  </div>
  <div style="border-top:2px solid blue; padding: 20px;">
  </div>
  <?php if ($ciktiögrenci['OgrenciStajGonderim'] == 0) { #ögrenci staj gönderim sütunu 0'a eşitse staj formunu göstermesi sağlandı 
  ?>
    <form method="POST" enctype="multipart/form-data">
      <div>
        <div class="row">

          <div class="col-4" style="text-align:right;"><img src="../resimler/logoo.png" height="120"></div>
          <div class="col-4" style="font-size:16px; text-align:center; padding-right:50px;"><b>T. C.
              KONYA TEKNİK ÜNİVERSİTESİ<br>
              TEKNİK BİLİMLER MESLEK YÜKSEKOKULU<br>
              ZORUNLU STAJ BAŞVURU FORMU VE<br>
              İŞ YERİ STAJ SÖZLEŞMESİ<br><br> İLGİLİ MAKAMA</b> </div>

          <div class="col-3">
            <b>ÖĞRENCİ FOTOĞRAF</b>
            <div class="mb-3">
              <input class="form-control" type="file" name="yukleResim2">
            </div>

          </div>
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
            <input type="text" class="form-control" id="floatingInput" name="OgrenciIsim" value="<?php echo $ciktiögrenci['Ogrenci_adi']; ?>" required="required" style="height:50px;" readonly>
            <label for="floatingInput"><b>İsim</b></label>
          </div>
        </div>
        <div class="col-6">
          <div class="form-floating mb-3">
            <input type="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" class="form-control" id="floatingInput" name="OgrenciMail" value="<?php echo $ciktiögrenci['Ogrenci_Email']; ?>" required="required" style="height:50px;" readonly>
            <label for="floatingInput"><b>Email</b></label>
          </div>
        </div>
        <div class="col-6">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="OgrenciSoyisim" value="<?php echo $ciktiögrenci['Ogrenci_soyadi']; ?>" required="required" style="height:50px;" readonly>
            <label for="floatingInput"><b>Soyadı</b></label>
          </div>
        </div>
        <div class="col-6">
          <div class="form-floating mb-3">
            <input type="tel" pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$" class="form-control" id="floatingInput" name="OgrenciTelefon" value="<?php echo $ciktiögrenci['Ogrenci_Telefon']; ?>" maxlength="15" required="required" style="height:50px;" readonly>
            <label for="floatingInput"><b>Telefon</b></label>
          </div>
        </div>
        <div class="col-6">
          <div class="form-floating mb-3">
            <input type="text" pattern="\d*" class="form-control" id="floatingInput" name="OgrenciOkulNo" value="<?php echo $ciktiögrenci['Ogrenci_no']; ?>" required="required" style="height:50px;" maxlength="9" readonly>
            <label for="floatingInput"><b>Öğrenci No</b></label>
          </div>
        </div>
        <div class="col-6">
          <div class="form-floating mb-3">
            <input type="text" pattern="\d*" class="form-control" id="floatingInput" name="OgrenciSSKNo" style="height:50px;">
            <label for="floatingInput"><b>S.S.K. No.</b></label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="OgrenciBolumAdı" required="required" style="height:50px;">
            <label for="floatingInput"><b>Bölüm Adı</b></label>
          </div>
        </div>
        <div class="col-10">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="OgrenciProgramSınıf" value="<?php echo $ciktiögrenci['bolum_adi']; ?>" required="required" style="height:50px;" readonly>
            <label for="floatingInput"><b>Program/Sınıf</b></label>
          </div>
        </div>
        <div class="col-2">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="staj_donem" id="flexRadioDefault1" value="1" checked>
            <label class="form-check-label" for="flexRadioDefault1">
              Staj-1
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="staj_donem" id="flexRadioDefault2" value="2">
            <label class="form-check-label" for="flexRadioDefault2">
              Staj-2
            </label>
          </div>
        </div>

        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="OgrenciIkametgahAdres" required="required" style="height:50px;">
            <label for="floatingInput"><b>İkametgah Adresi</b></label>
          </div>
        </div>
        <div class="col-6">
          <div class="form-floating mb-3">
            <input type="text" pattern="^[1-9]{1}[0-9]{9}[02468]{1}$" class="form-control" value="<?php echo $ciktiögrenci['Ogrenci_TC']; ?>" id="floatingInput" name="OgrenciTC" required="required" maxlength="11" style="height:50px;" readonly>
            <label for="floatingInput"><b>TC Kimlik Numarası</b></label>
          </div>
        </div>

        <div class="col-6">
          <div class="form-floating mb-3">
            <select class="form-select" id="il" name="il" aria-label="Default select example" style="height:50px; padding-top:22px;">
              <option selected>İl Seçiniz</option>
              <?php
              $il_sor = $VeritabaniBaglantisi->prepare("SELECT * FROM il");
              $il_sor->execute();
              $iller = $il_sor->fetchAll(PDO::FETCH_ASSOC);
              foreach ($iller as $row) {
              ?>
                <option value="<?php echo $row['il_no']; ?>"><?php echo $row['il_isim']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-6">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" pattern="[A-Z]{1}[0-9]{2}[A-Z]{1}[0-9]{5}" id="floatingInput" name="OgrenciTCSeriNo" maxlength="9" style="height:50px;">
            <label for="floatingInput"><b>Nüfus Cüzdanı Seri Numarası</b></label>
          </div>
        </div>
        <div class="col-6" id="ilce" name="ilce">
          <div class="form-floating mb-3">



          </div>
        </div>
        <div class="col-6">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="OgrenciBabaAdi" required="required" style="height:50px;">
            <label for="floatingInput"><b>Baba Adı</b></label>
          </div>
        </div>
        <div class="col-6">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="OgrenciKoyMahalle" required="required" style="height:50px;">
            <label for="floatingInput"><b>Mahalle - Köy</b></label>
          </div>
        </div>
        <div class="col-6">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="OgrenciAnneAdi" required="required" style="height:50px;">
            <label for="floatingInput"><b>Anne Adı</b></label>
          </div>
        </div>
        <div class="col-6">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="OgrenciCiltNo" required="required" style="height:50px;">
            <label for="floatingInput"><b>Cilt No</b></label>
          </div>
        </div>
        <div class="col-6">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="OgrenciDogumYer" required="required" style="height:50px;">
            <label for="floatingInput"><b>Doğum Yeri</b></label>
          </div>
        </div>
        <div class="col-6">
          <div class="form-floating mb-3">
            <input type="text" pattern="\d*" class="form-control" id="floatingInput" name="OgrenciAileSiraNo" required="required" style="height:50px;">
            <label for="floatingInput"><b>Aile Sıra No</b></label>
          </div>
        </div>
        <div class="col-6">
          <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingInput" name="OgrenciDogumTarihi">
            <label for="floatingInput"><b>Doğum Tarih</b></label>
          </div>
        </div>
        <div class="col-6">
          <div class="form-floating mb-3">
            <input type="text" pattern="\d*" class="form-control" id="floatingInput" name="OgrenciSiraNo" required="required" style="height:50px;">
            <label for="floatingInput"><b>Sıra No</b></label>
          </div>
        </div>
        <h6 style="margin-top:15px;">Staj Yapılacak Kurumun / Kuruluşun</h6>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="SirketAdi" required="required" style="height:50px;">
            <label for="floatingInput"><b>Adı</b></label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="SirketAdres" required="required" style="height:50px;">
            <label for="floatingInput"><b>Adresi</b></label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="SirketHizmetAlani" required="required" style="height:50px;">
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
            <input type="text" class="form-control" id="floatingInput" name="SirketToplamPersonel" required="required" style="height:50px;">
            <label for="floatingInput"><b>Kurumda / İşletmede çalışan toplam personel sayısı</b></label>
          </div>
        </div>
        <div class="col-6">
          <div class="form-floating mb-3">
            <input type="tel" pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$" class="form-control" id="floatingInput" name="SirketTelefonNo" maxlength="15" required="required" style="height:50px;">
            <label for="floatingInput"><b>Telefon Numarası</b></label>
          </div>
        </div>
        <div class="col-6">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="SirketFaksNo" style="height:50px;">
            <label for="floatingInput"><b>Faks Numarası</b></label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="SirketYetkiliAdSoyadGorevUnvan" required="required" style="height:50px;">
            <label for="floatingInput"><b>Yetkilinin Adı Soyadı, Görevi ve Ünvanı</b></label>
          </div>
        </div>

        <div class="col-8">
          <div class="form-floating mb-3">
            <input type="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" class="form-control" id="floatingInput" name="SirketMail" required="required" style="height:50px;">
            <label for="floatingInput"><b>E-Posta</b></label>
          </div>
        </div>
        <div class="col-4">
          <b>İŞVEREN ONAYI (KAŞE/İMZA/TARİH)</b> 
          <div class="mb-3">
              <input class="form-control" type="file" name="yukleResim">
            </div>

        </div>
        <div class="col-8">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="SirketWebAdres" required="required" style="height:50px;">
            <label for="floatingInput"><b>Web Adresi</b></label>
          </div>
        </div>
        <div class="col-4">
          <b>ÖĞRENCİNİN İMZASI</b> 
          <div class="mb-3">
              <input class="form-control" type="file" name="yukleResim3">
            </div>

        </div>
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
              iş yerlerinde %15’inden az olmamak üzere ücret ödenir. Ücret başlangıçta <input type="text" placeholder="Alacağınız ücreti girin..">
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

              MADDE 21- Staj uygulaması esnasında staj yönergesinde belirtilen esaslara göre,
              yönergedeki süreleri aşmadan rapor, izin kullanan öğrenciler, rapor/izin olarak kullandığı süreyi
              (Stajın son gününe kadar) yazılı olarak okula bildirmek (DİLEKÇE ile) ve bu süreyi staj sonuna
              eklemek zorundadır. Yazılı olarak bildirim yapılmadığı takdirde iş kazası ve meslek hastalığı
              sigortası normal staj süresi bitiminde sonlandırılır.<br><br><br>

              <b>YÜRÜRLÜK</b><br>
              MADDE 22- Staj başlangıç tarihi olan <b>
                <?php echo $tarihGetir['StajBaslangicTarihi'] ?> </b>tarihinde yürürlüğe girmek üzere
              taraflarca imzalanan bu sözleşme stajın tamamlandığı <b><br>
                <?php echo $tarihGetir['StajBitisTarihi'] ?> </b>tarihe kadar geçerlidir.
          </div>
          <div class="row mt-5" style="padding:0 200px 0 200px;">

            <div class="col-12">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="SirketAdi" required="required" style="height:50px;">
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
                <input type="text" class="form-control" id="floatingInput" value="<?php echo $ciktiögrenci['Ogrenci_adi'];
                                                                                  echo " ";
                                                                                  echo $ciktiögrenci['Ogrenci_soyadi']; ?>" required="required" style="height:50px;" readonly>
                <label for="floatingInput"><b>Adı Soyadı:</b></label>
              </div>
            </div>
            <div class="col-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="SirketYetkiliAdSoyadGorevUnvan" required="required" style="height:50px;">
                <label for="floatingInput"><b>Adı Soyadı:</b></label>
              </div>
            </div>

            <div class="col-6"></div>
            <div class="col-6">
              <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" name="SirketYetkiliGorev" id="floatingInput" required="required" style="height:50px;">
                <label for="floatingInput"><b>Görevi:</b></label>
              </div>
            </div>


            <div class="col-6">
              <div class="form-floating mb-3">
                <input type="date" class="form-control" id="floatingInput" name="OgrenciİmzaTarih">
                <label for="floatingInput"><b>Tarih</b></label>
              </div>
            </div>
            <div class="col-6">
              <div class="form-floating mb-3">
                <input type="date" class="form-control" id="floatingInput" name="SirketİmzaTarih">
                <label for="floatingInput"><b>Tarih</b></label>
              </div>
            </div>


            <br>
            <br>
            <hr>
            </hr>
            <div class="row">
              <div class="col-6"><b>Öğrenci İşletmeden Ücret Alıyor Mu ?</b> </div>
              <div class="col-2">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="ücrett" value="Alıyor" id="flexRadioDefault3">
                  <label class="form-check-label" for="flexRadioDefault3">
                    <b>Evet</b>
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="ücrett" value="Almıyor" id="flexRadioDefault4">
                  <label class="form-check-label" for="flexRadioDefault4">
                    <b>Hayır</b>
                  </label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating mt-3 mb-3">
                  <input type="text" pattern="[A-Z]{2}[0-9]{2}[0-9]{5}[0-9]{1}[0-9]{16}" class="form-control" name="SirketIbanNo" id="floatingInput" style="height:50px;">
                  <label for="floatingInput"><b>Ücret Alıyorsanız Şirket IBAN No</b></label>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="floatingInput" name="BelgeDoldurmaTarihi">
                    <label for="floatingInput"><b>Belge Doldurma Tarihi</b></label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-6 mt-4"><b>Sağlık Hizmeti alıp almadığınızı belirtin</b></div>
              <div class="col-2">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="SaglikHizmeti" id="flexRadioDefault5" value="1" checked>
                  <label class="form-check-label" for="flexRadioDefault5">
                    Sağlık Hizmeti Alıyorum
                  </label>
                </div>
              </div>
              <div class="col-2">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="SaglikHizmeti" id="flexRadioDefault6" value="2">
                  <label class="form-check-label" for="flexRadioDefault6">
                    Sağlık Hizmeti Almıyorum
                  </label>
                </div>
              </div>
            </div>
            <br>
            <br>
            <hr>
            </hr>
            <div class="row">
              <div class="col-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  Aydınlatma Metni ve Açık rıza metni
                </button>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Aydınlatma Metni ve Açık rıza metni</h5>

                      </div>

                      <div class="modal-body">
                        <div class="col-12" style="font-size:13px; text-align:center;"><b>
                            KONYA TEKNİK ÜNİVERSİTESİ
                            TEKNİK BİLİMLER MESLEK YÜKSEKOKULU
                            ZORUNLU STAJ BAŞVURU FORMU VE<br>
                            İŞ YERİ STAJ SÖZLEŞMESİ VE<br>STAJ DOSYASI
                            AÇIK RIZA METNİ</b> </div> İşbu form, 6698 Sayılı Kişisel Verilerin Korunması Kanunu’nun 10.maddesinde düzenlenen
                        Veri sorumlusunun aydınlatma yükümlülüğü hükümleri kapsamında<b> Veri Sorumlusu sıfatıyla
                          Konya Teknik Üniversitesi</b> tarafından Tarafınıza sunulan<b> Aydınlatma Metninin ardından</b> Kişisel Verilerinizin İşlenmesi ve aktarılması ile ilgili açık rıza tercihlerinizi almak için
                        sunulmaktadır.<b> Lütfen açık rızanızın alınmasını gerektiren aşağıdaki kişisel verileriniz ile
                          ilgili tercihinizi belirleyiniz.</b><br><br>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;Kişisel Verileriniz, Üniversite içinde belgelerin tutulması ve saklanması, Zorunlu Staj
                          Başvuru Formu ve İşyeri Staj Sözleşmesi ve Staj Dosyasına ilişkin gerekli işlemlerin yerine
                          getirilebilmesi için gerekli e-posta iletiminin sağlanması, google ürün ve hizmetlerinden
                          üniversite süreçleri kapsamında yararlanılabilmesi amaçlarıyla kullandığımız Google
                          Workspace ve e-posta sunucularının yurt dışında olması nedeni ile 6698 Sayılı Kişisel
                          Verilerin Korunması Kanunu’nun 9. maddesi uyarınca açık rızanıza istinaden yurtdışına
                          aktarılmaktadır.</p><br><br><br><br>
                        <div class="col-12" style="font-size:13px; text-align:center;"><b>
                            KONYA TEKNİK ÜNİVERSİTESİ
                            TEKNİK BİLİMLER MESLEK YÜKSEKOKULU
                            ZORUNLU STAJ BAŞVURU FORMU VE<br>
                            İŞ YERİ STAJ SÖZLEŞMESİ VE<br>STAJ DOSYASI
                            AYDINLATMA METNİ </b> </div>İşbu bilgilendirme 6698 Sayılı Kişisel Verilerin Korunması Kanunu’nun (“KVKK”)
                        10.maddesinde düzenlenen Veri sorumlusunun aydınlatma yükümlülüğü hükümleri
                        kapsamında Veri Sorumlusu Konya Teknik Üniversitesi Rektörlüğü tarafından yapılmaktadır.<br><br>
                        <b>Kişisel Verileriniz</b>, Teknik Bilimler Meslek Yüksekokulu Zorunlu Staj Başvuru Formu ve
                        İşyeri Staj Sözleşmesi ve Staj Dosyasını doldurmanız halinde bu şekilde elde edildikten sonra
                        otomatik ve otomatik olmayan yollarla toplanıp, bir veri kayıt sisteminin parçası olmak
                        kaydıyla işlenmektedir.<br><br>
                        <b><u>Kişisel Verilerinizin İşlenme Amacı ve Hukuki Sebebi </u></b><br><br>
                        Zorunlu Staj Başvuru Formu ve İşyeri Staj Sözleşmesi ve Staj Dosyanız ile bize ilettiğiniz
                        form üzerinde bulunan kişisel verileriniz; müfredatta yer alan zorunlu staj sürecinize ilişkin işlemlerin
                        gerçekleştirilebilmesi amacıyla ve yalnızca bu amaçla sınırlı olarak; KVKK 5/2 maddesi
                        uyarınca bir hakkın tesisi, kullanılması veya korunması için veri işlemenin zorunlu olması,
                        İlgili kişinin temel hak ve özgürlüklerine zarar vermemek kaydıyla, veri sorumlusunun meşru
                        menfaatleri için veri işlenmesinin zorunlu olması hukuki sebeplerine dayalı olarak
                        işlenmektedir.<br><br>
                        ● Kimlik Bilgileriniz (Ad-Soyad, Öğrenci Numarası, TC Kimlik Numarası, Fotografı),<br>
                        ● İletişim Bilgileriniz (E-posta, Cep Telefon Numarası, İkametgah Adresi),<br>
                        ● Öğrenim Durumunuza İlişkin Bilgiler (Bölüm, Program, Sınıf)<br>
                        ● Finans (IBAN Numarası)<br>
                        ● Staj Dosyasında Yer Alan Bilgiler (Devam Çizelgesi, Değerlendirmeler)<br><br>
                        <b><u>Kişisel Verilerinizin Aktarılması, Amacı ve Hukuki Sebebi</u></b><br><br>
                        Kişisel Verileriniz, veri sorumlusunun meşru menfaati, kanunlarda açıkça öngörülmesi hukuki
                        sebeplerine dayanarak ilgili mevzuattan doğan bilgi ve belge paylaşımına ilişkin
                        yükümlülüklerini ve ayrıca diğer hukuki yükümlülüklerimizi yerine getirmek amacıyla; talep
                        veya zorunluluk olması halinde ‘’Yetkili Kamu Kurum ve Kuruluşlarına’’ aktarılabilecektir.
                        (Örneğin YÖK, YÖKSİS, ÖSYM, SGK, Mahkemeler)<br><br>
                        <b><u>Kişisel Verilerinizin Yurtdışına Aktarılması, Amacı ve Hukuki Sebebi </u></b><br><br>
                        Kişisel Verileriniz, üniversite içinde belgelerin tutulması ve saklanması, Zorunlu Staj Başvuru
                        Formu ve İşyeri Staj Sözleşmesi ve Staj Dosyanıza ilişkin gerekli işlemlerin yerine
                        getirilebilmesi için gerekli e-posta iletiminin sağlanması, google ürün ve hizmetlerinden
                        üniversite süreçleri kapsamında yararlanılabilmesi amaçlarıyla kullandığımız Google
                        Workspace ve e-posta sunucularının yurt dışında olması nedeni ile 6698 Sayılı Kişisel Verilerin
                        Korunması Kanunu’nun 9. maddesi uyarınca açık rızanıza istinaden yurtdışına aktarılmaktadır.<br><br>
                        <b><u>Haklarınız</u></b><br><br>
                        Konya Teknik Üniversitesi Rektörlüğü tarafından verilerinizin işlendiği ve Konya Teknik
                        Üniversitesi Rektörlüğü’nün verilerinizi veri sorumlusu sıfatı ile işlediği ölçüde kişisel
                        verileriniz bakımından aşağıda bulunan haklara sahipsiniz: “Herhangi bir kişisel verinizin işlenip işlenmediğini öğrenme; işlenme faaliyetlerine ilişkin olarak bilgi talep etme; işlenme
                        amaçlarını öğrenme; yurt içinde veya yurt dışında üçüncü kişilere aktarılmış olması durumunda
                        bu kişileri öğrenme; eksik veya yanlış işlenmiş olması halinde bunların düzeltilmesini isteme;
                        işlenmesini gerektiren sebeplerin ortadan kalkması veya Konya Teknik Üniversitesi
                        Rektörlüğü’nün söz konusu verileri işleyebilmek için hukuki dayanağı veya meşru menfaatinin
                        bulunmaması halinde kişisel verilerin silinmesini veya yok edilmesini isteme; Konya Teknik
                        Üniversitesi Rektörlüğü’nden, yine Konya Teknik Üniversitesi Rektörlüğü tarafından
                        yetkilendirilen ve kişisel verileri işleyen üçüncü kişilerin bu bölüm kapsamındaki haklarınıza
                        saygı duymasını sağlamasını talep etme; Kişisel verilerin otomatik sistemler vasıtasıyla
                        işlenmesi sonucu ortaya çıkabilecek aleyhte sonuçlara itiraz etme ve; kanuna aykırı bir şekilde
                        işlenmesi sebebiyle zarara uğramanız halinde bu zararın tazmin edilmesini isteme.” <br><br>
                        <b>Veri Sorumlusuna Başvuru-</b> Kanunun ilgili kişinin haklarını düzenleyen 11. maddesi
                        kapsamındaki taleplerinizi, “Veri Sorumlusuna Başvuru Usul ve Esasları Hakkında Tebliğe”
                        göre Üniversitemizin fiziki adresine bizzat başvurarak yazılı olarak, noter aracılığıyla, Kayıtlı
                        Elektronik Posta (KEP) ile veya kimliğinizin daha önce teyit edilmiş olması şartıyla elektronik
                        posta üzerinden Üniversitemiz elektronik posta adresine iletebilirsiniz.<br><br><br>
                        <b> Veri Sorumlusu Ünvan :</b> Konya Teknik Üniversitesi<br>
                        <b>Adres:</b> Akademi Mah. Yeni İstanbul Cad. No: 235/1 Selçuklu/KONYA<br>
                        <b>Detsis Numarası:</b> 88113471<br>
                        <b>KVKK İşlemleri E-Posta:</b> kvkk@ktun.edu.tr<br>
                        <b>KVKK İşlemleri Telefon:</b> (0332) 205 1258<br>
                        <b>Kayıtlı Elektronik Posta (KEP):</b> konyateknikuniversitesi@hs01.kep.tr<br>
                        <b>Detaylı Bilgi İçin <a href="https://www.ktun.edu.tr/tr/Birim/Index/?brm=FdXTo7m9JCTAcJOflaR/Ew==" target="blank">Web Adresimiz</a></b>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="AcikRizaOnay" id="flexRadioDefault7" value="Onaylıyorum" required>
                  <label class="form-check-label" for="flexRadioDefault7">
                    Açılır pencerede bulunan Açık rıza metni ve Aydınlatma metni'ni Okudum, Onaylıyorum.
                  </label>
                </div>
              </div>

            </div>

            <div class="row mt-5">
              <div class="col-3">
                <input class="btn" type="submit" name="FormGonder" value="Formu Gönder" style="background-color: #3A5BA0; color: white; border-radius: 15px; width: 200px;">
              </div>

            </div>

          </div>
        </div>
    </form>
  <?php } else {
    echo "<b>Staj başvurunuz yapılmıştır. Staj başvurunuzun durumunu <a href='Staj_DurumKontrol.php'>Bu sayfadan</a> kontrol edebilirsiniz.</b>"; # öğrenci staj gönderim sütunu 1'e eşitse uyarı verildi
  }

  ?>

  <?php
  include '../Include/footer.php';
  ?>