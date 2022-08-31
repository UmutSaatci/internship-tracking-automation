<?php
$conn = mysqli_connect("localhost","root","","ogrenciler");
$conn->set_charset("utf8");
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');

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
                    $OgrenciTC = mysqli_real_escape_string($conn,$Row[0]);
                }

                $adi = "";
                if(isset($Row[1])) {
                    $adi = mysqli_real_escape_string($conn,$Row[1]);
                }

                $soyadi = "";
                if(isset($Row[2])) {
                    $soyadi = mysqli_real_escape_string($conn,$Row[2]);
                }

                $email = "";
                if(isset($Row[3])) {
                    $email = mysqli_real_escape_string($conn,$Row[3]);
                }

                $ogrenci_no = "";
                if(isset($Row[4])) {
                    $meslek = mysqli_real_escape_string($conn,$Row[4]);
                }

                $sifre = "";
                if(isset($Row[4])) {
                    $meslek = mysqli_real_escape_string($conn,$Row[5]);
                }

                $Ogrenci_bolum_kodu = "";
                if(isset($Row[4])) {
                    $meslek = mysqli_real_escape_string($conn,$Row[6]);
                }

                $Ogrenci_danisman_Sicil = "";
                if(isset($Row[4])) {
                    $meslek = mysqli_real_escape_string($conn,$Row[7]);
                }


                if (!empty($OgrenciTC) || !empty($adi) || !empty($soyadi) || !empty($email) || !empty($ogrenci_no) || !empty($sifre) || !empty($Ogrenci_bolum_kodu) || !empty($Ogrenci_danisman_Sicil)) {
                    $query = "INSERT INTO ogrenciler(Ogrenci_TC,Ogrenci_adi,Ogrenci_soyadi,Ogrenci_Email,Ogrenci_no,Ogrenci_Sifre,Ogrenci_bolum_kodu,Ogrenci_sinif_id,Danisman_SicilNo,Durumu,Silinme_Durumu) VALUES('".$OgrenciTC."','".$adi."','".$soyadi."','".$email."','".$ogrenci_no."','".$sifre."','".$Ogrenci_bolum_kodu."','".$Ogrenci_bolum_kodu."','".$Ogrenci_danisman_Sicil."','"1"','"0"')";
                    $result = mysqli_query($conn, $query);

                    if (! empty($result)) {
                        $type = "success";
                        $message = "Excel Verileri Başarıyla Aktarıldı";
                    } else {
                        $type = "error";
                        $message = "Hata Oluştu Veriler Aktarılamadı";
                    }
                }
            }

        }
    }
    else
    { 
        $type = "error";
        $message = "Excel Dosyası Seçilmedi. Lütfen Dosyayı Kontrol Edin";
    }
}
?>

<!DOCTYPE html>
<html>    
<head>
    <style>    
        body {
            font-family: Arial;
            width: 550px;
        }

        .outer-container {
            background: #F0F0F0;
            border: #e0dfdf 1px solid;
            padding: 40px 20px;
            border-radius: 2px;
        }

        .btn-submit {
            background: #333;
            border: #1d1d1d 1px solid;
            border-radius: 2px;
            color: #f0f0f0;
            cursor: pointer;
            padding: 5px 20px;
            font-size:0.9em;
        }

        .tutorial-table {
            margin-top: 40px;
            font-size: 0.8em;
            border-collapse: collapse;
            width: 100%;
        }

        .tutorial-table th {
            background: #f0f0f0;
            border-bottom: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        .tutorial-table td {
            background: #FFF;
            border-bottom: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        #response {
            padding: 10px;
            margin-top: 10px;
            border-radius: 2px;
            display:none;
        }

        .success {
            background: #c7efd9;
            border: #bbe2cd 1px solid;
        }

        .error {
            background: #fbcfcf;
            border: #f3c6c7 1px solid;
        }

        div#response.display-block {
            display: block;
        }
    </style>
</head>

<body>
    <h2>Excel Verilerini Veri Tabanına Aktarma</h2>

    <div class="outer-container">
        <form action="" method="post"
        name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
        <div>
            <label>Excel Dosyasını 
            Seç</label> <input type="file" name="file"
            id="file" accept=".xls,.xlsx">
            <button type="submit" id="submit" name="import"
            class="btn-submit">Aktar</button>

        </div>

    </form>

</div>
<div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>



</body>
</html>