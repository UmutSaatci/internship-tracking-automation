<?php 
ob_start();
session_start();
include 'Include/Connection.php';
Include 'ayarlar/fonksiyonlar.php'; 
if($_POST['GirisYap']){
	$user_mail= Guvenlik($_POST['EmailAdresi']);
	$user_pass= Guvenlik($_POST['Sifre']);

	$user_sor =$VeritabaniBaglantisi->prepare("SELECT * FROM ogrenciler WHERE Ogrenci_Email=? and Ogrenci_Sifre=? and Durumu=? and Silinme_Durumu=?");
	$user_sor->execute(array($user_mail,$user_pass,1,0));
	$ciktiögrenci = $user_sor->fetch(PDO::FETCH_ASSOC);
	$OgrenciID =$ciktiögrenci['Ogrenci_id'];
$say = $user_sor->rowCount();
if($say ==1){

	$_SESSION['ÖgrenciID'] = $OgrenciID;
	echo $_SESSION['ÖgrenciID'];
	header("Location:Ogrenci/AnaPanel_Ogrenci.php");
	exit;
}
else {
	header("Location:AdminPanel_Login_Ogrenci.php?durum=false");
	exit;
}
}
?>