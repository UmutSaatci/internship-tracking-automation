<header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <script type="text/javascript" src="../sweetalert2.all.min.js"></script>
    </header>

<?php
include '../Include/Connection.php';


$VeritabaniBaglantisi2 = mysqli_connect("localhost","root","","stajtakipotomasyonu");
$VeritabaniBaglantisi2->set_charset("utf8");
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');
?>

<?php
if (isset($_POST["import"]))
{


    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new SpreadsheetReader($targetPath);
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
 
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
                $OgrenciTC = "";
                if(isset($Row[0])) {
                    $OgrenciTC = mysqli_real_escape_string($VeritabaniBaglantisi2,$Row[0]);
                }

                $adi = "";
                if(isset($Row[1])) {
                    $adi = mysqli_real_escape_string($VeritabaniBaglantisi2,$Row[1]);
                }

                $soyadi = "";
                if(isset($Row[2])) {
                    $soyadi = mysqli_real_escape_string($VeritabaniBaglantisi2,$Row[2]);
                }

                $email = "";
                if(isset($Row[3])) {
                    $email = mysqli_real_escape_string($VeritabaniBaglantisi2,$Row[3]);
                }

                $ogrenci_no = "";
                if(isset($Row[4])) {
                    $ogrenci_no = mysqli_real_escape_string($VeritabaniBaglantisi2,$Row[4]);
                }

                $Ogrenci_bolum_kodu = "";
                if(isset($Row[5])) {
                    $Ogrenci_bolum_kodu = mysqli_real_escape_string($VeritabaniBaglantisi2,$Row[5]);
                }
                
                $Ogrenci_sinif = "";
                if(isset($Row[6])) {
                    $Ogrenci_sinif= mysqli_real_escape_string($VeritabaniBaglantisi2,$Row[6]);
                }
                $Ogrenci_sube = "";
                if(isset($Row[7])) {
                    $Ogrenci_sube = mysqli_real_escape_string($VeritabaniBaglantisi2,$Row[7]);
                }
                $Ogrenci_ogretim = "";
                if(isset($Row[7])) {
                    $Ogrenci_ogretim = mysqli_real_escape_string($VeritabaniBaglantisi2,$Row[8]);
                }

                $Ogrenci_danisman_Sicil = "";
                if(isset($Row[9])) {
                    $Ogrenci_danisman_Sicil = mysqli_real_escape_string($VeritabaniBaglantisi2,$Row[9]);
                }
          
                
                

                $new_pass=  substr($ogrenci_no , -4);
           
               
                  
                if (!empty($OgrenciTC) || !empty($adi) || !empty($soyadi) || !empty($email) || !empty($ogrenci_no) || !empty($Ogrenci_bolum_kodu) || !empty($Ogrenci_sinif) || !empty($Ogrenci_sube) || !empty($Ogrenci_ogretim) || !empty($Ogrenci_danisman_Sicil)) {
                    $birlesim = $Ogrenci_sinif . "/" . $Ogrenci_sube ." ". $Ogrenci_ogretim; //sinif sube ve ögretim seklini birleştirerek sinif adı oluşturduk
                    $sinifIdBul =$VeritabaniBaglantisi->prepare("SELECT sinif_id FROM siniflar JOIN ogrenciler WHERE sinif_adi IN(?) and sinif_bolum_kodu=? LIMIT 1"); //oluşturduğumuz sinif adını İD'ye dönüştürdük
                    $sinifIdBul->execute(array($birlesim,$Ogrenci_bolum_kodu));   
                    $sinifID = $sinifIdBul->fetch(PDO::FETCH_ASSOC);

                    $SicilKontrol  =  $VeritabaniBaglantisi->prepare("SELECT danismanlar.danisman_sicilNo, bolumler.bolum_kodu
                    FROM siniflar INNER JOIN danismanlar ON siniflar.Danisman_SicilNo = danismanlar.danisman_sicilNo 
                    INNER JOIN bolumler ON siniflar.sinif_bolum_kodu = bolumler.bolum_kodu WHERE danismanlar.danisman_sicilNo NOT IN(?) 
                         and bolumler.bolum_kodu NOT IN(?)");       
                    $SicilKontrol->execute(array($Ogrenci_danisman_Sicil, $Ogrenci_bolum_kodu));
                    $varmi = $SicilKontrol->rowCount();
                  //  try {
                        $birlesim = $Ogrenci_sinif . "/" . $Ogrenci_sube ." ". $Ogrenci_ogretim; //sinif sube ve ögretim seklini birleştirerek sinif adı oluşturduk
                    $sinifIdBul =$VeritabaniBaglantisi->prepare("SELECT sinif_id FROM siniflar JOIN ogrenciler WHERE sinif_adi IN(?) and sinif_bolum_kodu=? LIMIT 1"); //oluşturduğumuz sinif adını İD'ye dönüştürdük
                    $sinifIdBul->execute(array($birlesim,$Ogrenci_bolum_kodu));   
                    $sinifID = $sinifIdBul->fetch(PDO::FETCH_ASSOC);

                    $SicilKontrol  =  $VeritabaniBaglantisi->prepare("SELECT danismanlar.danisman_sicilNo, bolumler.bolum_kodu
                    FROM siniflar INNER JOIN danismanlar ON siniflar.Danisman_SicilNo = danismanlar.danisman_sicilNo 
                    INNER JOIN bolumler ON siniflar.sinif_bolum_kodu = bolumler.bolum_kodu WHERE danismanlar.danisman_sicilNo IN(?) 
                         and bolumler.bolum_kodu IN(?)");       
                    $SicilKontrol->execute(array($Ogrenci_danisman_Sicil, $Ogrenci_bolum_kodu));
                    $varmi = $SicilKontrol->rowCount();
                        if($varmi>0)
                        {
                            $excelEkle =$VeritabaniBaglantisi->prepare("INSERT INTO ogrenciler(Ogrenci_TC,Ogrenci_adi,Ogrenci_soyadi,Ogrenci_Email,Ogrenci_no,Ogrenci_Sifre,Ogrenci_bolum_kodu,Ogrenci_sinif_id,sinif,sube,ögretim,Danisman_SicilNo,Durumu,Silinme_Durumu) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                            $excelEkle->execute(array($OgrenciTC, $adi, $soyadi, $email, $ogrenci_no, $new_pass, $Ogrenci_bolum_kodu, $sinifID['sinif_id'], $Ogrenci_sinif, $Ogrenci_sube, $Ogrenci_ogretim, $Ogrenci_danisman_Sicil, 1, 0));             
                            if (! empty($excelEkle)) {
                                header("Location:eklemebasari.php");
                                $type = "success";
                                $message = "Excel Verileri Başarıyla Aktarıldı";
                        } 
                            
                            
                            
                              }//if
                       
                   // } //try
                  //  catch(Exception $e)
                    {
                         if(empty($excelEkle)) {
                            $type = "error";
                            $message = "Hata Oluştu Veriler Aktarılamadı";
                            header("Location:eklemebasarisiz.php");
                        }
                    }
                    }
                                    
                    
           
                
                
                
                    
                
            } // foreach

        } //for
    }//if

    else
    { 
        $type = "error";
        $message = "Excel Dosyası Seçilmedi. Lütfen Dosyayı Kontrol Edin";
    }
}
?>