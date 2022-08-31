<?php
include '../Include/Header.php';  
if(isset($_GET['ID'])){
$GelenID        =   $_GET['ID'];


 $UPDATE =$VeritabaniBaglantisi->prepare("UPDATE ogrenciler SET StajOnay=?, OgrenciStajBasvuru=?, OgrenciStajGonderim=? WHERE Ogrenci_id=?");
  $UPDATE->execute(array(2,0,0, $GelenID));
  $update_SAyi = $UPDATE->rowCount();
  if($update_SAyi ==0){
     header("Location:staj_formu.php?reddetme=false");
    exit();
  }
  else{
    $DELETE =$VeritabaniBaglantisi->prepare("DELETE FROM stajbasvurudetay WHERE OgrenciID=?");
    $DELETE->execute(array($GelenID));
    $delete_sayi = $DELETE->rowCount();
  	Header("Location:onay_bekleyen_stajlar.php");
    exit();
  }

}
