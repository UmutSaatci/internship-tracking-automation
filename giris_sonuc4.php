<?php 
ob_start();
session_start();
include 'Include/Connection.php';
Include 'ayarlar/fonksiyonlar.php'; 

if($_POST['GirisYap']){
	$user_mail= Guvenlik($_POST['EmailAdresi']);
	$user_pass= Guvenlik($_POST['Sifre']);

	$user_sor =$VeritabaniBaglantisi->prepare("SELECT * FROM bilgi_islem WHERE Bilgi_islem_mail=? and Bilgi_islem_sifre=? and Durumu=? and Silinme_Durumu=?");
	$user_sor->execute(array($user_mail,$user_pass,4,0));
	$bilgiislemCikti = $user_sor->fetch(PDO::FETCH_ASSOC);
$say = $user_sor->rowCount();
if($say ==1){

	$_SESSION['BilgiİslemID'] = $bilgiislemCikti['Bilgi_islem_id'];
	header("Location:BilgiIslem/AnaPanel_BilgiIslem.php");
	exit;
}
else {
	header("Location:AdminPanel_Login_Idare.php?durum=false");
	exit;
}
}
?>