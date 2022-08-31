<?php 
ob_start();
session_start();
include 'Include/Connection.php';
Include 'ayarlar/fonksiyonlar.php'; 

if($_POST['GirisYap']){
	$user_mail= Guvenlik($_POST['EmailAdresi']);
	$user_pass= Guvenlik($_POST['Sifre']);

	$user_sor =$VeritabaniBaglantisi->prepare("SELECT * FROM baskanlar WHERE baskan_mail=? and baskan_sifre=? and Durumu=? and Silinme_Durumu=?");
	$user_sor->execute(array($user_mail,$user_pass,3,0));
	$baskancikti = $user_sor->fetch(PDO::FETCH_ASSOC);
$say = $user_sor->rowCount();
if($say ==1){

	$_SESSION['baskanID'] = $baskancikti['baskan_id'];
	
	header("Location:BolumBaskani/AnaPanel_BolumBaskani.php");
	exit;
}
else {
	header("Location:AdminPanel_Login_BolumBaskani.php?durum=false");
	exit;
}
}
?>