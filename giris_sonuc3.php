<?php 
ob_start();
session_start();
include 'Include/Connection.php';
Include 'ayarlar/fonksiyonlar.php'; 
if($_POST['GirisYap']){
	$user_mail= Guvenlik($_POST['EmailAdresi']);
	$user_pass= Guvenlik($_POST['Sifre']);

	$user_sor =$VeritabaniBaglantisi->prepare("SELECT * FROM danismanlar WHERE danisman_email=? and danisman_sifre=? and Durumu=? and Silinme_Durumu=?");
	$user_sor->execute(array($user_mail,$user_pass,2,0));
    $danismancikti = $user_sor->fetch(PDO::FETCH_ASSOC);
$say = $user_sor->rowCount();
if($say ==1){

	$_SESSION['danismanSicil'] = $danismancikti['danisman_sicilNo'];
	header("Location:Danisman/AnaPanel_Danisman.php");
	exit;
}
else {
	header("Location:AdminPanel_Login_Danisman.php?durum=false");
	exit;
}
}
?>