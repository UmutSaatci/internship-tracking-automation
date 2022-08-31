<?php
include '../Include/Header.php';  
if(isset($_GET['ID'])){
$GelenID        =   $_GET['ID'];


 $UPDATE =$VeritabaniBaglantisi->prepare("UPDATE ogrenciler SET StajOnayBaskan=?, OgrenciStajBasvuru=? WHERE Ogrenci_id=?");
  $UPDATE->execute(array(1, 2, $GelenID));
  $update_SAyi = $UPDATE->rowCount();
  if($update_SAyi ==0){
     header("Location:onay_bekleyen_stajlar?onaylama=false");
    exit();
  }
  else{
  	Header("Location:onay_bekleyen_stajlar.php");
    exit();
  }

}

 

?>