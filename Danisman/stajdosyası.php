<?php
include '../Include/Header.php';
$id=$_GET["ID"];{ // basename sayesinde klasör linkleri görmez sadece dosya ismini alır.
 
 $dosya_sor = $VeritabaniBaglantisi->prepare("SELECT * FROM stajdosyasi  WHERE OgrenciID=?");
     $dosya_sor->execute(array($id)); 
     $dosya_bul= $dosya_sor->fetch(PDO::FETCH_ASSOC);

     $path="../resimler/".$dosya_bul['Ogrenci_dosya'];

if(file_exists($path)){
    header('Content-Description: File Transfer');
    header('Content-Type: application/force-download');
    header("Content-Disposition: attachment; filename=\"" . basename($path)  ."\";");
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($path));
    ob_clean();
    flush();
    readfile($path); 
   //showing the path to the server where the file is to be download
    exit;
}
else{
    echo "dosya yok";
}
}
?>
